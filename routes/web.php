<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TesteAnalyticsController;

use App\Http\Controllers\Painel\{
    WizardController,
    GoalController,
    PerformanceAverageController,
    TenantController,
    VisitController,
    VisitDetailController,
    VisitOriginController,
    BehaviorDateController,
    DailyGoalsController
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
    Route::match(['GET', 'POST'], '/wizard/step/1', [WizardController::class, 'step1'])->name('wizard.step.1');
    Route::match(['GET', 'POST'], '/wizard/step/2', [WizardController::class, 'step2'])->name('wizard.step.2');
    Route::match(['GET', 'POST'], '/wizard/step/3', [WizardController::class, 'step3'])->name('wizard.step.3');
    Route::match(['GET', 'POST'], '/wizard/step/4', [WizardController::class, 'step4'])->name('wizard.step.4');
    Route::match(['GET', 'POST'], '/wizard/step/5', [WizardController::class, 'step5'])->name('wizard.step.5');
    Route::match(['GET', 'POST'], '/wizard/step/6', [WizardController::class, 'step6'])->name('wizard.step.6');
    Route::match(['GET', 'POST'], '/wizard/finish', [WizardController::class, 'finish'])->name('wizard.finish');
    Route::match(['GET', 'POST'], '/wizard/distribute', [WizardController::class, 'distribute'])->name('wizard.distribute');

    // Clientes (Tenants)
    Route::resource('tenants', TenantController::class);

    //Metas
    Route::resource('goals', GoalController::class);

    //Visitas
    Route::resource('visits', VisitController::class);

    //Datas
    Route::resource('dates', BehaviorDateController::class);

    // Metas de performance
    Route::resource('performance-averages', PerformanceAverageController::class);

    //Origem Visitas
    Route::post('visitorigin/create', [VisitOriginController::class, 'create']);
    Route::post('visitorigin/store', [VisitOriginController::class, 'store']);

    //Detalhes das Visitas
    Route::get('visitsdetail/finish/', [VisitDetailController::class, 'finish'])->name('visitsdetail.finish');
    Route::get('visitsdetail', [VisitDetailController::class, 'index'])->name('visitsdetail');

    //Metas diárias
    Route::get('dailygoals', [DailyGoalsController::class, 'index'])->name('dailygoals');
});



Route::view('/', 'welcome');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/analytics', [TesteAnalyticsController::class, 'index'])->name('analytics');
