<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehiclesController;

Route::get('/', function () {
    return view('app');
})
->name('application');

// Route::get('/vehicles-list', function () {
//     return view('list');
// });

Route::resource('/vehicles', VehiclesController::class);


