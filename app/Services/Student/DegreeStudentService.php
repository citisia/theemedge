<?php
/**
 * Created by PhpStorm.
 * User: ITC2-024
 * Date: 3/27/2017
 * Time: 8:51 AM
 */

namespace App\Services;


use App\DegreeStudent;

class DegreeStudentService extends Service
{
    public function createStudent($data)
    {
        $student = new DegreeStudent();
        $student->fill($data);
        $student->save();
    }
}