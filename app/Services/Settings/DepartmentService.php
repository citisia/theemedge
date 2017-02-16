<?php
/**
 * Created by PhpStorm.
 * User: naved
 * Date: 2/8/2017
 * Time: 11:49 PM
 */

namespace App\Services\Settings;


use App\Department;
use App\Services\Service;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DepartmentService extends Service
{


    /**
     * Create and store a new department in storage
     * @param $data
     * @return \App\Department
     */
    public function create($data)
    {
        return Department::create($data);
    }

    public function delete(Department $department)
    {
        return $department->delete();
    }

    /**
     * Return all departments in storage.
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all()
    {
        return Department::all()->orderBy('createdAt','desc');
    }
    /**
     * @param $id
     * @return \App\Department
     * @throws ModelNotFoundException
     */
    public function getById($id)
    {
        return Department::findOrFail($id);
    }

    public function getDegreeDepartments()
    {
        return $this->all()->where('level', 2);
    }

    public function getDiplomaDepartments()
    {
        return $this->all()->where('level', 1);
    }

    public function update(Department $department, $data)
    {
        $department->fill($data);
        return $department->save();

    }

}