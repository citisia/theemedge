@extends('layouts.app')

@section('content')
    @include('shared.flash_data');
    <div class="">
        <div class="page-header clearfix">
            <h4 class="pull-left">Degree Fees Records</h4>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('fees.degree.create') }}">
                    <i class="fa fa-plus fa-fw"></i> New Fees Record
                </a>
            </div>
        </div>
    </div>
@endsection