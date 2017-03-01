<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DegreeAdmissionEnquiry extends Model
{
    use BaseModel;

    protected $fillable = [
        'firstName','middleName','lastName','contactNo','mobileNo',
        'appliedForYear','sscPercentage',
        'hscPercentage','cetPhysics','cetChemistry','cetMaths','jeeMainScore',
        'diplomaPercentage','
        residentialArea'
    ];

    protected $guarded = [ 'status' ];

    public function comments()
    {
        return $this->morphMany(EnquiryComment::class, 'commentable');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class,
            'degree_admission_enquiry_courses','enquiry_id','course_id');
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
