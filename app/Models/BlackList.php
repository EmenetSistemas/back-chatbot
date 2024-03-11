<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlackList extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'blackList';
    protected $fillable =
    [
        'contacto'
    ];
}
