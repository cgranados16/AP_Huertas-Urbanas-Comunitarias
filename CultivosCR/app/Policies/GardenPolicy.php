<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Garden;
use Illuminate\Auth\Access\HandlesAuthorization;

class GardenPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the garden.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Garden  $garden
     * @return mixed
     */
    public function view(User $user, Garden $garden)
    {
        return $user->id === $garden->IdManager;
    }

    /**
     * Determine whether the user can create gardens.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the garden.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Garden  $garden
     * @return mixed
     */
    public function update(User $user, Garden $garden)
    {
        //
    }

    /**
     * Determine whether the user can delete the garden.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Garden  $garden
     * @return mixed
     */
    public function delete(User $user, Garden $garden)
    {
        //
    }
}
