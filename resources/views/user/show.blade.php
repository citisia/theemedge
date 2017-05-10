@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <img src="#" class="img img-rounded"/>
            <strong>{{ $user->name }}</strong>
        </div>
        <div class="panel-body">
            <table class="table table-bordered">
                <tr>
                    <td>Joining Date:</td>
                    <td>{{ $user->createdAt->toDayDateTimeString() }}</td>
                </tr>

                <tr>
                    <td>Roles:</td>
                    <td>
                        <ul>
                            <li>
                                @foreach($user->roles as $role )
                                    {{ $role->name }}
                                @endforeach
                            </li>
                        </ul>
                    </td>
                </tr>
            </table>
        </div>
    </div>

@stop
