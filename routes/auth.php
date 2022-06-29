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

//Login
Route::get('/login', [LoginControler::class, 'indexAction']);
Route::get('/login/logout', [LoginControler::class, 'logoutAction']);
Route::post('/login/authenticate', [LoginControler::class, 'authenticateAction']);
Route::get('/login/gerahash', [LoginControler::class, 'geraHashAction']);
Route::post('/login/gerahash', [LoginControler::class, 'geraHashAction']);
