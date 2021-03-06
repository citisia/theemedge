@extends('layouts.app')

@section('styles')
    <style type="text/css">
        .forms > form {
            display: none;
        }
    </style>
@stop

@section('content')
    @include('shared.flash_data')
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
        <form role="form" action="{{route('degree.store')}}" method="post" id="feForm" class="">
            {{ csrf_field() }}
            <input type="hidden" id="appliedForYear" name="appliedForYear" value="1"/>
            <fieldset>
                <legend>Personal Details</legend>
                <!-- Name fields -->
                <div class="form-group">
                    <label class="" for="lastName">Last Name: </label>
                    <input type="text" class="form-control" id="lastName" name="lastName"
                           value="{{old('lastName')}}" placeholder="Last Name"/>
                </div>
                <div class="form-group">
                    <label class="" for="firstName">First Name: </label>
                    <input type="text" class="form-control" id="firstName" name="firstName"
                           value="{{old('firstName')}}" placeholder="First Name"/>
                </div>
                <div class="form-group">
                    <label class="" for="middleName">Middle Name: </label>
                    <input type="text" class="form-control" id="middleName" name="middleName"
                           value="{{old('middleName')}}" placeholder="Middle Name">
                </div>
                <!-- Name fields -->
                <div class="form-group">
                    <label for="email" class="">Email</label>
                    <input type="email" class="form-control" id="email" name="email"
                           value="{{old('email')}}" placeholder="janedoe@example.com"/>
                </div>
                <div class="form-group">
                    <label for="contactNo" class="">
                        Contact No
                    </label>
                    <input type="text" class="form-control" id="contactNo" name="contactNo"
                           placeholder="Contact">
                </div>
                <div class="form-group">
                    <label for="contactNo" class="">Mobile No</label>
                    <input type="text" class="form-control" id="mobileNo" name="mobileNo"
                           placeholder="Mobile No">
                </div>
                <div class="form-group">
                    <label class="" for="residentialArea">Residential Area</label>
                    <input type="text" class="form-control" name="residentialArea"
                           id="residentialArea" list="residentialAreasList"/>
                    <datalist id="residentialAreasList">
                        <option value="Malad"></option>
                        <option value="Borivali"></option>
                        <option value="Boisar"></option>
                    </datalist>
                </div>
            </fieldset>
            <fieldset>
                <legend>Course Details</legend>
                <div class="form-group">
                    <label class="">Course</label>
                    @if(count($courses) > 0)
                        @foreach($courses as $key => $course)
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" id="courses[{{$key}}]" name="courses[{{$key}}]"
                                           value="{{$course->id}}"/>
                                    {{$course->title}}
                                </label>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="form-group">
                    <label class=" " for="sscPercentage">SSC %</label>
                    <input type="number" class="form-control" name="sscPercentage" id="sscPercentage"
                           step="0.01" min="35" max="100" value="{{old('sscPercentage')}}"/>
                </div>
                <div class="form-group">
                    <label class="" for="hscPercentage">HSC %</label>
                    <input type="number" class="form-control" name="hscPercentage" id="hscPercentage"
                           step="0.01" min="40" max="100" value="{{old('hscPercentage')}}"/>
                </div>
                <div class="form-group">
                    <label class="">HSC Marks</label>
                    <input type="number" class="form-control" name="hscPhysics" id="hscPhysics"
                           max="100" min="40" placeholder="Physics" value="{{old('hscPhysics')}}"/>
                    <input type="number" class="form-control" name="hscChemistry" id="hscChemistry"
                           max="100" min="40" placeholder="Chemistry" value="{{old('hscChemistry')}}"/>
                    <input type="number" class="form-control" name="hscMaths" id="hscMaths"
                           max="100" min="40" placeholder="Mathematics" value="{{old('hscMaths')}}"/>
                </div>
                <div class="form-group">
                    <label for="jeeMainScore" class="">JEE Main Score</label>
                    <input type="number" class="form-control" id="jeeMainScore"
                           name="jeeMainScore" value="{{old('jeeMainScore')}}"/>
                </div>
            </fieldset>
            <hr/>
            <div class="form-group">
                <button type="submit" class="btn btn-success ">Generate Enquiry</button>
                <button type="reset" class="btn btn-danger ">Reset</button>
            </div>
        </form>
        <form role="form" action="{{route('degree.store')}}" method="post" id="seForm" class="">
            {{ csrf_field() }}
            <input type="hidden" id="appliedForYear" name="appliedForYear" value="2"/>
            <fieldset>
                <legend>Personal Details</legend>
                <!-- Name fields -->
                <div class="form-group">
                    <label class="" for="lastName">Last Name: </label>
                    <input type="text" class="form-control" id="lastName" name="lastName"
                           value="{{old('lastName')}}" placeholder="Last Name"/>
                </div>
                <div class="form-group">
                    <label class="" for="firstName">First Name: </label>
                    <input type="text" class="form-control" id="firstName" name="firstName"
                           value="{{old('firstName')}}" placeholder="First Name"/>
                </div>
                <div class="form-group">
                    <label class="" for="middleName">Middle Name: </label>
                    <input type="text" class="form-control" id="middleName" name="middleName"
                           value="{{old('middleName')}}" placeholder="Middle Name">
                </div>
                <!-- Name fields -->
                <div class="form-group">
                    <label for="email" class="">Email</label>
                    <input type="email" class="form-control" id="email" name="email"
                           value="{{old('email')}}" placeholder="janedoe@example.com"/>
                </div>
                <div class="form-group">
                    <label for="contactNo" class="">Contact No</label>
                    <input type="text" class="form-control" id="contactNo" name="contactNo"
                           value="{{old('contactNo')}}" placeholder="Contact">
                </div>
                <div class="form-group">
                    <label for="contactNo" class="">Mobile No</label>
                    <input type="text" class="form-control" id="mobileNo" name="mobileNo"
                           value="{{old('mobileNo')}}" placeholder="Mobile No">
                </div>
                <div class="form-group">
                    <label class="" for="residentialArea">Residential Area</label>
                    <input type="text" class="form-control" name="residentialArea"
                           id="residentialArea" list="residentialAreasList"/>
                    <datalist id="residentialAreasList">
                        <option value="Malad"></option>
                        <option value="Borivali"></option>
                        <option value="Boisar"></option>
                    </datalist>
                </div>
            </fieldset>
            <fieldset>
                <legend>Course Details</legend>
                <div class="form-group">
                    <label class="">Course(s)</label>
                    @if(count($courses) > 0)
                        @foreach($courses as $key => $course)
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" id="courses[{{$key}}]" name="courses[{{$key}}]"
                                           value="{{$course->id}}"/>
                                    {{$course->title}}
                                </label>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="form-group">
                    <label class=" " for="sscPercentage">SSC %</label>
                    <input type="number" class="form-control" name="sscPercentage"
                           id="sscPercentage" step="0.01" min="35" max="100"
                           value="{{old('sscPercentage')}}"/>
                </div>
                <div class="form-group">
                    <label class="" for="diplomaPercentage">Diploma %</label>
                    <input type="number" class="form-control" name="diplomaPercentage"
                           id="diplomaPercentage" step="0.01" min="35" max="100"
                           value="{{ old('diplomaPercentage') }}"/>
                </div>
            </fieldset>
            <hr/>
            <div class="form-group">
                <button type="submit" class="btn btn-success ">Generate Enquiry</button>
                <button type="reset" class="btn btn-danger ">Reset</button>
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