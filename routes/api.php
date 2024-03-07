<?php

use Illuminate\Support\Facades\Route;

Route::post('/comprobantesPago/capturaComprobantePago', 'App\Http\Controllers\ChatBot\ComprobantesPagoController@capturaComprobantePago');
Route::post('/comprobantesPago/obtenerComprobantesPagoPorStatus', 'App\Http\Controllers\ChatBot\ComprobantesPagoController@obtenerComprobantesPagoPorStatus');