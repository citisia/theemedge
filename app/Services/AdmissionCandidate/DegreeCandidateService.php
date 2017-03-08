<?php

namespace App\Services\AdmissionCandidate;


use App\DegreeCandidate;
use App\Services\Service;
use Facades\App\Services\Settings\CourseService;

class DegreeCandidateService extends Service
{
    public function create($data, $admissionType, $admissionRefId)
    {
        $course = CourseService::findById($data["approved_course_id"]);
        $candidate = new DegreeCandidate();
        $candidate->fill($data);
        $candidate->admissionType = $admissionType;
        $candidate->admissionReferenceId = $admissionRefId;
        //dd($candidate);
        $candidate->course()->associate($course);
        return $candidate->save();
    }


}