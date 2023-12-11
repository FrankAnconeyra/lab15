<?php
use App\Models\User;
use App\Models\Comentario;

class ComentarioPolicy
{
    public function delete(User $user, Comentario $comentario)
    {
        return $user->id === $comentario->user_id || $user->hasRole('admin');
    }
}

