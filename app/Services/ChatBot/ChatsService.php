<?php

namespace App\Services\ChatBot;

use App\Repositories\ChatBot\ChatsRepository;

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

    public function registrarChatEnEspera ($chats) {

    }
}