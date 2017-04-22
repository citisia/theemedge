<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use BaseModel;

    public $incrementing = false;
    /**
     * The users that belong to the role.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users() {
        return $this->belongsToMany(User::class, 'user_roles', 'role_id', 'user_id');
    }

    public function getNormalizedNameAttribute()
    {
      return strtoupper($this->name);
    }

    public static function getAssignableRoles()
    {
        return Role::get()->reject(function ($role) {
            return $role->active === strtoupper('sudo');
        });
    }
}
