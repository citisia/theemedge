<?php

namespace App\Services\Student;


use App\DegreeStudent;
use App\Services\Service;

class DegreeStudentService extends Service
{
    public function createStudent($data)
    {
        $student = new DegreeStudent();
        $student->fill($data);
        $student->save();
    }

    public function updateStudent(DegreeStudent $student, $data)
    {
        $student->update($data);
        $student->save();
    }

    public function setCurrentYear(DegreeStudent $student, $year)
    {
        $student->setCurrentYear($year);
        $student->save();
    }
}