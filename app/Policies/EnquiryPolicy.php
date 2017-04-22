<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EnquiryPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     *
     */
    public function __construct()
    {
        //
    }

    public function browse(User $user)
    {
        return $user->hasAnyRole(['reception', 'management']);
    }
}
