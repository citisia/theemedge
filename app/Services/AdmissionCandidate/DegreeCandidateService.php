<?php

namespace App\Services\AdmissionCandidate;


use App\DegreeCandidate;
use App\Services\Service;
use Facades\App\Services\Settings\CourseService;

class DegreeCandidateService extends Service
{
    public function get($id = null)
    {
        if(is_null($id))
            return DegreeCandidate::paginate();
        else
            return DegreeCandidate::findOrFail($id);
    }

    public function create($data, $admissionType, $admissionRefId)
    {
        $course = CourseService::findById($data["approvedCourseId"]);
        $candidate = new DegreeCandidate();
        $candidate->fill($data);
        $candidate->admissionType = $admissionType;
        $candidate->admissionReferenceId = $admissionRefId;
        $candidate->course()->associate($course);
        return $candidate->save();
    }

    public function createCAPCandidate($data)
    {
        $admissionType = 1; //CAP CONSTANT
        $admissionRefId = $data['admissionReferenceId'];
        return $this->create($data, $admissionType, $admissionRefId);
    }

    public function createManagementCandidate(DegreeEnquiry $enquiry)
    {
        $admissionType = 2; //CAP CONSTANT
        $admissionRefId = $enquiry->id;
        $data = [];
        foreach ($enquiry->toArray() as $key => $item) {
            $data[camel_case($key)] = $item;
        }
        $data['approved_course_id'] = $enquiry->approvedCourse->id;
        return $this->create($data, $admissionType, $admissionRefId);
    }

    public function update(DegreeCandidate $candidate, $data)
    {
        $candidate->fill($data);
        if($candidate->save())
            return $candidate;
        else
            return null;
    }


}