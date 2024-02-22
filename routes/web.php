<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehiclesController;
use App\Http\Controllers\ClientsController;

Route::get('/', function () {
    return view('app');
})
->name('application');

// Route::get('/vehicles-list', function () {
//     return view('list');
// });

Route::resource('/vehicles', VehiclesController::class);
Route::resource('/clients', ClientsController::class);


