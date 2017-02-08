<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DegreeAdmissionEnquiry extends Model
{
    use BaseModel;

    public function comments()
    {
        return $this->hasMany(DegreeAdmissionEnquiryComment::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class,
            'degree_admission_enquiry_courses','enquiry_id','course_id');
    }
}
