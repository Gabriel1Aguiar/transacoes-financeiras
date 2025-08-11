<?php

namespace App\Policies;

use App\Models\Transacao;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TransacaoPolicy
{
    public function viewAny(User $user): bool
    {
        return false;
    }

    public function view(User $user, Transacao $transacao): bool
    {
        return $user->id === $transacao->user_id;
    }

    
    public function create(User $user): bool
    {
        return false;
    }

    public function update(User $user, Transacao $transacao): bool
    {
        return $user->id === $transacao->user_id;
    }


    public function delete(User $user, Transacao $transacao): bool
    {
        return $user->id === $transacao->user_id;;
    }


    public function restore(User $user, Transacao $transacao): bool
    {
        return false;
    }

    public function forceDelete(User $user, Transacao $transacao): bool
    {
        return false;
    }
}
