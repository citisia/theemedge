@extends('layouts.app')
@section('content')
    @include('shared.flash_data');
    <div class="page-header clearfix">
        <h4 class="pull-left">Departments</h4>
        <div class="pull-right">
            <button class="btn btn-primary" data-toggle="modal" data-target="#newDepartmentModal">
                <i class="fa fa-fw fa-plus"></i> New Department
            </button>
        </div>
    </div>
    @if(count($departments) > 0)
        <table class="table table-bordered table-hover datatable">
            <thead>
            <tr>
                <th>Name</th>
                <th>Founded On</th>
                <th>Head Of Department</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($departments as $department)
                <tr>
                    <td>{{ $department->name }}</td>
                    <td>{{ $department->founded_on }}</td>
                    <td>{{ $department->hodName() }}</td>
                    <td>
                        <a href="{{ url("/settings/department/$department->id/edit/") }}"
                           class="text-warning">
                            <i class="fa fa-fw fa-edit"></i> Edit
                        </a>
                        <span class="divider">|</span>
                        <a href="{{ url("/settings/department/$department->id") }}"
                           class="text-info">
                            <i class="fa fa-fw fa-info"></i> Details
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th>Name</th>
                <th>Founded On</th>
                <th>Head Of Department</th>
                <th></th>
            </tr>
            </tfoot>
        </table>
    @endif
    <div class="modal fade" id="newDepartmentModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">New Department</h4>
                </div>
                <div class="modal-body">
                    <form role="form" id="newDepartmentForm"
                          method="post" action="{{url('/settings/department/')}}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                   value="{{old('name')}}" required/>
                        </div>
                        <div class="form-group">
                            <label for="level">Level</label>
                            <select name="level" id="level" class="form-control">
                                <option selected disabled>Select Level</option>
                                <option value="1">Diploma</option>
                                <option value="2">Degree</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Display Format</label>
                            <div class="input-group">
                                <div class="radio-inline">
                                    <label>
                                        <input type="radio" name="displayFormat" id="displayFormat0" value="0" checked>
                                        Prefix
                                    </label>
                                </div>

                                <div class="radio-inline">
                                    <label>
                                        <input type="radio" name="displayFormat" id="displayFormat1" value="1">
                                        Postfix
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="founded">Founded On</label>
                            <input type="date" class="form-control" id="founded" name="foundedOn"
                                   value="{{old('foundedOn')}}" required/>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description"
                                      name="description">{{old('description')}}</textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" form="newDepartmentForm">
                        <i class="fa fa-fw fa-plus"></i> New Department
                    </button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@stop