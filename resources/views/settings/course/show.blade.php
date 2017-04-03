@extends('layouts.app')

@section('content')
    @include('shared.flash_data');
    <div class="page-header clearfix">
        <h4 class="pull-left">Course: {{ $course->title }} </h4>
        <div class="pull-right">
            <a href="{{ route('course.edit', $course) }}" class="btn btn-warning">
                <i class="fa fa-fw fa-edit"></i> Edit
            </a>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
                <i class="fa fa-fw fa-trash"></i> Delete
            </button>
        </div>
    </div>
    <div class="course-details">
        <p>Code: {{$course->code}}</p>
        <p>Level: {{ $course->level }}</p>
        <p>Duration: {{  $course->duration }} Years</p>
        <p>Affiliated Department: {{ $course->department->name }}</p>
        <p>Head of Department: {{ $course->department->hodName() }}</p>
        <p>Last Updated on {{$course->updatedAt}}</p>
        <p>Description: {{empty($course->description) ? 'No Description Available' : $course->description}}  </p>

    </div>
    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
                </div>
                <div class="modal-body">
                    <h5>Are you sure, you want to delete {{ $course->name }} course?</h5>
                    <p class="text-danger">Note: This is an irreversible action.</p>
                </div>
                <div class="modal-footer">
                    <form class="hidden" method="post" id="deleteCourseForm"
                          action={{ url('/settings/course', $course->id) }}>
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <input type="hidden" name="_course" value="{{bcrypt($course->id)}}">
                    </form>
                    <button type="submit" class="btn btn-danger" form="deleteCourseForm">
                        <i class="fa fa-trash fa-fw"></i>Delete Course
                    </button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
@stop