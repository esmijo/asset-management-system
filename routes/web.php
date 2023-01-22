<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AxiosController;
use App\Http\Controllers\ClinicController;
use App\Http\Controllers\LabTestController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ScheduleController;
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
    Route::get('/landing-page', [PageController::class, 'landing_page']);
    Route::get('/login', [PageController::class, 'login']);
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [PageController::class, 'register']);
    Route::post('/register-clinic', [ClinicController::class, 'register']);
    Route::post('/register-patient', [UserController::class, 'register']);
});

//LOGGED-IN PAGES
Route::middleware('isLoggedIn')->group(function() {
    Route::get('/', [PageController::class, 'index']);
    Route::get('/ratings/{id}', [PageController::class, 'ratings']);
    Route::post('/ratings/{id}', [RatingController::class, 'submit_rating']);

    //CLIENT PAGES
    Route::middleware('isPatient')->group(function() {
        Route::get('/clinics-and-services', [PageController::class, 'search_clinic_services']);
        Route::get('/my-appointments', [PageController::class, 'my_appointments']);
        Route::get('/create-appointment/{id}', [PageController::class, 'create_appointment']);
        Route::post('/create-appointment/{id}', [AppointmentController::class, 'create_appointment']);
        Route::post('/cancel-appointment/{id}', [AppointmentController::class, 'cancel_appointment']);
        Route::get('/my-profile', [PageController::class, 'my_profile']);
        Route::get('/edit-appointment/{id}', [PageController::class, 'edit_appointment']);
        Route::post('/edit-appointment/{id}', [AppointmentController::class, 'edit_appointment']);
        Route::get('/verify-email/patient/{username}', [PageController::class, 'verify_patient']);
        Route::post('/verify-email/patient/{username}', [UserController::class, 'verify_patient']);
        Route::post('/my-profile', [UserController::class, 'user_photo']);
    });

    //AXIOS Routes
    Route::get('/axios_get_time_slot', [AxiosController::class, 'axios_get_time_slot']);
    Route::get('/axios_get_available_time', [AxiosController::class, 'axios_get_available_time']);
    Route::get('/axios_get_lab_tests', [AxiosController::class, 'axios_get_lab_tests']);
    Route::get('/axios_live_search', [AxiosController::class, 'axios_live_search']);
    Route::get('/axios_live_search_tests', [AxiosController::class, 'axios_live_search_tests']);
    Route::get('/axios_match_password', [AxiosController::class, 'axios_match_password']);
    Route::get('/axios_get_patient_appointments', [AxiosController::class, 'axios_get_patient_appointments']);
    Route::get('/axios_get_clinic_appointments', [AxiosController::class, 'axios_get_clinic_appointments']);

    //CLINIC PAGES
    Route::middleware('isClinic')->group(function() {
        Route::get('/clinic-profile', [PageController::class, 'view_clinic']);
        Route::get('/clinic-appointments', [PageController::class, 'view_clinic_appointments']);
        Route::get('/clinic-lab-tests', [PageController::class, 'view_clinic_lab_tests']);
        Route::get('/clinic-time-schedules', [PageController::class, 'view_clinic_time_schedules']);
        Route::post('/complete-appointment/{id}', [AppointmentController::class, 'complete_appointment']);
        Route::get('/create-schedule', [PageController::class, 'create_schedule']);
        Route::post('/create-schedule', [ScheduleController::class, 'create']);
        Route::post('/update-schedule/{id}', [ScheduleController::class, 'update']);
        Route::post('/delete-schedule/{id}', [ScheduleController::class, 'delete']);
        Route::get('/create-lab-test', [PageController::class, 'create_lab_test']);
        Route::post('/create-lab-test', [LabTestController::class, 'create']);
        Route::post('/update-lab-test/{id}', [LabTestController::class, 'update']);
        Route::post('/delete-lab-test/{id}', [LabTestController::class, 'delete']);
        // Route::get('/verify-email/clinic/{email}', [PageController::class, 'verify_clinic']);
        // Route::post('/verify-email/clinic/{email}', [ClinicController::class, 'verify_clinic']);
        Route::post('/clinic-profile', [ClinicController::class, 'clinic_photo']);
        Route::get('/clinic-reports', [PageController::class, 'clinic_reports']);
        Route::get('/generate_clinic_report', [ReportController::class, 'generate_clinic_report']);
    });

    //ADMIN PAGES
    Route::middleware('isAdmin')->group(function() {
        Route::get('/admin-dashboard', [PageController::class, 'administration']);
        Route::get('/view-clinics', [PageController::class, 'view_clinics']);
        Route::get('/update-clinic/{id}', [PageController::class, 'update_clinic']);
        Route::get('/generate_report', [ReportController::class, 'generate_report']);
        Route::get('/view-patients', [PageController::class, 'view_patients']);
        Route::get('/update-patient/{id}', [PageController::class, 'update_patient']);
        Route::post('/view-clinics', [ClinicController::class, 'verify_clinic']);
    });

    Route::post('/update-patient/{id}', [UserController::class, 'save_update']);
    Route::post('/save-clinic', [ClinicController::class, 'save_update']);

    //LOGOUT
    Route::get('/logout', [LoginController::Class, 'logout']);
});