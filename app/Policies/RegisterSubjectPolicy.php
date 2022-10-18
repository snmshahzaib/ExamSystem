<?php

namespace App\Policies;

use App\Models\RegisterSubject;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RegisterSubjectPolicy
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
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\RegisterSubject  $registerSubject
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user)
    {
        return $user->role == 'student';
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->role == 'student';
    }



    public function edit(User $user, RegisterSubject $registerSubject)
    {
        if ($user->role == 'student' && $user->id == $registerSubject->student_id)
            return true;
        else
            return false;
    }
    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\RegisterSubject  $registerSubject
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, RegisterSubject $registerSubject)
    {
        if ($user->role == 'student' && $user->id == $registerSubject->student_id)
            return true;
        else
            return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\RegisterSubject  $registerSubject
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, RegisterSubject $registerSubject)
    {
        if ($user->role == 'student' && $user->id == $registerSubject->student_id)
            return true;
        else
            return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\RegisterSubject  $registerSubject
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, RegisterSubject $registerSubject)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\RegisterSubject  $registerSubject
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, RegisterSubject $registerSubject)
    {
        //
    }
}
