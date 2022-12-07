<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Gender;
use Illuminate\Auth\Access\HandlesAuthorization;

class GenderPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->can('view_any_gender');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Gender  $gender
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Gender $gender)
    {
        return $user->can('view_gender');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('create_gender');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Gender  $gender
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Gender $gender)
    {
        return $user->can('update_gender');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Gender  $gender
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Gender $gender)
    {
        return $user->can('delete_gender');
    }

    /**
     * Determine whether the user can bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function deleteAny(User $user)
    {
        return $user->can('delete_any_gender');
    }

    /**
     * Determine whether the user can permanently delete.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Gender  $gender
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Gender $gender)
    {
        return $user->can('force_delete_gender');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDeleteAny(User $user)
    {
        return $user->can('force_delete_any_gender');
    }

    /**
     * Determine whether the user can restore.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Gender  $gender
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Gender $gender)
    {
        return $user->can('restore_gender');
    }

    /**
     * Determine whether the user can bulk restore.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restoreAny(User $user)
    {
        return $user->can('restore_any_gender');
    }

    /**
     * Determine whether the user can replicate.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Gender  $gender
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function replicate(User $user, Gender $gender)
    {
        return $user->can('replicate_gender');
    }

    /**
     * Determine whether the user can reorder.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function reorder(User $user)
    {
        return $user->can('reorder_gender');
    }

}
