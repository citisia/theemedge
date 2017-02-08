<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DegreeAdmissionEnquiryComment extends Model
{
    use BaseModel;

    public function enquiry()
    {
        return $this->belongsTo(DegreeAdmissionEnquiry::class);
    }
}
