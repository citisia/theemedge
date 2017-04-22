<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use BaseModel;

    public $incrementing = false;

    protected $fillable = ['name'];
    /**
     * The users that belong to the role.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users() {
        return $this->belongsToMany(User::class, 'user_roles', 'role_id', 'user_id');
    }

    public function getNameAttribute()
    {
        return title_case($this->attributes['name']);
    }

    public function getNormalizedNameAttribute()
    {
      return strtoupper($this->name);
    }

    public static function getAssignableRoles()
    {
        return Role::get();
    }
}
