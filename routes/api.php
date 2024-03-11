<?php

use Illuminate\Support\Facades\Route;

Route::post('/comprobantesPago/capturaComprobantePago', 'App\Http\Controllers\ChatBot\ComprobantesPagoController@capturaComprobantePago');
Route::get('/comprobantesPago/obtenerStatusComprobantes', 'App\Http\Controllers\ChatBot\ComprobantesPagoController@obtenerStatusComprobantes');
Route::post('/comprobantesPago/obtenerComprobantesPagoPorStatus', 'App\Http\Controllers\ChatBot\ComprobantesPagoController@obtenerComprobantesPagoPorStatus');
Route::get('/comprobantesPago/obtenerDetallComprobante/{id}', 'App\Http\Controllers\ChatBot\ComprobantesPagoController@obtenerDetallComprobante');

Route::get('/chats/validarSesion/{telefono}', 'App\Http\Controllers\ChatBot\ChatsController@validarSesion');
Route::post('/chats/registrarSolicitudInstalacion', 'App\Http\Controllers\ChatBot\ChatsController@registrarSolicitudInstalacion');
Route::get('/chats/obtenerChatsEnEspera', 'App\Http\Controllers\ChatBot\ChatsController@obtenerChatsEnEspera');

Route::get('/chats/agregarChatBlackList', 'App\Http\Controllers\ChatBot\ChatsController@agregarChatBlackList');
Route::get('/chats/obtenerChatBlackList', 'App\Http\Controllers\ChatBot\ChatsController@obtenerChatBlackList');
Route::get('/chats/eliminarChatBlackList', 'App\Http\Controllers\ChatBot\ChatsController@eliminarChatBlackList');