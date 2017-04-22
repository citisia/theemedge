@extends('layouts.app')

@section('content')
    @include('shared.flash_data')
    <div class="row" style="margin-top: 10px;">
        <div class="col-md-6"></div>
        <div class="col-md-6">
            <div class="clearfix">
                <a href="{{ route('degree.create') }}" class="btn btn-success pull-right">
                    <i class="fa fa-plus fa-fw"></i> New Enquiry
                </a>
            </div>
        </div>
    </div>
    <hr />
    <table class="table table-bordered table-hover datatable">
        <thead>
        <tr>
            <th>Full Name</th>
            <th>Year</th>
            <th>Contact No</th>
            <th>Enquiry Date</th>
            <th>Status</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($enquiries as $enquiry)
            <tr>
                <td>{{ $enquiry->name }}</td>
                <td>{{ $enquiry->yearShortCode }}</td>
                <td>{{ $enquiry->contact_no }}</td>
                <td>{{ $enquiry->createdAt->toDayDateTimeString() }}</td>
                <td>{{ $enquiry->status }}</td>
                <td>
                <td>
                    <a class="btn btn-xs btn-default"
                       href="{{ route('degree.show', ['id' => $enquiry->id]) }}">
                        View </a>
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>Full Name</th>
            <th>Year</th>
            <th>Status</th>
            <th>Contact No</th>
            <th>Enquiry Date</th>
            <th></th>
        </tr>
        </tfoot>
    </table>

    <div class="text-center">
        {!! $enquiries->links() !!}
    </div>
@endsection