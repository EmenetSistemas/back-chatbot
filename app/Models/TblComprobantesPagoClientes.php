<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblComprobantesPagoClientes extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'pkTblComprobantesPagoClientes';
    protected $table = 'tblComprobantesPagoClientes';
    protected $fillable = 
    [
        'pkTblComprobantesPagoClientes',
        'nombreServicio',
        'numeroContacto',
        'comprobantePago',
        'ticketPagoCliente',
        'observaciones',
        'fechaRegistro',
        'fechaEnvioComprobante',
        'fkCatStatusComprobantes'
    ];
}