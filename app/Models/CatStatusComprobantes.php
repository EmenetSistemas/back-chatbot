<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatStatusComprobantes extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'pkCatStatusComprobantes';
    protected $table = 'catStatusComprobantes';
    protected $fillable = 
    [
        'pkCatStatusComprobantes',
        'nombre',
        'descripcion'
    ];
}