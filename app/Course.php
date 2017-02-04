<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Prophecy\Exception\InvalidArgumentException;

class Course extends Model
{
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
                return 'Degree';
                break;
            case 2:
                return 'Diploma';
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
