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
    <form role="form"
          method="post" action="{{route('department.update',$department)}}">
        {{csrf_field()}}
        {{method_field('PATCH')}}
        <input type="hidden" name="_department" value="{{ bcrypt($department->id) }}"/>
        <fieldset>
            <legend>Edit {{$department->name}}'s Details</legend>
            <div class="form-group">
                <label for="name" class="control-label">Name</label>
                <input type="text" class="form-control" id="name" name="name"
                       value="{{$department->name}}" required/>
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
                            <input type="radio" name="displayFormat" id="displayFormat0" value="0"
                                    {{ $department->displayFormat == 0 ? 'checked' : '' }} />
                            Prefix
                        </label>
                    </div>

                    <div class="radio-inline">
                        <label>
                            <input type="radio" name="displayFormat" id="displayFormat1" value="1"
                                    {{ $department->displayFormat == 1 ? 'checked' : '' }} />
                            Postfix
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="foundedOn" class="control-label">Founded On</label>
                <input type="text" name="foundedOn" id="foundedOn" class="form-control"
                       value="{{$department->foundedOn}}" required/>
            </div>
            <div class="form-group">
                <label for="hodOfDepartment">Head Of Department: </label>
                <select name="hodOfDepartment" id="hodOfDepartment" class="form-control">
                    <option selected value="-1">{{ $department->headOfDepartment->name or ''}}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="description" class="control-label">Description</label>
                <input type="text" name="description" class="form-control" id="founded"
                       value="{{$department->description}}"/>
            </div>
        </fieldset>
        <div class="form-group">
            <a href="{{ url()->previous() }}" class="btn btn-default">
                <i class="fa fa-fw fa-arrow-circle-o-left"></i> Go Back
            </a>
            <button type="submit" class="btn btn-success">Update Details</button>
        </div>
    </form>
@stop