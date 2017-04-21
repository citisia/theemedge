<?php

namespace App\Http\Controllers\AdmissionCandidate;

use App\DegreeCandidate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdmissionCandidate\CreateCandidateRequest;
use Facades\App\Services\AdmissionCandidate\DegreeCandidateService;
use Facades\App\Services\Settings\CourseService;

class DegreeCandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidates = DegreeCandidateService::get();
        return view('candidate.degree.index', ['candidates' => $candidates]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = CourseService::getDegreeCourses();
        return view('candidate.degree.create', ['courses' => $courses]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\AdmissionCandidate\CreateCandidateRequest $request
     * @return \Illuminate\Http\Response
     */

    public function store(CreateCandidateRequest $request)
    {
        $candidate = DegreeCandidateService::createCAPCandidate($request->all());

        //If the service returns null, abort the request
        if(is_null($candidate))
            abort(500);

        return redirect()->route('candidate.degree.show', $candidate->id)
            ->with('success','Candidate successfully registered');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DegreeCandidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function show(DegreeCandidate $candidate)
    {
        return view('candidate.degree.show', ['candidate' => $candidate]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DegreeCandidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function edit(DegreeCandidate $candidate)
    {
        return view('candidate.degree.edit', ['candidate' => $candidate]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DegreeCandidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DegreeCandidate $candidate)
    {
        $candidate = DegreeCandidateService::update($candidate, $request->all());

        //If the service returns null, abort the request
        if(is_null($candidate))
            abort(500);

        return redirect()->route('candidate.degree.show', $candidate->id)
            ->with('success','Candidate successfully registered');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DegreeCandidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function destroy(DegreeCandidate $candidate)
    {
        //
    }
}
