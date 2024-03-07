<?php

namespace App\Http\Controllers\ChatBot;

use App\Http\Controllers\Controller;
use App\Services\ChatBot\ComprobantesPagoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ComprobantesPagoController extends Controller
{
    protected $comprobantesPagoService;

    public function __construct(
        ComprobantesPagoService $ComprobantesPagoService
    ) {
        $this->comprobantesPagoService = $ComprobantesPagoService;
    }

    public function capturaComporbantePago (Request $request) {
        try{
            return $this->comprobantesPagoService->capturaComporbantePago($request->all());
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