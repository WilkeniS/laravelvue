<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehiclesController;
use App\Http\Controllers\ClientsController;

Route::get('/', function () {
    return view('app');
})
->name('application');

Route::resource('/vehicles', VehiclesController::class);


Route::get('/clients-list', [ClientsController::class, 'list']);
Route::resource('/clients', ClientsController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();