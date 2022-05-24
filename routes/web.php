<?php

use Illuminate\Support\Facades\Route;

// INCLUDE THE CONTROLLERS YOU NEED HERE.
use App\HTTP\Controllers\PersonController;

// HERE I REDIRECT MY DEFAULT ROUTE TO MY PERSONS.
Route::get('/', function(){
    return redirect()->route('persons.index');
});

// THE DEFAULT LARAVEL ROUTES ARE: INDEX, SHOW, CREATE, SHOW, EDIT, UPDATE, DESTROY
// THE ROUTE STRUCTURE LOOKS LIKE THIS: Route::get('url', [Controller::class, 'function']);
// YOU CAN USE THE PHP ARTISAN ROUTE LIST FUNCTION TO SHOW ALL YOUR ROUTES IN THE CONSOLE.
Route::get('/persons/', [PersonController::class, 'index'])->name('persons.index');

// ROUTE RESOURCES ARE USED TO COMBINE ALL YOUR BASIC ROUTES.
Route::resource('/persons', PersonController::class);
