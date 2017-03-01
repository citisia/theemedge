<?php

namespace App\Http\Controllers\AdmissionCandidate;

use App\DegreeCandidate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Facades\App\Services\AdmissionCandidate\DegreeCandidateService;

class DegreeCandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('candidates.degree.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $candidate = DegreeCandidateService::create($request->all());

        //If the service returns null, abort the request
        if(!$candidate)
            App::abort(500);

        return redirect()->route('candidates.show', $candidate)
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
        return view('candidates.degree.show', ['candidate' => $candidate]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DegreeCandidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function edit(DegreeCandidate $candidate)
    {
        //
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
        //
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
