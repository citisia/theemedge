@extends('layouts.app')

@section('content')
    <div class="row" style="margin-top: 10px;">
        <div class="col-md-6"></div>
        <div class="col-md-6">
            <div class="clearfix">
                <a href="{{ route('candidate.degree.create') }}" class="btn btn-success pull-right">
                    <i class="fa fa-plus fa-fw"></i> New Admission
                </a>
            </div>
        </div>
    </div>
    <hr />
    @include('shared.flash_data')
    <table class="table table-bordered table-hover datatable">
        <thead>
        <tr>
            <th>Full Name</th>
            <th>Year</th>
            <th>Contact No</th>
            <th>Admission Date</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($candidates as $candidate)
            <tr>
                <td>{{ $candidate->name }}</td>
                <td>{{ $candidate->appliedForYear }}</td>
                <td>{{ $candidate->contact_no }}</td>
                <td>{{ $candidate->createdAt->toDayDateTimeString() }}</td>
                <td>
                    <a class="btn btn-default btn-xs" href="{{ route('candidate.degree.show', ['id' => $candidate->id]) }}">
                        View
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>Full Name</th>
            <th>Year</th>
            <th>Contact No</th>
            <th>Admission Date</th>
            <th></th>
        </tr>
        </tfoot>
    </table>

    <div class="text-center">
        {!! $candidates->links() !!}
    </div>
@endsection