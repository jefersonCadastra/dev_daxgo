<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Painel\{
    WizardCadastroControler,
    ClienteController,
    MetaController,
    VisitaController,
    VisitaDetalheController
};

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

Route::middleware(['user.auth'])->group(function () {

    // Wizard
    Route::get('/wizard', [WizardCadastroControler::class, 'index']);

    // Clientes
    Route::resource('clientes', ClienteController::class)->names('clientes');

    //Metas
    Route::resource('metas', MetaController::class)->names('metas');

    //Visitas
    Route::resource('visitas', VisitaController::class)->names('visitas');
});



//Teste do sistema
Route::view('/', 'welcome');
