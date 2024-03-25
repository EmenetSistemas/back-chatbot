<?php

namespace App\Services\ChatBot;

use App\Repositories\ChatBot\ChatsRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ChatsService
{
    protected $chatsRepository;

    public function __construct(
        ChatsRepository $ChatsRepository
    ) {
        $this->chatsRepository = $ChatsRepository;
    }

    public function validarSesion ($telefono) {
        $status = $this->chatsRepository->validarSesion($telefono);

        return response()->json(
            [
                'data' => $status,
                'mensaje' => 'Se validó la sesión del chat'
            ],
            200
        );
    }

    public function agregarChatBlackList ($telefono) {
        $this->chatsRepository->registrarChatBlackList('521'.$telefono);

        return response()->json(
            [
                'mensaje' => 'Se registró el chat a la BlackList con éxito'
            ],
            200
        );
    }

    public function obtenerChatBlackList () {
        $blacklist = $this->chatsRepository->obtenerChatBlackList();

        return response()->json(
            [
                'data' => $blacklist,
                'mensaje' => 'Se obtuvo la blacklist con éxito'
            ],
            200
        );
    }

    public function eliminarChatBlackList ($telefono) {
        $this->chatsRepository->eliminarChatBlackList($telefono);

        return response()->json(
            [
                'mensaje' => 'Se eliminó el chat a la BlackList con éxito'
            ],
            200
        );
    }

    public function registrarSolicitudInstalacion ($solicitud) {
        DB::beginTransaction();
            $this->chatsRepository->registrarSolicitudInstalacion($solicitud);
        DB::commit();

        return response()->json(
            [
                'mensaje' => 'Se registró la solicitud con éxito'
            ],
            200
        );
    }

    public function obtenerSolicitudesInstalacion () {
        $solicitudes = $this->chatsRepository->obtenerSolicitudesInstalacion();

        return response()->json(
            [
                'data' => $solicitudes,
                'mensaje' => 'Se consultaron las solicitudes con éxito'
            ],
            200
        );
    }
}