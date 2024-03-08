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
        $comprobantes = $this->comprobantesPagoRepository->obtenerComprobantesPagoPorStatus($status);

        if (count($comprobantes) == 0) {
            return response()->json(
                [
                    'mensaje' => 'No se encontraron comprobantes para el/los status seleccionado',
                    'status' => 204
                ],
                200
            );
        }

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