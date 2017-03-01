<?php
/**
 * Created by PhpStorm.
 * User: naved
 * Date: 1/3/17
 * Time: 9:30 PM
 */

namespace App\Services\AdmissionCandidate;


use App\Services\Service;

class DegreeCandidate extends Service
{
    public function create($data)
    {
        $candidate = new DegreeCandidate();
        $candidate->fill($data);
        return $candidate->save();
    }

}