<?php

namespace App\Policies;

use App\Models\User;
use App\Models\servicios;
use Illuminate\Auth\Access\HandlesAuthorization;

class ServiciosPolicy
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
        //bloquear acceso al cliente a ver los servicios creados en el panel de administrador
        return $user->rol === 1;

    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\servicios  $servicios
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, servicios $servicios)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
         //bloquear acceso al cliente a ver crear servicios
         return $user->rol === 1;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\servicios  $servicios
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, servicios $servicios)
    {
        //evitando que solo la persona administradora pueda editar
        return $user->id === $servicios->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\servicios  $servicios
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, servicios $servicios)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\servicios  $servicios
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, servicios $servicios)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\servicios  $servicios
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, servicios $servicios)
    {
        //
    }
}
