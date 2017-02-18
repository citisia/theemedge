@extends('layouts.app')

@section('content')

    @if(count($errors))
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="page-header clearfix">
        <h4 class="pull-left">Department: {{ $department->name }} </h4>
        <div class="pull-right">
            <a href="{{ url('/settings/department/'.$department->id.'/edit') }}" class="btn btn-warning">
                <i class="fa fa-fw fa-edit"></i> Edit
            </a>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
                <i class="fa fa-fw fa-trash-o"></i> Delete
            </button>
        </div>
    </div>
    <div class="department-details">
        <p>Founded On: {{ $department->founded_on }}</p>
        <p>Level : {{$department->level}}</p>
        <p>Head of Department: {{ $department->headOfDepartment->name or 'Not Assigned' }}</p>
        <p>
            Description: {{$department->description or 'No Description Available' }}  </p>
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
                    <h5>Are you sure, you want to delete Department of {{ $department->name }} ?</h5>
                    <p class="text-danger">Note: This is an irreversible action.</p>
                </div>
                <div class="modal-footer">
                    <form class="" method="post" id="deleteDepartmentForm"
                          action={{ route('department.destroy', $department) }}>
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                        <input type="hidden" name="_department" value="{{bcrypt($department->id)}}">
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-fw fa-trash-o"></i> Delete
                        </button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
@stop