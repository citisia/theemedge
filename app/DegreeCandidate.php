<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DegreeCandidate extends Model
{
    use BaseModel;

    public $incrementing = false;

    protected $fillable = [
        'first_name', 'middle_name', 'last_name', 'contact_no', 'mobile_no',
        'applied_for_year', 'ssc_percentage',
        'hsc_percentage', 'cet_physics', 'cet_chemistry', 'cet_maths', 'jee_main_score',
        'diploma_percentage', 'residential_area'
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
