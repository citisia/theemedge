@extends('layouts.app')

@section('content')
    @include('shared.flash_data')
    <div class="row" style="margin-top: 10px;">
        <div class="col-md-6"></div>
        <div class="col-md-6">
            <div class="clearfix">
                <a href="{{ route('user.create') }}" class="btn btn-success pull-right">
                    <i class="fa fa-plus fa-fw"></i> New User
                </a>
            </div>
        </div>
    </div>
    <hr />
    <table class="table table-bordered table-hover datatable">
        <thead>
        <tr>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Created On</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ date('M j, Y', strtotime($user->created_at)) }}</td>
                <td>
                    <a href="{{ route('user.show', $user->id) }}" class="btn btn-sm btn btn-default ">View</a>
                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-default">Edit</a>
                    <a href="{{ route('user.destroy', $user->id) }}" class="btn btn-sm btn-danger btn-default">Delete</a>
                    <a class="btn btn-default btn-xs" href="{{ route('user.show', $user->id) }}">
                        View
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Created on</th>
            <th></th>
        </tr>
        </tfoot>
    </table>
@endsection