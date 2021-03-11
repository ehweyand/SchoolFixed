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
    Route::get('/home', 'HomeController@index')->name('app.home');
    Route::get('/sair', 'LoginController@sair')->name('app.sair');
    
    // Setor
    Route::resource('setor','SetorController');
    
    //Tipo de Serviço
    Route::resource('tipo_servico','TipoServicoController');
});