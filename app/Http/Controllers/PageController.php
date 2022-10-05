<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Clinic;
use App\Models\User;
use App\Models\LabTest;
use App\Models\Schedule;

class PageController extends Controller
{
    public function login() {
        return view('login');
    }

    public function index() {
        return view('index');
    }

    public function register() {
        return view('register');
    }

    //Admin Pages
    public function administration() {
        return view('admin.admin-dashboard');
    }

    public function view_clinics() {
        $clinics = Clinic::all();
        return view('admin.clinics', compact('clinics'));
    }

    public function update_clinic($id) {
        $clinic = Clinic::find(1);
        return view('admin.update-clinic', compact('clinic'));
    }

    public function view_patients() {
        $users = User::where('userType', '!=', 'Admin')->get();
        return view('admin.patients', compact('users'));
    }

    public function update_patient($id) {
        $patient = User::find($id);
        return view('admin.update-patient', compact('patient'));
    }
    //End of Admin Pages
    

    //Patient Pages
    public function search_clinic_services() {
        return view('patient.clinic-services');
    }

    public function my_appointments() {
        $appointments = Appointment::where('patientID', session('userID'))->orderByDesc('created_at')->get();
        return view('patient.user-appointments', compact('appointments'));
    }

    public function create_appointment($id) {
        $clinic = Clinic::find($id);
        $user = User::where('id', session('userID'))->first();
        $tests = LabTest::where('clinicID', $id)->get();
        return view('patient.create-appointment', compact('clinic', 'user', 'tests'));
    }

    public function edit_appointment($id) {
        $appointment = Appointment::find($id);
        $user = User::where('id', session('userID'))->first();
        $tests = LabTest::where('clinicID', $appointment->clinicID)->get();
        $clinic = Clinic::find( $appointment->clinicID);
        return view('patient.edit-appointment', compact('appointment', 'user', 'tests', 'clinic'));
    }

    public function my_profile() {
        $patient = User::where('userName', session('userName'))->first();
        return view('patient.user-profile', compact('patient'));
    }

    //End of Patient Pages


    //Clinic Pages
    public function view_clinic() {
        $var = Clinic::find(session('userID'));
        return view('clinic.clinic', compact('var'));
    }

    public function view_clinic_appointments() {
        $appointments = Appointment::where('clinicID', session('userID'))->orderByDesc('created_at')->get();
        return view('clinic.clinic-appointments', compact('appointments'));
    }

    public function view_clinic_lab_tests() {
        $var = LabTest::where('clinicID', session('userID'))->get();
        return view('clinic.clinic-lab-tests', compact('var'));
    }

    public function view_clinic_time_schedules() {
        $var = Schedule::where('clinicID', session('userID'))->get();
        return view('clinic.clinic-schedules', compact('var'));
    }

    //End of Clinic Pages
}