<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserManagementPolicy
{
  use HandlesAuthorization;

  /**
  * Create a new policy instance.
  *
  * @return void
  */
  public function __construct()
  {
    //
  }

  public function before(User $user)
  {
    return true;
  }

  public function browse(User $user)
  {
    return true;
  }

  public function read(User $user, User $target)
  {
    if($user->id == $user->id)
    {
      return $true;
    }  else {
      return false;
    }
  }
}
