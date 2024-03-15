<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblSolicitudesInstalacion extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'pkTblSolicitudesInstalacion';
    protected $table = 'tblSolicitudesInstalacion';
    protected $fillable = 
    [
        'pkTblSolicitudesInstalacion',
        'nombre',
        'telefono',
        'localidad',
        'paquete',
        'ubicacion',
        'caracteristicasDomicilio'
    ];
}