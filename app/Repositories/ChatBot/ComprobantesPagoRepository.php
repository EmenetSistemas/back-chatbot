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
        $registro->comprobantePago         = $comprobante['comprobantePago'];
        $registro->fechaRegistro           = Carbon::now();
        $registro->fkCatStatusComprobantes = 1;
        $registro->save();
    }

    public function obtenerComprobantesPagoPorStatus ($status) {
        $query = TblComprobantesPagoClientes::select(
                                                'tblComprobantesPagoClientes.pkTblComprobantesPagoClientes as id',
                                                'tblComprobantesPagoClientes.nombreServicio as nombreServicio',
                                                'tblComprobantesPagoClientes.numeroContacto as numeroContacto',
                                                'tblComprobantesPagoClientes.comprobantePago as comprobantePago',
                                                'tblComprobantesPagoClientes.ticketPagoCliente as ticketPagoCliente',
                                                'tblComprobantesPagoClientes.observaciones as observaciones',
                                                'tblComprobantesPagoClientes.fechaRegistro as fechaRegistro',
                                                'tblComprobantesPagoClientes.fechaEnvioComprobante as fechaEnvioComprobante',
                                                'catStatusComprobantes.nombre as status'
                                            )
                                            ->join('catStatusComprobantes', 'catStatusComprobantes.pkCatStatusComprobantes', 'tblComprobantesPagoClientes.fkCatStatusComprobantes')
                                            ->whereIn('tblComprobantesPagoClientes.fkCatStatusComprobantes', $status);

        return $query->get();
    }
}