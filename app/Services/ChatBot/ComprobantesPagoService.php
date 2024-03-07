<?php

namespace App\Services\ChatBot;

use App\Repositories\ChatBot\ComprobantesPagoRepository;

class ComprobantesPagoService
{
    protected $comprobantesPagoRepository;

    public function __construct(
        ComprobantesPagoRepository $ComprobantesPagoRepository
    ) {
        $this->comprobantesPagoRepository = $ComprobantesPagoRepository;
    }

    public function capturaComporbantePago ($comprobante) {
        $this->comprobantesPagoRepository->registrarComprobantePago($comprobante);

        return response()->json(
            [
                'mensaje' => 'Se registró el comprobante de pago con éxito'
            ],
            200
        );
    }
}