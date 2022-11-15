<?php

use Illuminate\Support\Facades\Route;

// INCLUDE THE CONTROLLERS YOU NEED HERE.
use App\HTTP\Controllers\ApplicantController;
use App\HTTP\Controllers\SkillController;

// HERE I REDIRECT MY DEFAULT ROUTE TO MY PERSONS.
Route::get('/', function(){
    return redirect()->route('applicants.index');
});

// THE DEFAULT LARAVEL ROUTES ARE: INDEX, SHOW, CREATE, SHOW, EDIT, UPDATE, DESTROY
// THE ROUTE STRUCTURE LOOKS LIKE THIS: Route::get('url', [Controller::class, 'function']);
// YOU CAN USE THE PHP ARTISAN ROUTE LIST FUNCTION TO SHOW ALL YOUR ROUTES IN THE CONSOLE.
Route::get('/applicants', [ApplicantController::class, 'index'])->name('applicants.index');

// ROUTE RESOURCES ARE USED TO COMBINE ALL YOUR BASIC ROUTES.
Route::resource('/applicants', ApplicantController::class);
Route::resource('/skills', SkillController::class);
