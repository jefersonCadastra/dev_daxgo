<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WizardCadastroControler;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\MetaController;
use App\Http\Middleware\Auth\usuarioMiddleware;

//Auth
use App\Http\Controllers\Auth\LoginControler;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware([usuarioMiddleware::class])->group(function () {

    //Route::get('/', [LoginControler::class, 'loginAction']);
    Route::get('/wizard', [WizardCadastroControler::class, 'wizardAction']);

    //Clientes
    Route::post('/cliente/novo', [ClienteController::class, 'novoAction']);
    Route::post('/cliente/insert', [ClienteController::class, 'insertAction']);
    Route::put('/cliente/update', [ClienteController::class, 'updateAction']);
    Route::delete('/cliente/delete', [ClienteController::class, 'deleteAction']);

    //Metas
    Route::get('/meta/novo', [MetaController::class, 'novoAction']);
    Route::post('/meta/insert', [MetaController::class, 'insertAction']);
    Route::put('/meta/update', [MetaController::class, 'updateAction']);
    Route::get('/meta/delete/{id}', [MetaController::class, 'deleteAction']);

    //Visitas
    Route::get('/visita/novo', [VisitaController::class, 'novoAction']);
    Route::post('/visita/insert', [VisitaController::class, 'insertAction']);
    Route::put('/visita/update', [VisitaController::class, 'updateAction']);
    Route::delete('/visita/delete', [VisitaController::class, 'deleteAction']);

    //Visita Detalhe
    Route::get('/visitadetalhe/novo', [VisitaDetalheController::class, 'novoAction']);
    Route::post('/visitadetalhe/insert', [VisitaDetalheController::class, 'insertAction']);
    Route::put('/visitadetalhe/update', [VisitaDetalheController::class, 'updateAction']);
    Route::delete('/visitadetalhe/delete', [VisitaDetalheController::class, 'deleteAction']);
});



//Teste do sistema
Route::get('/', function () {
    return view('welcome');
});
