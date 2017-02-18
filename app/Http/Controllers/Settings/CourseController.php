<?php

namespace App\Http\Controllers\Settings;

use App\Course;
use App\Http\Controllers\Controller;
use Facades\App\Services\Settings\CourseService;
use Facades\App\Services\Settings\DepartmentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *php a
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = CourseService::all();
        $departments = DepartmentService::all();
        return view('settings.course.index', [
            'courses' => $courses,
            'departments' => $departments,
        ]);
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $course = CourseService::create($request->except('_token'));
        if (!$course)
            return back()->withInput()->withErrors('Unable to create course');
        return view('settings.course.show', ['course' => $course]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('settings.course.show', ['course' => $course]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return view('settings.course.edit', [
            'course' => $course,
            'departments' => DepartmentService::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Course $course
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Course $course)
    {
        if (!Hash::check($course->id, $request->get('_course')))
            return back()->withErrors('Invalid Request');

        $data = $request->except('_token');
        $result = CourseService::update($course, $data);

        if (!$result)
            return back()->withInput($request)->withErrors('Unable to update');

        return redirect()->route('course.show', $course)->with('success', 'Course updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  \App\Course $course
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, Course $course)
    {
        if (!Hash::check($course->id, $request->get('_course'))) {
            return back()->withInput()->withErrors('Form Tampering Detected!');
        }

        $result = CourseService::delete($course);
        if (!$result)
            return back()->withInput()->withErrors('Unable to delete course.');
        return redirect()->route('course.index')->with('success', 'Course delete successfully.');
    }
}
