<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginControler;
use App\Http\Controllers\WizardCadastroControler;

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

Route::get('/', [LoginControler::class, 'loginAction']);
Route::get('/wizard', [WizardCadastroControler::class, 'wizardAction']);

// Route::get('/', function () {
//     return view('welcome');
// });
