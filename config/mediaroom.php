<?php

return array(




	/*
    |--------------------------------------------------------------------------
    | Notificaciones Pusher
    |--------------------------------------------------------------------------
    |
    | Activa la opción de poder enviar notificaciones
    |     
    */
	'use_pusher' => env('CHATMESSENGER_USE_PUSHER'),
	/*
    |--------------------------------------------------------------------------
    | Textos para el Software
    |--------------------------------------------------------------------------
    |
    |     
    */
	'name' => env('APP_NAME'),
	'iniciales' => env('APP_INICIALES'),
	'version' => env('APP_VERSION'),
	'update' => env('APP_UPDATE'),
	'colorBase' => env('COLOR_HEAD'),
	'colorSuccess' => env('COLOR_HEAD'),
	'colorHeader' => env('COLOR_HEAD'),
	'btoBase' => env('COLOR_BTO'),

);
