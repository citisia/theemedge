<?php

namespace App\Http\Controllers\AdmissionEnquiry;

use App\DegreeEnquiry;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdmissionEnquiry\Degree\CreateEnquiryRequest;
use Carbon\Carbon;
use Facades\App\Services\AdmissionEnquiry\DegreeEnquiryService;
use Facades\App\Services\Settings\CourseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DegreeEnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('enquiry.degree.index', [
            'enquiries' => DegreeEnquiryService::all(15)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = CourseService::getDegreeCourses();
        return view('enquiry.degree.create', ['courses' => $courses]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\AdmissionEnquiry\Degree\CreateEnquiryRequest
     * @return \App\Department
     */
    public function store(CreateEnquiryRequest $request)
    {
        $enquiry = DegreeEnquiryService::create($request->all());

        //If the service returns null, abort the request
        if(!$enquiry)
            return App::abort(500);

        return redirect()->route('degree.show', $enquiry)
            ->with('success','Enquiry generated successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DegreeEnquiry $enquiry
     * @return \App\DegreeEnquiry
     */
    public function show(DegreeEnquiry $enquiry)
    {
        return view('enquiry.degree.show', ['enquiry' => $enquiry]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DegreeEnquiry $enquiry
     * @return \Illuminate\Http\Response
     */
    public function edit(DegreeEnquiry $enquiry)
    {
        return view('enquiry.degree.edit', ['$enquiry' => $enquiry]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\DegreeEnquiry $enquiry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DegreeEnquiry $enquiry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DegreeEnquiry $enquiry
     * @return \Illuminate\Http\Response
     */
    public function destroy(DegreeEnquiry $enquiry)
    {
        $status = DegreeEnquiryService::delete($enquiry);
    }

    public function approveEnquiry(Request $request, DegreeEnquiry $enquiry)
    {
        $this->validate($request, [
            '_enquiry' => 'required'
        ]);

        //Check if the submitted enquiry hash and computed enquiry hash are same.
        if (!Hash::check($enquiry->id, $request->get('_enquiry')))
            return back()->withErrors('Form Tampering Detected. Your IP address has been logged for security concerns.');

        $status = DegreeEnquiryService::approveEnquiry($enquiry);
        if ($status === false)
            return back()->with('warning', 'Admission Enquiry was already approved or rejected.');
        if ($status === null)
            return back()->with('warning', 'Admission Enquiry was canceled by the enquirer.');
        return back()->with('warning', 'Admission Enquiry approved at ' . Carbon::now()->toDayDateTimeString());
    }

    public function printEnquiry(DegreeEnquiry $enquiry)
    {
        return view('enquiry.degree.print', ['enquiry' => $enquiry]);
    }

    public function rejectEnquiry(Request $request, DegreeEnquiry $enquiry)
    {
        $this->validate($request, [
            '_enquiry' => 'required'
        ]);

        //Check if the submitted enquiry hash and computed enquiry hash are same.
        if (!Hash::check($enquiry->id, $request->get('_enquiry')))
            return back()->withErrors('Form Tampering Detected. Your IP address has been logged for security concerns.');

        $status = DegreeEnquiryService::rejectEnquiry($enquiry);
        if ($status === false)
            return back()->with('warning', 'Admission Enquiry was already approved or rejected.');
        if ($status === null)
            return back()->with('warning', 'Admission Enquiry was canceled by the enquirer.');
        return back()->with('warning', 'Admission Enquiry rejected at ' . Carbon::now()->toDayDateTimeString());
    }

}
