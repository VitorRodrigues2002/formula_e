<?php

use App\Http\Controllers\PilotoController;
use App\Http\Controllers\EquipaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/piloto',[PilotoController::class,'index'])->name('piloto.index');
Route::get('/piloto/create',[PilotoController::class,'create'])->name('piloto.create')->middleware('auth');
Route::get('/piloto/edit/{id}',[PilotoController::class,'edit'])->name('piloto.edit')->middleware('auth');
Route::post('/pilotos',[PilotoController::class,'store'])->name('piloto.store')->middleware('auth');
Route::get('/piloto/{id}',[PilotoController::class,'show'])->name('piloto.show');
Route::put('/piloto/{id}',[PilotoController::class,'update'])->name('piloto.update')->middleware('auth');
Route::delete('/piloto/{id}',[PilotoController::class,'destroy'])->name('piloto.destroy')->middleware('auth');


Route::get('/equipa',[EquipaController::class,'index'])->name('equipa.index');
Route::get('/equipa/create',[EquipaController::class,'create'])->name('equipa.create')->middleware('auth');
Route::post('/equipa',[EquipaController::class,'store'])->name('equipa.store')->middleware('auth');
Route::get('/equipa/{id}',[EquipaController::class,'show'])->name('equipa.show');
// Route::put('/equipa/{id}',[EquipaController::class,'update'])->name('equipa.update')->middleware('auth');
Route::delete('/equipa/{id}',[EquipaController::class,'destroy'])->name('equipa.destroy')->middleware('auth');
Auth::routes();





Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
