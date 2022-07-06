<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\Painel\{
    WizardController,
    GoalController,
    TenantController,
    VisitController,
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

Route::middleware('auth')->group(function () {

    // Wizard
    Route::get('/wizard/step/{step}', [WizardController::class, 'step'])->name('wizard.step');

    // Clientes (Tenants)
    Route::resource('tenants', TenantController::class);

    //Metas
    Route::resource('goals', GoalController::class);

    //Visitas
    Route::resource('visits', VisitController::class);
});

Route::view('/', 'welcome');

Route::get('/home', [HomeController::class, 'index'])->name('home');
