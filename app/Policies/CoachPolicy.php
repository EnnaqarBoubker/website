<?php

namespace App\Policies;

use App\User;
use App\Coach;
use Illuminate\Auth\Access\HandlesAuthorization;

class CoachPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability){

        if ($user->role == 2 and $ability !="delete"){
            return true;
        }

    }

    /**
     * Determine whether the user can view the coach.
     *
     * @param  \App\User  $user
     * @param  \App\Coach  $coach
     * @return mixed
     */
    public function view(User $user, Coach $coach)
    {
        return true;
    }

    /**
     * Determine whether the user can create coaches.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the coach.
     *
     * @param  \App\User  $user
     * @param  \App\Coach  $coach
     * @return mixed
     */
    public function update(User $user, Coach $coach)
    {
        // return $user->id === $coach->user_id;
    }

    /**
     * Determine whether the user can delete the coach.
     *
     * @param  \App\User  $user
     * @param  \App\Coach  $coach
     * @return mixed
     */
    public function delete(User $user, Coach $coach)
    {
        // return $user->id === $coach->user_id;
    }
}
