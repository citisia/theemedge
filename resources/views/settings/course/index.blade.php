@extends('layouts.app')
@section('content')
    <div class="page-header clearfix">
        <h4 class="pull-left">Courses</h4>
        <div class="pull-right">
            <button class="btn btn-primary" data-toggle="modal"
                    data-target="#createCourseModal" {{ (count($departments) > 0) ? '': 'disabled' }}>
                <i class="fa fa-fw fa-plus"></i> New Course
            </button>
        </div>
    </div>
    @if(count($courses) > 0)
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Code</th>
                <th>Title</th>
                <th>Level</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($courses as $course)
                <tr>
                    <td>{{ $course->code }}</td>
                    <td>{{ $course->title }}</td>
                    <td>{{ $course->level }}</td>
                    <td>
                        <a href="{{ route('course.edit', $course) }}"
                           class="text-warning">
                            <i class="fa fa-fw fa-edit"></i> Edit
                        </a>
                        <span class="divider">|</span>
                        <a href="{{ route('course.show',$course) }}"
                           class="text-info">
                            <i class="fa fa-fw fa-info"></i> Details
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th>Code</th>
                <th>Title</th>
                <th>Duration</th>
                <th></th>
            </tr>
            </tfoot>
        </table>
    @else
    @endif

    <!-- Create Course Form Modal -->
    <div class="modal fade" id="createCourseModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Enter Course Details</h4>
                </div>
                <div class="modal-body">
                    <form role="form" id="createCourseForm" action="/settings/course"
                          method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name" class="control-label">Name</label>
                            <input type="text" class="form-control" id="title" name="title"
                                   value="{{old('title')}}" required/>
                        </div>
                        <div class="form-group">
                            <label for="code" class="control-label">Code</label>
                            <input type="text" class="form-control" name="code" id="code"
                                   minlength="2" maxlength="4" value="{{old('code')}}" required/>
                        </div>
                        <div class="form-group">
                            <label for="level" class="control-label ">Level</label>
                            <select name="level" id="level" class="form-control" required>
                                <option value="1">Diploma</option>
                                <option value="2">Degree</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="duration" class="control-label ">Duration</label>
                            <input type="number" class="form-control" name="duration" id="duration"
                                   min="2" max="5" value="{{old('duration')}}"/>

                        </div>
                        <div class="form-group">
                            <label for="departmentId" class="control-label">Department</label>
                            <select name="departmentId" id="departmentId" class="form-control" required>
                                <option selected disabled>Select Department</option>
                                @if(count($departments) > 0)
                                    @foreach($departments as $department)
                                        <option value="{{ $department->id }}">{{$department->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description"
                                      class="form-control">{{old('description')}}</textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" form="createCourseForm">Create Course</button>
                    <button type="reset" class="btn btn-danger" form="createCourseForm">Reset</button>
                </div>
            </div>
        </div>
    </div>
@stop