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

    public function registrarSolicitudInstalacion ($solicitud) {
        Log::alert($solicitud);

        DB::beginTransaction();
            $this->chatsRepository->registrarSolicitudInstalacion($solicitud);
            $this->chatsRepository->registrarChatBlackList($solicitud['telefono']);
        DB::commit();

        return response()->json(
            [
                'mensaje' => 'Se registró la solicitud con éxito'
            ],
            200
        );
    }
}