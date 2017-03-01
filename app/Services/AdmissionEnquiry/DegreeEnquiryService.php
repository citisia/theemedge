<?php

namespace App\Services\AdmissionEnquiry;

use App\DegreeEnquiry;
use App\EnquiryComment;
use App\Services\Service;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DegreeEnquiryService extends Service
{
    public function activeEnquiries()
    {
        $enquiries = $this->all()->reject(function ($enquiry) {
            return $enquiry->createdAt->year < Carbon::now()->year;
        });
        return $enquiries->paginate(15);
    }

    public function all($count = 15)
    {
        return DegreeEnquiry::orderBy('created_at', 'desc')->paginate($count);
    }

    public function comment(DegreeEnquiry $enquiry, EnquiryComment $comment)
    {
        return $enquiry->comments()->save($comment);
    }

    public function create($data)
    {
        $enquiry = new DegreeEnquiry();
        $enquiry->fill($data);

        DB::beginTransaction();
        $enquiry->save();

        $courses = $data['courses'];
        try {
            foreach ($courses as $course) {
                $enquiry->courses()->attach($course);
            }
        } catch (QueryException $exception) {
            DB::rollback();
            throw $exception;
        }
        DB::commit();
        return $enquiry;
    }

    public function delete(DegreeEnquiry $enquiry)
    {
        return $enquiry->delete();
    }

    public function getByStatus($status = null)
    {
        switch ($status) {
            case 0 :    //Approached
                return $this->all();
                break;
            case 1:     //Sent to Admin
                return $this->all()->where('status', 1);
                break;
            case 2:     //Sent to Accounts
                return $this->all()->where('status', 2);
                break;
            case 3: //Enquiry Rejected or Cancel
                return $this->all()->where('status', 3);
                break;
            default:    //Send nothing
                return [];
        }
    }

    public function findById($id)
    {
        return DegreeEnquiry::findOrFail($id);
    }

    public function approveEnquiry(DegreeEnquiry $enquiry)
    {
        //If enquiry is already cancelled.
        if ($enquiry->status === 4)
            return null;

        //If enquiry is already approved or rejected
        if ($enquiry->status === 1 || $enquiry->status === 2)
            return false;

        $enquiry->status = 1;
        $enquiry->save();
        return true;
    }

    public function rejectEnquiry(DegreeEnquiry $enquiry)
    {
        //If enquiry is already cancelled.
        if ($enquiry->status === 4)
            return null;

        //If enquiry is already approved or rejected
        if ($enquiry->status === 1 || $enquiry->status === 2)
            return false;

        $enquiry->status = 2;
        $enquiry->save();
        return true;
    }
}