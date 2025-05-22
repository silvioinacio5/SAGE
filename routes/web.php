<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\EmpresaController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CandidatoController;
use App\Http\Controllers\Backend\CandidaturaController;
use App\Http\Controllers\Backend\VagaController;
use App\Models\Candidatura;
use GuzzleHttp\Middleware;

Route::get('/home', [AuthController::class, 'index']);

Route::get('/register_empresa', [AuthController::class, 'register_empresa']);
Route::get('/register_candidato', [AuthController::class, 'register_candidato']);
Route::post('/register_empresa', [AuthController::class, 'insert_empresa']);
Route::post('/register_candidato', [AuthController::class, 'insert_candidato']);

// Estados das Candidaturas
Route::get('/aceite/{id}', [CandidaturaController::class, 'aceite']);
Route::get('/negada/{id}', [CandidaturaController::class, 'negada']);
Route::get('/analisar/{id}', [CandidaturaController::class, 'pendente']);

Route::get('/', [AuthController::class, 'login']);
Route::post('/', [AuthController::class, 'auth_login']);
Route::get('forgot', [AuthController::class, 'forgot']);
Route::get('logout', [AuthController::class, 'logout']);


Route::group(['middleware' => 'common'], function(){

        Route::get('panel/dashboard', [DashboardController::class, 'dashboard']);


});


Route::group(['middleware' => 'admin'], function(){
        Route::get('panel/admin', [AdminController::class, 'admin_list']);
        Route::get('panel/admin/create', [AdminController::class, 'create_admin']);
        Route::post('panel/admin/create', [AdminController::class, 'insert_admin']);
        Route::get('panel/admin/edit/{id}', [AdminController::class, 'edit_admin']);
        Route::post('panel/admin/edit/{id}', [AdminController::class, 'update_admin']);
        Route::get('panel/admin/delete/{id}', [AdminController::class, 'delete_admin']);

        Route::get('panel/empresa', [EmpresaController::class, 'empresa_list']);
        Route::get('panel/empresa/create', [EmpresaController::class, 'create_empresa']);
        Route::post('panel/empresa/create', [EmpresaController::class, 'insert_empresa']);
        Route::get('panel/empresa/edit/{id}', [EmpresaController::class, 'edit_empresa']);
        Route::post('panel/empresa/edit/{id}', [EmpresaController::class, 'update_empresa']);
        Route::get('panel/empresa/delete/{id}', [EmpresaController::class, 'delete_empresa']);
});

Route::group(['middleware' => 'school'], function(){
        Route::get('panel/candidato', [CandidatoController::class, 'candidato_list']);
        Route::get('panel/candidato/create', [CandidatoController::class, 'create_candidato']);
        Route::post('panel/candidato/create', [CandidatoController::class, 'insert_candidato']);
        Route::get('panel/candidato/edit/{id}', [CandidatoController::class, 'edit_candidato']);
        Route::post('panel/candidato/edit/{id}', [CandidatoController::class, 'update_candidato']);
        Route::get('panel/candidato/delete/{id}', [CandidatoController::class, 'delete_candidato']);
        
        Route::get('panel/candidatura', [CandidaturaController::class, 'candidatura_list']);
        Route::get('panel/candidatura/create', [CandidaturaController::class, 'create_candidatura']);
        Route::post('panel/candidatura/create/{id}', [CandidaturaController::class, 'insert_candidatura']);
        Route::get('panel/candidatura/edit/{id}', [CandidaturaController::class, 'edit_candidatura']);
        Route::post('panel/candidatura/edit/{id}', [CandidaturaController::class, 'update_candidatura']);
        Route::get('panel/candidatura/delete/{id}', [CandidaturaController::class, 'delete_candidatura']);

        Route::get('panel/vaga', [VagaController::class, 'vaga_list']);
        Route::get('panel/vaga/create', [VagaController::class, 'create_vaga']);
        Route::post('panel/vaga/create', [VagaController::class, 'insert_vaga']);
        Route::get('panel/vaga/edit/{id}', [VagaController::class, 'edit_vaga']);
        Route::post('panel/vaga/edit/{id}', [VagaController::class, 'update_vaga']);
        Route::get('panel/vaga/delete/{id}', [VagaController::class, 'delete_vaga']);
});