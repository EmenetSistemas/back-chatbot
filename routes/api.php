<?php

use Illuminate\Support\Facades\Route;

Route::post('/comporbantesPago/capturaComporbantePago', 'App\Http\Controllers\ChatBot\ComprobantesPagoController@capturaComporbantePago');
Route::get('/prueba', 'App\Http\Controllers\ChatBot\ComprobantesPagoController@prueba');