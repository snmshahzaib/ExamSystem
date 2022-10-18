<?php

namespace App\Policies;

use App\Models\Subjective;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SubjectivePolicy
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

    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Subjective  $subjective
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Subjective $subjective)
    {
        
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->role == 'teacher';
    }


    public function edit(User $user, Subjective $subjective)
    {
         if ($user->role == 'teacher' && $user->id == $subjective->paper->teacher_id)
            return true;
        else
            return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Subjective  $subjective
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Subjective $subjective)
    {
         if ($user->role == 'teacher' && $user->id == $subjective->paper->teacher_id)
            return true;
        else
            return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Subjective  $subjective
     * @return \Illuminate\Auth\Access\Response|bool
     */
     public function delete(User $user, Subjective $subjective)
    {
         if ($user->role == 'teacher' && $user->id == $subjective->paper->teacher_id)
            return true;
        else
            return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Subjective  $subjective
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Subjective  $subjective
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user)
    {
        //
    }
}
