<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DegreeCandidate extends Model
{
    use BaseModel;

    public $incrementing = false;

    protected $fillable = [
        'firstName', 'middleName','lastName', 'fatherName',
        'contactNo','mobileNo',
        'appliedForYear','sscPercentage',
        'hscPercentage','cetPhysics','cetChemistry','cetMaths','jeeMainScore',
        'diplomaPercentage',
    ];


    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function getNameAttribute()
    {
        return sprintf('%s %1s. %s',$this->firstName, substr($this->middleName,0,1), $this->lastName);
    }

}
