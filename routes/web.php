<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TesteAnalyticsController;

use App\Http\Controllers\Painel\{
    WizardController,
    GoalController,
    TenantController,
    VisitController,
    VisitDetailController,
    VisitOriginController
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
    Route::get('/wizard', [WizardController::class, 'index']);

    // Clientes
    Route::resource('tenants', TenantController::class);

    //Metas
    Route::resource('goals', GoalController::class);

    //Visitas
    Route::resource('visits', VisitController::class);

    //Origem Visitas
    Route::resource('visitorigin', VisitOriginController::class);

    //Detalhes das Visitas
    Route::get('visitsdetail/distribute/', [VisitDetailController::class, 'distribute'])->name('visitsdetail.distribute');
    Route::get('visitsdetail', [VisitDetailController::class, 'index'])->name('visitsdetail');;
});



Route::view('/', 'welcome');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/analytics', [TesteAnalyticsController::class, 'index'])->name('analytics');
