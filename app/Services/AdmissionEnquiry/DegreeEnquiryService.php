<?php

namespace App\Services\AdmissionEnquiry;

use App\DegreeAdmissionEnquiry;
use App\DegreeAdmissionEnquiryComment;
use App\Services\Service;
use Carbon\Carbon;

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
        return DegreeAdmissionEnquiry::orderBy('created_at','desc')->paginate($count);
    }

    public function create($data)
    {
        $enquiry = new DegreeAdmissionEnquiry();
        $enquiry->fill($data);
        return $enquiry->save();
    }

    public function delete(DegreeAdmissionEnquiry $enquiry)
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
        return DegreeAdmissionEnquiry::findOrFail($id);
    }
}