<?php

namespace App\Http\Controllers\Settings;


use App\Department;
use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\Department\CreateDepartmentRequest;
use App\Http\Requests\Settings\Department\UpdateDepartmentRequest;
use Facades\App\Services\Settings\DepartmentService;
use Illuminate\Support\Facades\Hash;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DepartmentService::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Settings\Department\CreateDepartmentRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDepartmentRequest $request)
    {
        $dept = DepartmentService::create($request->all());
        if ($dept == null)
            return response()->json(['status' => 'error']);

        return $dept;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        return response()->json([
            'data' => $department
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Settings\Department\UpdateDepartmentRequest $request
     * @param  \App\Department
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        if (!Hash::check($department->id, $request->get('_department'))) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid update request.'
            ]);
        }

        $result = DepartmentService::update($department, $request->except('_department'));
        if (!$result) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unable to update department'
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Department updated.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        if (!Hash::check($department->id, $request->get('_department'))) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid delete request.'
            ]);
        }
        $result = DepartmentService::delete($department);
        if (!$result) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unable to delete department'
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Department deleted.'
        ]);
    }
}
