<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DegreeEnquiry extends Model
{
    use BaseModel;

    public $incrementing = false;

    protected $fillable = [
        'firstName','middleName','lastName','contactNo','mobileNo',
        'gender',
        'appliedForYear','sscPercentage',
        'hscPercentage','cetPhysics','cetChemistry','cetMaths','jeeMainScore',
        'diplomaPercentage','
        residentialArea'
    ];

    protected $guarded = [ 'status' ];

    public function approvedCourse()
    {
        return $this->belongsTo(Course::class, 'approved_course_id');
    }

    public function comments()
    {
        return $this->morphMany(EnquiryComment::class, 'commentable');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class,
            'degree_enquiry_courses','enquiry_id','course_id');
    }

    public function getNameAttribute()
    {
        return sprintf('%s %1s. %s',$this->firstName, substr($this->middleName,0,1), $this->lastName);
    }

    public function getYearStringAttribute()
    {
        return ($this->appliedForYear == 1 ? 'First' : 'Direct Second').' Year';
    }

    public function getYearShortCodeAttribute()
    {
        return ($this->appliedForYear == 1) ? 'FE' : 'DSE';
    }
}
