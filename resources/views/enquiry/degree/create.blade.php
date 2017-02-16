@extends('layouts.app')

@section('styles')
    <style type="text/css">
        .forms > form {
            display: none;
        }
    </style>
@stop

@section('content')
    <div class="page-header">
        <h4>New Degree Admission Enquiry</h4>
    </div>
    <div>
        <div class="form-group">
            <select id="degreeFormSelector" class="form-control">
                <option value="0" selected disabled>Select Year</option>
                <option value="1">First Year</option>
                <option value="2">Direct Second Year</option>
            </select>
        </div>
    </div>
    <div class="forms">
        <form role="form" class="form-horizontal" action="/enquiry/degree/create" method="post" id="feForm">
            {{ csrf_field() }}
            <input type="hidden" id="year" name="year" value="1"/>
            <fieldset>
                <legend>Personal Details</legend>
                <!-- Name fields -->
                <div class="form-group">
                    <label class="control-label col-md-2" for="lastName">Last Name: </label>
                    <div class="col-md-10">
                        <input type="text" class="form-control col-md-10" id="lastName" name="lastName"
                               value="{{old('lastName')}}" placeholder="Last Name"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="firstName">First Name: </label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="firstName" name="firstName"
                               value="{{old('firstName')}}" placeholder="First Name"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="middleName">Middle Name: </label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="middleName" name="middleName"
                               value="{{old('middleName')}}" placeholder="Middle Name">
                    </div>
                </div>
                <!-- Name fields -->
                <div class="form-group">
                    <label for="email" class="control-label col-md-2">Email</label>
                    <div class="col-md-10">
                        <input type="email" class="form-control" id="email" name="email"
                               value="{{old('email')}}" placeholder="janedoe@example.com"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="contactNo" class="control-label col-md-2">
                        Contact No
                    </label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="contactNo" name="contactNo"
                               placeholder="Contact">
                    </div>
                </div>
                <div class="form-group">
                    <label for="contactNo" class="control-label col-md-2">Mobile No</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="mobileNo" name="mobileNo"
                               placeholder="Mobile No">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="residentialArea">Residential Area</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="residentialArea"
                               id="residentialArea" list="residentialAreasList"/>
                        <datalist id="residentialAreasList">
                            <option value="Malad"></option>
                            <option value="Borivali"></option>
                            <option value="Boisar"></option>
                        </datalist>
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <legend>Course Details</legend>
                <div class="form-group">
                    <label class="control-label col-md-2">Course</label>
                    <div class="col-md-10">
                        @if(count($courses) > 0)
                            @foreach($courses as $key => $course)
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="courses[{{$key}}]" name="courses[{{$key}}]"
                                               value="{{$course->id}}"/>
                                        {{$course->name}}
                                    </label>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class=" control-label col-md-2" for="sscPercentage">SSC %</label>
                    <div class="col-md-10">
                        <input type="number" class="form-control" name="sscPercentage" id="sscPercentage"
                               step="0.01" min="35" max="100" value="{{old('sscPercentage')}}"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="hscPercentage">HSC %</label>
                    <div class="col-md-10">
                        <input type="number" class="form-control" name="hscPercentage" id="hscPercentage"
                               step="0.01" min="40" max="100" value="{{old('hscPercentage')}}"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">HSC Marks</label>
                    <div class="col-md-3">
                        <input type="number" class="form-control" name="hscPhysics" id="hscPhysics"
                               max="100" min="40" placeholder="Physics" value="{{old('hscPhysics')}}"/>
                    </div>
                    <div class="col-md-3">
                        <input type="number" class="form-control" name="hscChemistry" id="hscChemistry"
                               max="100" min="40" placeholder="Chemistry" value="{{old('hscChemistry')}}"/>
                    </div>
                    <div class="col-md-3">
                        <input type="number" class="form-control" name="hscMaths" id="hscMaths"
                               max="100" min="40" placeholder="Mathematics" value="{{old('hscMaths')}}"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="jeeMainScore" class="control-label col-md-2">JEE Main Score</label>
                    <div class="col-md-3">
                        <input type="number" class="form-control" id="jeeMainScore"
                               name="jeeMainScore" value="{{old('jeeMainScore')}}"/>
                    </div>
                </div>
            </fieldset>
            <hr/>
            <div class="form-group">
                <div class="col-md-offset-1">
                    <button type="submit" class="btn btn-success ">Generate Enquiry</button>
                    <button type="reset" class="btn btn-danger ">Reset</button>
                </div>
            </div>
        </form>
        <form role="form" class="form-horizontal" action="/enquiry/degree/create" method="post" id="seForm">
            {{ csrf_field() }}
            <input type="hidden" id="year" name="year" value="2"/>
            <fieldset>
                <legend>Personal Details</legend>
                <!-- Name fields -->
                <div class="form-group">
                    <label class="control-label col-md-2" for="lastName">Last Name: </label>
                    <div class="col-md-10">
                        <input type="text" class="form-control col-md-10" id="lastName" name="lastName"
                               value="{{old('lastName')}}" placeholder="Last Name"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="firstName">First Name: </label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="firstName" name="firstName"
                               value="{{old('firstName')}}" placeholder="First Name"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="middleName">Middle Name: </label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="middleName" name="middleName"
                               value="{{old('middleName')}}" placeholder="Middle Name">
                    </div>
                </div>
                <!-- Name fields -->
                <div class="form-group">
                    <label for="email" class="control-label col-md-2">Email</label>
                    <div class="col-md-10">
                        <input type="email" class="form-control" id="email" name="email"
                               value="{{old('email')}}" placeholder="janedoe@example.com"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="contactNo" class="control-label col-md-2">
                        Contact No
                    </label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="contactNo" name="contactNo"
                               value="{{old('contactNo')}}" placeholder="Contact">
                    </div>
                </div>
                <div class="form-group">
                    <label for="contactNo" class="control-label col-md-2">Mobile No</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="mobileNo" name="mobileNo"
                               value="{{old('mobileNo')}}" placeholder="Mobile No">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="residentialArea">Residential Area</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="residentialArea"
                               id="residentialArea" list="residentialAreasList"/>
                        <datalist id="residentialAreasList">
                            <option value="Malad"></option>
                            <option value="Borivali"></option>
                            <option value="Boisar"></option>
                        </datalist>
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <legend>Course Details</legend>
                <div class="form-group">
                    <label class="control-label col-md-2">Course(s)</label>
                    <div class="col-md-10">
                        @if(count($courses) > 0)
                            @foreach($courses as $key => $course)
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="courses[{{$key}}]" name="courses[{{$key}}]"
                                               value="{{$course->id}}"/>
                                        {{$course->name}}
                                    </label>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class=" control-label col-md-2" for="sscPercentage">SSC %</label>
                    <div class="col-md-10">
                        <input type="number" class="form-control" name="sscPercentage"
                               id="sscPercentage" step="0.01" min="35" max="100"
                               value="{{old('sscPercentage')}}"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class=" control-label col-md-2" for="diplomaPercentage">Diploma %</label>
                    <div class="col-md-10">
                        <input type="number" class="form-control" name="diplomaPercentage"
                               id="diplomaPercentage" step="0.01" min="35" max="100"
                               value="{{ old('diplomaPercentage') }}"/>
                    </div>
                </div>
            </fieldset>
            <hr/>
            <div class="form-group">
                <div class="col-md-offset-1">
                    <button type="submit" class="btn btn-success ">Generate Enquiry</button>
                    <button type="reset" class="btn btn-danger ">Reset</button>
                </div>
            </div>
        </form>
    </div>

@stop

@section('scripts')
    <script type="text/javascript">
        $(function () {
            $('#degreeFormSelector').change(function (data) {
                $('.forms > form').hide();
                if (data.target.value == '1') {
                    //show first year admission form
                    $('#feForm').show();
                } else if (data.target.value == '2') {
                    //show direct second year admission form
                    $('#seForm').show();
                } else {
                    // show error message
                    alert('Invalid Choice.');
                    return false;
                }
            });
        });
    </script>
@stop
