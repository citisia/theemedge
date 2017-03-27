<?php

namespace App\Http\Controllers\Fees;

use App\FeesRecord;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Facades\App\Services\DegreeFeesService;

class DegreeFeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feesRecords = DegreeFeesService::getCurrentYearRecords();
        return view('fees.degree.index', ['feesRecords' => $feesRecords]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fees.degree.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FeesRecord  $feesRecord
     * @return \Illuminate\Http\Response
     */
    public function show(FeesRecord $feesRecord)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FeesRecord  $feesRecord
     * @return \Illuminate\Http\Response
     */
    public function edit(FeesRecord $feesRecord)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FeesRecord  $feesRecord
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FeesRecord $feesRecord)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FeesRecord  $feesRecord
     * @return \Illuminate\Http\Response
     */
    public function destroy(FeesRecord $feesRecord)
    {
        //
    }
}
