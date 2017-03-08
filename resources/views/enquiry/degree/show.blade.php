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
                <p>
                    <strong>Course(s) selected: </strong>
                <ul>
                    @foreach($enquiry->courses as $course)
                        <li>{{$course->title}}</li>
                    @endforeach
                </ul>
                </p>
            </div>
            <div class="col-md-6">
                <a href="{{route('degree.print', $enquiry)}}" class="btn btn-primary">
                    <i class="fa fa-fw fa-print"></i> Prirt
                </a>
                <button class="btn btn-success" {{ $enquiry->status === 0 ? '' : 'disabled' }} data-toggle="modal"
                        data-target="#approve-modal">
                    <i class="fa fa-fw fa-check"></i> Send to Admin
                </button>
                <a href="#"
                   class="btn btn-danger"
                   {{ $enquiry->status === 0 ? '' : 'disabled' }}
                   onclick="event.preventDefault(); document.getElementById('reject-from').submit();">
                    <i class="fa fa-fw fa-remove"></i> Reject
                </a>
                <button id="reject-from" class="hidden" method="post"
                        action="{{ route('degree.reject', $enquiry)  }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="_enquiry" value="{{ bcrypt($enquiry->id) }}"/>
                </button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div id="enquiry">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5 class="panel-title">Personal Details</h5>
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
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h5 class="panel-title">Comments</h5>
        </div>
        <div class="panel-body">
            <form class="" role="form" action="{{route('enquiry.comment')}}" method="post">
                {{csrf_field()}}
                <input type="hidden" name="_type" value="degree"/>
                <input type="hidden" name="_enquiry" value="{{$enquiry->id}}"/>
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
                <div class="panel-group">
                    @foreach($enquiry->comments as $comment)
                        <div class="panel panel-default">
                            <div class="panel-heading clearfix">
                                <span class="pull-left">
                                Commented By <strong>{{ $comment->user->name }}</strong>
                                </span>
                                <span class="pull-right">{{ $comment->createdAt->diffForHumans() }}</span>
                            </div>
                            <div class="panel-body">
                                {{ $comment->body }}
                            </div>
                            @endforeach
                        </div>
                        @else
                            <strong>No Comments Yet</strong>
                        @endif
                </div>
        </div>
    </div>

    <div class="modal fade" id="approve-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Please approve the course</h4>
                </div>
                <div class="modal-body">
                    <form id="approve-from" method="post" action="{{ route('degree.approve', $enquiry)  }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="_enquiry" value="{{ bcrypt($enquiry->id) }}"/>
                        <div class="form-group">
                            <label for="approved_course">Course: </label>
                            <select class="form-control" id="approved_course" name="approved_course">
                                @foreach($enquiry->courses as $course)
                                    <option value="{{$course->id}}">{{ $course->title  }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Send to Admin</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@stop