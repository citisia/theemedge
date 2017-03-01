@extends('layouts.app')

@section('content')
    <div class="page-header">
        <h5 class="">
            Admission Details
        </h5>
        <div class="row">
            <div class="col-md-6">
                <span><strong>Created on </strong>{{ $candidate->createdAt }}</span> <br/>
                <span>
                    <strong>Course(s) selected: </strong>
                        {{ $candidate->courses }}
                </span>
            </div>
            <div class="col-md-6">
                <a href="{{route('candidates.print', $candidate)}}" class="btn btn-primary">
                    <i class="fa fa-fw fa-print"></i> Print
                </a>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div id="enquiry">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5 class="panel-title">Persoanl Details</h5>
                    </div>
                    <div class="panel-body">
                        <div>
                            <strong><i class="fa fa-fw fa-user"></i> Full Name: </strong> {{ $candidate->lastName . $candidate->firstName . $candidate->middleName }}
                        </div>
                        <div>
                            <strong><i class="fa fa-fw fa-location-arrow"></i> Residential Area:
                            </strong> {{ $candidate->residentialArea }}
                        </div>
                        <div>
                            <strong><i class="fa fa-fw fa-location-arrow"></i> Admission Type:
                            </strong> {{ $candidate->admissionType }}
                        </div>
                        <div>
                            <strong><i class="fa fa-fw fa-location-arrow"></i> Student Category:
                            </strong> {{ $candidate->studentCategory }}
                        </div>
                        <div>
                            <strong><i class="fa fa-fw fa-location-arrow"></i> Adhar Card Number:
                            </strong> {{ $candidate->adharCardNo }}
                        </div>
                        <div>
                            <strong><i class="fa fa-fw fa-location-arrow"></i> Pan Card Number:
                            </strong> {{ $candidate->panCardNo }}
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5 class="panel-title">Academics Details</h5>
                    </div>
                    <div class="panel-body">
                        <strong>SSC Percentage: </strong> {{ $candidate->sscPercentage }}&percnt;<br/>
                        @if($candidate->appliedForYear == 1)
                            <strong>HSC Percentage: </strong> {{ $candidate->hscPercentage }}&percnt;<br/>
                            <strong>HSC Physics: </strong> {{ $candidate->cetPhysics }} <br/>
                            <strong>HSC Chemistry: </strong> {{ $candidate->cetChemistry }} <br/>
                            <strong>HSC Mathematics: </strong> {{ $candidate->cetMaths }} <br/>
                            <strong>JEE Main Score: </strong> {{ $candidate->jeeMainScore }}<br/>
                        @elseif($candidate->appliedForYear == 2)
                            <strong>Diploma Percentage: </strong> {{ $candidate->diplomaPercentage}}&percnt;
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop