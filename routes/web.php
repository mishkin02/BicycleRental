<?php

use App\Http\Controllers\Bicycle_modelController;
use App\Http\Controllers\BicycleController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RentalContreller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return view('hello', ['title'=> 'Мишкин Илья']);
});

Route::get('/bicycleModel', [Bicycle_modelController::class, 'index']);

Route::get('/bicycleModel/{id}', [Bicycle_modelController::class, 'show']);

Route::get('/bicycle', [BicycleController::class, 'index']);

Route::get('/rentals/{id}', [RentalContreller::class, 'show']);

Route::post('/bicycle', [BicycleController::class, 'store']);

Route::get('/bicycle_create', [BicycleController::class, 'create'])->middleware('auth');

Route::get('/bicycle/edit/{id}', [BicycleController::class, 'edit'])->middleware('auth');

Route::post('/bicycle/update/{id}', [BicycleController::class, 'update'])->middleware('auth');

Route::get('/bicycle/destroy/{id}', [BicycleController::class, 'destroy'])->middleware('auth');

Route::get('/login', [LoginController::class, 'login'])->name('login');

Route::get('/logout', [LoginController::class, 'logout']);

Route::post('/auth', [LoginController::class, 'authenticate']);

Route::get('/error', function(){
    return view('error', ['message'=> session('message')]);
});