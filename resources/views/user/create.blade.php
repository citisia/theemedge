@extends('layouts.app')



@section('content')
    <div class="page-header">
        <h4> Create User Form </h4>
    </div>
    @include('shared.flash_data')
    <form role="form" id="admissionForm" action="{{route('user.store')}}" method="post" class="">
        {{ csrf_field() }}
        <fieldset>
            <legend>User Details</legend>
            <div class="form-group">
                <label class="" for="name">Name: </label>
                <input type="text" class="form-control" id="name" name="name"
                       value="{{old('name')}}" placeholder="Name of User"/>
            </div>

            <div class="form-group">
                <label class="" for="username">Username: </label>
                <input type="text" class="form-control" id="username" name="username"
                       value="{{old('username')}}" placeholder="UserName"/>
            </div>

            <div class="form-group">
                <label class="" for="email">Email: </label>
                <input type="text" class="form-control" id="email" name="email"
                       value="{{old('email')}}" placeholder="Email"/>
            </div>

            <div class="form-group">
                <label class="" for="dateOfBirth">Date Of Birth: </label>
                <input type="date" class="form-control" id="dateOfBirth" name="dateOfBirth"
                       value="{{old('dateOfBirth')}}" placeholder="Date Of Birth"/>
            </div>

            <div class="form-group">
                <label class="" for="password">Password: </label>
                <input type="password" class="form-control" id="password" name="password"
                       value="{{old('password')}}" placeholder="Password"/>
            </div>
        </fieldset>
        <fieldset>
            <legend>Assign Role(s):</legend>
            <div class="form-group form-group-lg">
                @foreach($roles as $role)
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="roles[]"
                                   value="{{$role->id}}" aria-label="{{ $role->name }}">
                            {{ $role->name }}
                        </label>
                    </div>

                @endforeach
            </div>
        </fieldset>
        <fieldset>
            <div class="form-group">
                <button type="submit" class="btn btn-success ">Submit</button>
                <button type="reset" class="btn btn-danger ">Reset</button>
            </div>
        </fieldset>
    </form>

@stop


