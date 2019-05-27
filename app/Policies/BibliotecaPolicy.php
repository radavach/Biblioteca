<?php

namespace App\Policies;

use App\User;
use App\Biblioteca;
use Illuminate\Auth\Access\HandlesAuthorization;

class BibliotecaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create bibliotecas.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
        return ($user->esAdmin || ($user->biblioteca_id == $biblioteca->id));
    }

    /**
     * Determine whether the user can update the biblioteca.
     *
     * @param  \App\User  $user
     * @param  \App\Biblioteca  $biblioteca
     * @return mixed
     */
    public function update(User $user, Biblioteca $biblioteca)
    {
        //
        return ($user->esAdmin || ($user->biblioteca_id == $biblioteca->id));
    }

    /**
     * Determine whether the user can delete the biblioteca.
     *
     * @param  \App\User  $user
     * @param  \App\Biblioteca  $biblioteca
     * @return mixed
     */
    public function delete(User $user, Biblioteca $biblioteca)
    {
        //
        return ($user->esAdmin || ($user->biblioteca_id == $biblioteca->id));
    }

}
