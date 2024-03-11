<?php

namespace App\Repositories\ChatBot;

use App\Models\BlackList;

class ChatsRepository
{
    public function validarSesion ($telefono) {
        $query = BlackList::where('contacto', $telefono);

        return $query->count() > 0;
    }
    
    public function registrarSolicitudInstalacion ($solicitud) {

    }

    public function registrarChatBlackList ($telefono) {
        $registro = new BlackList();
        $registro->contacto = $telefono;
        $registro->save();
    }
}
