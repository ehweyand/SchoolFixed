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
    
    // Funcionario
    Route::resource('funcionario','FuncionarioController');

    //Tipo de Serviço
    Route::resource('tipo_servico','TipoServicoController');

    //Servico
    Route::resource('servico','ServicoController');
    //Usuario
    Route::resource('usuario', 'UsuarioController');

    //Logs
    Route::get('/logs', 'LogsController@show')->name('app.logs');

    //Auditoria
    Route::get('/audit', 'AuditController@show')->name('app.audit');
});