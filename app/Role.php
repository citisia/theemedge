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


}
