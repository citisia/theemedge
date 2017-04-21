@extends('layouts.app')

@section('content')
    @include('shared.flash_data')
    <div class="row" style="margin-top: 10px;">
        <div class="col-md-6"></div>
        <div class="col-md-6">
            <div class="clearfix">
                <a href="{{ route('users.create') }}" class="btn btn-success pull-right">
                    <i class="fa fa-plus fa-fw"></i> New User
                </a>
            </div>
        </div>
    </div>
    <hr />
    <table class="table table-bordered table-hover datatable">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>User Created At</th>
            
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ date('M j, Y', strtotime($user->created_at)) }}</td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>User Created At</th>
        </tr>
        </tfoot>
    </table>

   
@endsection