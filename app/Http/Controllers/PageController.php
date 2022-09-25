<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clinic;
use App\Models\User;

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
}
