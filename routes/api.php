<?php

use Illuminate\Support\Facades\Route;

Route::post('/comporbantesPago/capturaComporbantePago', 'App\Http\Controllers\ComprobantesPagoController@capturaComporbantePago');
Route::get('/prueba', 'App\Http\Controllers\ComprobantesPagoController@prueba');