<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

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

Route::get('/', function () {return view('welcome');});
Route::get('/main', [MainController::class, 'index']);
Route::get('/create', [MainController::class, 'create']);
Route::post('/store', [MainController::class, 'store']);
Route::get('/details', [MainController::class, 'details']);
Route::get('/login', [MainController::class, 'login']);
