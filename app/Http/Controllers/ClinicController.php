<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clinic;

class ClinicController extends Controller
{
    public function register(Request $r) {
        $clinic = new Clinic;
        $clinic->clinicName = $r->clinicName;
        $clinic->completeAddress = $r->completeAddress;
        $clinic->mapLatitude = $r->mapLatitude;
        $clinic->mapLongtitude = $r->mapLongtitude;
        $clinic->contactNumber = $r->contactNumber;
        $clinic->emailAddress = $r->emailAddress;
        $clinic->save();
        return redirect('/login');
    }
}
