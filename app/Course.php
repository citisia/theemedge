<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Prophecy\Exception\InvalidArgumentException;

class Course extends Model
{
    use BaseModel;

    public $incrementing = false;

    protected $fillable = [
        'title', 'code', 'level', 'duration'
    ];

    protected $guarded = [
        'departmentId'
    ];

    public function degreeEnquiries()
    {
        return $this->belongsToMany(DegreeEnquiry::class,
            'degree_enquiry_courses','course_id','enquiry_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * Return the course code.
     * @param $value
     * @return string
     */
    public function getCodeAttribute($value)
    {
        return strtoupper($value);
    }

    /**
     * Get the string equivalent of course level.
     * @param $value
     * @return string
     */
    public function getLevelAttribute($value)
    {
        switch ($value) {
            case 1:
                return 'Diploma';
                break;
            case 2:
                return 'Degree';
                break;
            default:
                throw new InvalidArgumentException('Invalid Course Level');
        }
    }

    /**
     * Find a course from the code specified in parameter.
     * @param $code
     * @return mixed
     */
    public function findByCode($code)
    {
        return Course::where('code', $code)->first();
    }

    /**
     * Set the course code property.
     * @param $value
     */
    public function setCodeAttribute($value)
    {
        $this->attributes['code'] = strtolower($value);
    }

}
