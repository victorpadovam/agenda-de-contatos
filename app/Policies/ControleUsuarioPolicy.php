<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class ControleUsuarioPolicy
{
   public function acessoAPaginaContatos(User $user) {
    if ($user->permissao_do_usuario == "IsAdmin") {
        return true;
    }

    return false;
   }
}
