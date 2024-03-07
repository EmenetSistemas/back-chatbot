<?php

namespace App\Services\ChatBot;

use App\Repositories\ChatBot\ComprobantesPagoRepository;
use Illuminate\Support\Facades\Log;

class ComprobantesPagoService
{
    protected $comprobantesPagoRepository;

    public function __construct(
        ComprobantesPagoRepository $ComprobantesPagoRepository
    ) {
        $this->comprobantesPagoRepository = $ComprobantesPagoRepository;
    }

    public function capturaComprobantePago ($comprobante) {
        $this->comprobantesPagoRepository->registrarComprobantePago($comprobante);

        return response()->json(
            [
                'mensaje' => 'Se registró el comprobante de pago con éxito'
            ],
            200
        );
    }

    public function obtenerStatusComprobantes () {
        $statusComprobantes = $this->comprobantesPagoRepository->obtenerStatusComprobantes();
        $opcionesSelect = [];

        foreach( $statusComprobantes as $item ){
            $temp = [
                'value' => $item->pkCatStatusComprobantes,
                'label' => $item->nombre,
                'checked' => false
            ];

            array_push($opcionesSelect, $temp);
        }
        
        return response()->json(
            [
                'data' => $opcionesSelect,
                'mensaje' => 'Se consultaron los Status Comprobantes con éxito'
            ]
        );
    }

    public function obtenerComprobantesPagoPorStatus ($status) {
        Log::alert($status);
        $comprobantes = $this->comprobantesPagoRepository->obtenerComprobantesPagoPorStatus($status);

        return response()->json(
            [
                'data' => [
                    'comprobantes' => $comprobantes
                ],
                'mensaje' => 'Se consultaron los comprobantes con éxito'
            ],
            200
        );
    }
}