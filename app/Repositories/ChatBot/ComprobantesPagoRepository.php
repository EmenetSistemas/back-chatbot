<?php

namespace App\Repositories\ChatBot;

use App\Models\CatStatusComprobantes;
use App\Models\TblComprobantesPagoClientes;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ComprobantesPagoRepository
{
    public function registrarComprobantePago ($comprobante) {
        $registro = new TblComprobantesPagoClientes();
        $registro->nombreServicio          = $comprobante['nombreServicio'];
        $registro->numeroContacto          = $comprobante['numeroContacto'];
        $registro->comprobantePago         = $comprobante['comprobantePago'];
        $registro->tipoArchivoComprobante  = $comprobante['tipoArchivoComprobante'];
        $registro->fechaRegistro           = Carbon::now();
        $registro->fkCatStatusComprobantes = 1;
        $registro->save();
    }

    public function obtenerStatusComprobantes () {
        return CatStatusComprobantes::get();
    }

    public function obtenerComprobantesPagoPorStatus ($status, $id = 0) {
        $query = TblComprobantesPagoClientes::select(
                                                'tblComprobantesPagoClientes.pkTblComprobantesPagoClientes as id',
                                                'tblComprobantesPagoClientes.nombreServicio as nombreServicio',
                                                'tblComprobantesPagoClientes.numeroContacto as numeroContacto',
                                                'tblComprobantesPagoClientes.comprobantePago as comprobantePago',
                                                'tblComprobantesPagoClientes.tipoArchivoComprobante as tipoArchivoComprobante',
                                                'tblComprobantesPagoClientes.ticketPagoCliente as ticketPagoCliente',
                                                'tblComprobantesPagoClientes.observaciones as observaciones',
                                                DB::raw("DATE_FORMAT(tblComprobantesPagoClientes.fechaRegistro, '%d-%m-%Y') as fechaRegistro"),
                                                DB::raw("DATE_FORMAT(tblComprobantesPagoClientes.fechaEnvioComprobante, '%d-%m-%Y') as fechaEnvioComprobante"),
                                                'catStatusComprobantes.nombre as status'
                                            )
                                            ->join('catStatusComprobantes', 'catStatusComprobantes.pkCatStatusComprobantes', 'tblComprobantesPagoClientes.fkCatStatusComprobantes');

        if ($status != null) {
            $query->whereIn('tblComprobantesPagoClientes.fkCatStatusComprobantes', $status);
        }

        if ($id != 0) {
            $query->where('tblComprobantesPagoClientes.pkTblComprobantesPagoClientes', $id);
        }

        return $query->get();
    }
}