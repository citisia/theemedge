<?php
/**
 * Created by PhpStorm.
 * User: naved
 * Date: 18/2/17
 * Time: 5:21 PM
 */

namespace App\Services\Settings;


use App\Course;
use App\Department;
use App\Services\Service;
use Illuminate\Database\QueryException;

class CourseService extends Service
{
    public function all($level = null)
    {
        return Course::all();
    }

    public function create($data)
    {
        $course = new Course;
        $course->fill($data);
        $course->department()->associate(Department::find($data['departmentId']));
        $status = $course->save();
        if(!$status)
            return null;
        return $course;
    }

    public function getDegreeCourses()
    {
        return Course::where('level',2)->get();
    }

    public function update(Course $course, $data)
    {
        $course->fill($data);
        return $course->save();
    }

    public function delete(Course $course)
    {
        return $course->delete();
    }
}