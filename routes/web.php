<?php

use Illuminate\Support\Facades\Route;

// site -> acesso sem login
Route::get('/', function () {
    return view('site.login');
});

Route::get('/login/{erro?}', 'LoginController@index')->name('site.login');
Route::post('/login', 'LoginController@autenticar')->name('site.login');

// Rotas protegidas por login -> Administrador
Route::prefix('/app')->group(function () {
    
});