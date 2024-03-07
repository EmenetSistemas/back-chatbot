<?php

namespace App\Repositories\ChatBot;

use App\Models\TblComprobantesPagoClientes;
use Carbon\Carbon;

class ComprobantesPagoRepository
{
    public function registrarComprobantePago ($comprobante) {
        $registro = new TblComprobantesPagoClientes();
        $registro->nombreServicio          = $comprobante['nombreServicio'];
        $registro->numeroContacto          = $comprobante['numeroContacto'];
        $registro->comporbantePago         = $comprobante['comporbantePago'];
        $registro->fechaRegistro           = Carbon::now();
        $registro->fkCatStatusComprobantes = 1;
        $registro->save();
    }
}