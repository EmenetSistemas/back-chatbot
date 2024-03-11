<?php

namespace App\Http\Controllers\ChatBot;

use App\Http\Controllers\Controller;
use App\Services\ChatBot\ChatsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ChatsController extends Controller
{
    protected $chatsService;

    public function __construct(
        ChatsService $ChatsService
    ) {
        $this->chatsService = $ChatsService;
    }

    public function validarSesion ($telefono) {
        try{
            return $this->chatsService->validarSesion($telefono);
        } catch( \Throwable $error ) {
            Log::alert($error);
            return response()->json(
                [
                    'error' => $error,
                    'mensaje' => 'Ocurrió un error al consultar' 
                ], 
                500
            );
        }
    }

    public function registrarSolicitudInstalacion (Request $request) {
        try{
            return $this->chatsService->registrarSolicitudInstalacion($request);
        } catch( \Throwable $error ) {
            Log::alert($error);
            return response()->json(
                [
                    'error' => $error,
                    'mensaje' => 'Ocurrió un error al consultar' 
                ], 
                500
            );
        }
    }

    public function obtenerChatBlackList () {
        try{
            return $this->chatsService->obtenerChatBlackList();
        } catch( \Throwable $error ) {
            Log::alert($error);
            return response()->json(
                [
                    'error' => $error,
                    'mensaje' => 'Ocurrió un error al consultar' 
                ], 
                500
            );
        }
    }
}