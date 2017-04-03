@extends('layouts.app')

@section('content')
    @include('shared.flash_data');
    <form role="form" method="post" action="{{ url('/settings/course',$course)}}">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <input type="hidden" name="_course" value="{{bcrypt($course->id)}}"/>
        <fieldset>
            <legend>
                Edit Course Details
            </legend>
            <div class="form-group">
                <label for="title" class="control-label">Title</label>
                <input type="text" class="form-control" id="title" name="title"
                       value="{{$course->title}}" required/>
            </div>
            <div class="form-group">
                <label for="code" class="control-label">Code</label>
                <input type="text" class="form-control" name="courseCode" id="code"
                       minlength="2" maxlength="4" value="{{$course->code}}" required/>
            </div>
            <div class="form-group">
                <label for="level" class="control-label">Level</label>
                <select name="level" id="level" class="form-control" required>
                    <option value="1" {{ ($course->level == 1) ? 'selected' : '' }}>Diploma</option>
                    <option value="2" {{ ($course->level == 2) ? 'selected' : '' }}>Degree</option>
                </select>
            </div>
            <div class="form-group">
                <label for="duration" class="control-label">Duration</label>
                <input type="number" class="form-control" name="duration" id="duration"
                       min="2" max="5" value="{{$course->duration}}"/>
            </div>
            <div class="form-group">
                <label for="departmentId" class="control-label">Department</label>
                <select name="departmentId" id="departmentId" class="form-control" required>
                    <option disabled>Select Department</option>
                    @if(count($departments) > 0)
                        @foreach($departments as $department)
                            <option value="{{ $department->id }}"
                                    {{ $course->department->id == $department->id ? 'selected' : ''}}>
                                {{$department->name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label for="description" class="col-md-1 control-label">Description</label>
                <textarea name="description" id="description"
                          class="form-control">{{$course->description}}</textarea>
            </div>
            <div class="form-group">
                <button type="button" class="btn btn-info">
                    <i class="fa fa-fw fa-arrow-circle-o-left"></i> Go Back
                </button>
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-fw fa-edit"></i> Update
                </button>
            </div>
        </fieldset>
    </form>
@stop