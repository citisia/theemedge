@extends('layouts.app')

@section('styles')
    <style type="text/css">
        #seForm, #feForm {
            display: none;
        }
    </style>
@stop

@section('content')
    <div class="page-header">
        <h4> Admission Form </h4>
    </div>
    @include('shared.flash_data')
    <div class="forms">
        <form role="form" action="{{route('candidate.degree.update', $candidate->id)}}" method="POST" class="">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <fieldset>
                <legend>Personal Details</legend>
                <!-- Name fields -->
                <div class="form-group">
                    <label class="" for="lastName">Last Name: </label>
                    <input type="text" class="form-control" id="lastName" name="lastName"
                           value="{{$candidate->lastName}}"/>
                </div>
                <div class="form-group">
                    <label class="" for="firstName">First Name: </label>
                    <input type="text" class="form-control" id="firstName" name="firstName"
                           value="{{$candidate->firstName}}" placeholder="First Name"/>
                </div>
                <div class="form-group">
                    <label class="" for="middleName">Middle Name: </label>
                    <input type="text" class="form-control" id="middleName" name="middleName"
                           value="{{$candidate->MiddleName}}">
                </div>

                <div class="form-group">
                    <label class="" for="fatherName">Father Name: </label>
                    <input type="text" class="form-control" id="fatherName" name="fatherName"
                           value="{{$candidate->fatherName}}">
                </div>

                <!-- Name fields -->

                <div class="form-group">
                    <label class="" for="dateOfBirth">Date of Birth: </label>
                    <input type="date" class="form-control" id="dateOfBirth" name="dateOfBirth"
                           value="{{ $candidate->dateOfBirth }}">
                </div>

                <div class="form-group">
                    <label class="">Gender:</label><br/>
                    <label>
                        <input class="" type="radio" id="gender" name="gender"
                               value="{{old('gender')}}"> Male &nbsp;&nbsp;
                    </label>
                    <label>
                        <input class="" type="radio" id="gender" name="gender"
                               value="{{old('gender')}}"> Female
                    </label>

                </div>

                <div class="form-group">
                    <label for="approvedCourseId">Course</label>
                    <select class="form-control" name="approvedCourseId" id="approvedCourseId">
                        @foreach(Facades\App\Services\Settings\CourseService::getDegreeCourses() as $course)
                            <option value="{{$course->id}}">{{$course->title}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label class="" for="admissionType">Admission Type: </label><br>
                    <input type="radio" id="admissionType" name="admissionType"
                           value="{{old('admissionType')}}">CAP &nbsp;&nbsp;
                    <input type="radio" id="admissionType" name="admissionType"
                           value="{{old('admissionType')}}">Management
                </div>


                @if($candidate->appliedForYear == 1)
                    <div id="feForm">
                        <input type="hidden" id="appliedForYear" name="appliedForYear" value="1"/>
                        <div class="form-group">
                            <label class=" " for="sscPercentage">SSC %</label>
                            <input type="number" class="form-control" name="sscPercentage" id="sscPercentage"
                                   step="0.01" min="35" max="100" value="{{$candidate->sscPercentage}}"/>
                        </div>
                        <div class="form-group">
                            <label class="" for="hscPercentage">HSC %</label>
                            <input type="number" class="form-control" name="hscPercentage" id="hscPercentage"
                                   step="0.01" min="40" max="100" value="{{$candidate->hscPercentage}}"/>
                        </div>
                        <div class="form-group">
                            <label class="">HSC Marks</label>
                            <input type="number" class="form-control" name="hscPhysics" id="hscPhysics"
                                   max="100" min="40" value="{{$candidate->hscPhysics}}"/>
                            <input type="number" class="form-control" name="hscChemistry" id="hscChemistry"
                                   max="100" min="40" value="{{$candidate->hscChemistry}}"/>
                            <input type="number" class="form-control" name="hscMaths" id="hscMaths"
                                   max="100" min="40" value="{{$candidate->hscMaths}}"/>
                        </div>
                        <div class="form-group">
                            <label for="jeeMainScore" class="">JEE Main Score</label>
                            <input type="number" class="form-control" id="jeeMainScore"
                                   name="jeeMainScore" value="{{$candidate->jeeMainScore}}"/>
                        </div>
                    </div>
                @else
                    <div id="seForm">
                        <input type="hidden" id="appliedForYear" name="appliedForYear" value="2"/>
                        <div class="form-group">
                            <label class=" " for="sscPercentage">SSC %</label>
                            <input type="number" class="form-control" name="sscPercentage"
                                   id="sscPercentage" step="0.01" min="35" max="100"
                                   value="{{$candidate->sscPercentage}}"/>
                        </div>
                        <div class="form-group">
                            <label class="" for="diplomaPercentage">Diploma %</label>
                            <input type="number" class="form-control" name="diplomaPercentage"
                                   id="diplomaPercentage" step="0.01" min="35" max="100"
                                   value="{{ $candidate->diplomaPercentage }}"/>
                        </div>
                    </div>
                @endif

                <div class="form-group">
                    <label class="" for="residentialArea">Residential Area</label>
                    <input type="text" class="form-control" name="residentialArea"
                           id="residentialArea" value="{{$candidate->residentialArea}}" list="residentialAreasList"/>
                </div>

                <div class="form-group">
                    <label class="" for="adharCardNo">Adhar Card Number: </label>
                    <input type="text" class="form-control" id="adharCardNo" name="adharCardNo"
                           value="{{$candidate->adharCardNo}}"/>
                </div>

                <div class="form-group">
                    <label class="" for="panCardNo">Pan Card Number: </label>
                    <input type="text" class="form-control" id="panCardNo" name="panCardNo"
                           value="{{$candidate->panCardNo}}"/>
                </div>

                <div class="form-group">
                    <label class="" for="studentCategory">Student Category: </label><br>
                    <input type="radio" id="studentCategory" name="studentCategory"
                           value="{{old('studentCategory')}}">OPEN &nbsp;&nbsp;
                    <input type="radio" id="studentCategory" name="studentCategory"
                           value="{{old('studentCategory')}}">OBC
                </div>

            </fieldset>
            <hr/>
            <div class="form-group">
                <button type="submit" class="btn btn-success ">Submit</button>
                <button type="reset" class="btn btn-danger ">Reset</button>
            </div>
        </form>
    </div>

@stop
