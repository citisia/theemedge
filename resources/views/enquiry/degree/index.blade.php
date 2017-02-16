@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <table class="table table-bordered table-hover datatable">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Full Name</th>
                    <th>Status</th>
                    <th>Contact No</th>
                    <th>Enquiry Date</th>
                    <th>Course</th>
                </tr>
                </thead>
                <tbody>
                @foreach($enquiries as $enquiry)
                    <tr>
                        <td>
                            <a href="{{ route('degree.show', ['id' => $enquiry->id]) }}">{{ $enquiry->id }} </a>
                        </td>
                        <td>{{$enquiry->name }}</td>
                        <td>{{ $enquiry->status }}</td>
                        <td>{{ $enquiry->contact_no }}</td>
                        <td>{{ $enquiry->createdAt->toDayDateTimeString() }}</td>
                        <td>{{ $enquiry->course }}</td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Full Name</th>
                    <th>Status</th>
                    <th>Contact No</th>
                    <th>Enquiry Date</th>
                    <th>Course</th>
                </tr>
                </tfoot>
            </table>

            <div class="text-center">
                {!! $enquiries->links() !!}
            </div>
        </div>
    </div>

@endsection