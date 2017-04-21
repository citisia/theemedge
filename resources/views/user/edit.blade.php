@extends('layouts.app')

@section('styles')
    <style type="text/css">
        #seForm, #feForm {
            display: none;
        }
    </style>
@stop

@section('content')
    <div class="page-header">
        <h4> User Edit Form </h4>
    </div>
    @include('shared.flash_data')
    <div class="forms">
        <form role="form" action="{{route('user.update', $user->id)}}" method="POST" class="">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <fieldset>
               
                <div class="form-group">
                    <label class="" for="name">Name: </label>
                    <input type="text" class="form-control" id="name" name="name"
                           value="{{$user->name}}"/>
                </div>

                <div class="form-group">
                    <label class="" for="name">Username: </label>
                    <input type="text" class="form-control" id="username" name="username"
                           value="{{$user->username}}"/>
                </div>
                <div class="form-group">
                    <label class="" for="name">Email: </label>
                    <input type="text" class="form-control" id="email" name="email"
                           value="{{$user->email}}"/>
                </div>

               

            </fieldset>
            <hr/>
            <div class="form-group">
                <button type="submit" class="btn btn-success ">Submit</button>
                <button type="reset" class="btn btn-danger ">Reset</button>
            </div>
        </form>
    </div>

@stop
