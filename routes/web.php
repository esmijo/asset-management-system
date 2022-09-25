<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClinicController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;

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

//LOGGED-OUT PAGES
Route::middleware('isLoggedOut')->group(function() {
    Route::get('/login', [PageController::class, 'login']);
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [PageController::class, 'register']);
    Route::post('/register-clinic', [ClinicController::class, 'register']);
    Route::post('/register-patient', [UserController::class, 'register']);
});

//LOGGED-IN PAGES
Route::middleware('isLoggedIn')->group(function() {
    Route::get('/', [PageController::class, 'index']);

    //CLIENT PAGES
    Route::middleware('isPatient')->group(function() {

    });

    //CLINIC PAGES
    Route::middleware('isAdmin')->group(function() {

    });

    //ADMIN PAGES
    Route::middleware('isAdmin')->group(function() {
        Route::get('/admin-dashboard', [PageController::class, 'administration']);
        Route::get('/view-clinics', [PageController::class, 'view_clinics']);
        Route::get('/update-clinic/{id}', [PageController::class, 'update_clinic']);
        Route::post('/save-clinic', [ClinicController::class, 'save_update']);
        Route::get('/view-patients', [PageController::class, 'view_patients']);
        Route::get('/update-patient/{id}', [PageController::class, 'update_patient']);
        Route::post('/save-patient', [PatientController::class, 'save_update']);
    });

    //LOGOUT
    Route::get('/logout', [LoginController::Class, 'logout']);
});