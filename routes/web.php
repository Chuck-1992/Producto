<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index']);
Route::post('/nuevo', [HomeController::class, 'store']);
Route::get('/actualizar/{id}', [HomeController::class, 'show']);
Route::put('/actualizar/registro', [HomeController::class, 'update']);
Route::delete('/borrar/{id}', [HomeController::class, 'destroy']);


Auth::routes();




