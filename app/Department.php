<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use BaseModel;

    protected $fillable = [
        'name', 'foundedOn', 'level', 'displayFormat', 'description'
    ];

    protected $hidden = [
      'display_format'
    ];

    /**
     * Return the course for the department
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function course()
    {
        return $this->hasOne(Course::class);
    }

    public function getNameAttribute($value)
    {
        if($this->attributes['display_format'] == 1)
            return title_case($value.' Department');
        else
            return title_case('Department of '.$value);
    }
    /**
     * Return the Head of Department
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function headOfDepartment()
    {
        return $this->hasOne(User::class);
    }

    public function hodName()
    {
        $user = $this->headOfDepartment();
        return ($user == null) ? $user->name : "Not Assigned";
    }

    /**
     * Return the users in the department
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function members()
    {
        return $this->hasMany(User::class);
    }


    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
    }
}
