<?php

namespace App\Http\Controllers\AdmissionEnquiry;


use App\EnquiryComment;
use App\Http\Controllers\Controller;
use Facades\App\Services\AdmissionEnquiry\DegreeEnquiryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnquiryCommentController extends Controller
{
    public function __invoke(Request $request)
    {
        $status = null;
        $this->validate($request, [
            'comment' => 'bail|required|min:2'
        ]);

        $comment = new EnquiryComment();
        $comment->body = $request->get('comment');
        $comment->user()->associate(Auth::user());

        if ($request->get('_type') == 'degree') {
            $enquiry = DegreeEnquiryService::findById($request->get('_enquiry'));
            $status = DegreeEnquiryService::comment($enquiry, $comment);
        }

        if(!$status)
            return back()->withErrors('An error occurred while saving your comment.');

        return back();
    }
}
