<?php

namespace App\Repositories\ChatBot;

use App\Models\BlackList;
use App\Models\TblSolicitudesInstalacion;

class ChatsRepository
{
    public function validarSesion ($telefono) {
        $query = BlackList::where('contacto', $telefono);

        return $query->count() > 0;
    }
    
    public function registrarSolicitudInstalacion ($solicitud) {
        $registro = new TblSolicitudesInstalacion();
        $registro->nombre                   = $solicitud['nombre'];
        $registro->telefono                 = $solicitud['telefono'];
        $registro->localidad                = $solicitud['localidad'];
        $registro->paquete                  = $solicitud['paquete'];
        $registro->ubicacion                = $solicitud['ubicacion'];
        $registro->caracteristicasDomicilio = $solicitud['caracteristicasDomicilio'];
        $registro->save();
    }

    public function registrarChatBlackList ($telefono) {
        $registro = new BlackList();
        $registro->contacto = $telefono;
        $registro->save();
    }

    public function obtenerChatBlackList () {
        return BlackList::get();
    }

    public function eliminarChatBlackList ($telefono) {
        BlackList::where('contacto', $telefono)->delete();
    }
}
