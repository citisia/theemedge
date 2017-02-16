<?php

namespace App\Http\Controllers\AdmissionEnquiry;

use App\DegreeAdmissionEnquiry;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdmissionEnquiry\Degree\CreateEnquiryRequest;
use App\Services\Settings\DepartmentService;
use Facades\App\Services\AdmissionEnquiry\DegreeEnquiryService;
use Illuminate\Http\Request;

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
        $courses = [];
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
        $enquiry = DepartmentService::create($request->all());
        return $enquiry;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DegreeAdmissionEnquiry $enquiry
     * @return \App\DegreeAdmissionEnquiry
     */
    public function show(DegreeAdmissionEnquiry $enquiry)
    {
        return view('enquiry.degree.show', ['enquiry' => $enquiry]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DegreeAdmissionEnquiry $enquiry
     * @return \Illuminate\Http\Response
     */
    public function edit(DegreeAdmissionEnquiry $enquiry)
    {
        return view('enquiry.degree.edit', ['$enquiry' => $enquiry]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\DegreeAdmissionEnquiry $enquiry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DegreeAdmissionEnquiry $enquiry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DegreeAdmissionEnquiry $enquiry
     * @return \Illuminate\Http\Response
     */
    public function destroy(DegreeAdmissionEnquiry $enquiry)
    {
        $status = DegreeEnquiryService::delete($enquiry);
    }

    public function printEnquiry(DegreeAdmissionEnquiry $enquiry)
    {
        return view('enquiry.degree.print' , ['enquiry' => $enquiry]);
    }
}
