@extends('layouts.app')

@section('content')
    <div class="page-header">
        <h5 class="">
            Enquiry Details
        </h5>
        <div class="row">
            <div class="col-md-6">
                <span><strong>Status: </strong> {{ ucfirst($enquiry->status)}}</span> <br/>
                <span><strong>Created on </strong>{{ $enquiry->createdAt }}</span> <br/>
                <span><strong>Last updated on </strong>{{ $enquiry->updatedAt->toDayDateTimeString() }}</span> <br/>
                <span><strong>Applied for</strong> {{ $enquiry->yearString }} </span><br/>
                <span>
                    <strong>Course(s) selected: </strong>
                    <ul>
                        @foreach($enquiry->courses as $course)
                            <li>{{$course->name}}</li>
                        @endforeach
                    </ul>
                </span>
            </div>
            <div class="col-md-6">
                <a href="{{route('degree.print', $enquiry)}}" class="btn btn-primary">
                    <i class="fa fa-fw fa-print"></i> Prirt
                </a>
                <a href="#"
                   class="btn btn-success"
                   {{ $enquiry->status === 0 ? '' : 'disabled' }}
                   onclick="event.preventDefault(); document.getElementById('approve-from').submit();">
                    <i class="fa fa-fw fa-check"></i> Send to Admin
                </a>
                <form id="approve-from" class="hidden" method="post"
                      action="{{ route('degree.approve', $enquiry)  }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="_enquiry" value="{{ bcrypt($enquiry->id) }}"/>
                </form>
                <a href="#"
                   class="btn btn-danger"
                   {{ $enquiry->status === 0 ? '' : 'disabled' }}
                   onclick="event.preventDefault(); document.getElementById('reject-from').submit();">
                    <i class="fa fa-fw fa-remove"></i> Reject
                </a>
                <form id="reject-from" class="hidden" method="post"
                      action="{{ route('degree.reject', $enquiry)  }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="_enquiry" value="{{ bcrypt($enquiry->id) }}"/>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div id="enquiry">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5 class="panel-title">Persoanl Details</h5>
                    </div>
                    <div class="panel-body">
                        <div>
                            <strong><i class="fa fa-fw fa-user"></i> Full Name: </strong> {{ $enquiry->name }}
                        </div>
                        <div>
                            <strong><i class="fa fa-fw fa-mobile"></i> Mobile No: </strong> {{ $enquiry->contactNo }}
                        </div>
                        <div>
                            <strong><i class="fa fa-fw fa-phone-square"></i> Contact No:
                            </strong> {{ $enquiry->mobileNo }}
                        </div>
                        <div>
                            <strong><i class="fa fa-fw fa-location-arrow"></i> Residential Area:
                            </strong> {{ $enquiry->residentialArea }}
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5 class="panel-title">Academics Details</h5>
                    </div>
                    <div class="panel-body">
                        <strong>SSC Percentage: </strong> {{ $enquiry->sscPercentage }}&percnt;<br/>
                        @if($enquiry->appliedForYear == 1)
                            <strong>HSC Percentage: </strong> {{ $enquiry->hscPercentage }}&percnt;<br/>
                            <strong>HSC Physics: </strong> {{ $enquiry->cetPhysics }} <br/>
                            <strong>HSC Chemistry: </strong> {{ $enquiry->cetChemistry }} <br/>
                            <strong>HSC Mathematics: </strong> {{ $enquiry->cetMaths }} <br/>
                            <strong>JEE Main Score: </strong> {{ $enquiry->jeeMainScore }}<br/>
                        @elseif($enquiry->appliedForYear == 2)
                            <strong>Diploma Percentage: </strong> {{ $enquiry->diplomaPercentage}}&percnt;
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h5 class="panel-title">Comments</h5>
                </div>
                <div class="panel-body">
                    <form class="" role="form"
                          action="" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="comment" class="sr-only">Comment</label>
                                <textarea class="form-control" id="comment" name="comment" required
                                          style="resize: none;"></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Add Comment</button>
                        </div>

                    </form>
                    <hr/>
                    @if(count($enquiry->comments) > 0)
                        <ul class="list-group">
                            @foreach($enquiry->comments as $comment)
                                <li class="list-group-item">
                                    Commented on <strong>{{ $comment->createdAt->toDayDateTimeString() }}</strong>
                                    <br/>
                                    {{ $comment->content }}
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <strong>No Comments Yet</strong>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop