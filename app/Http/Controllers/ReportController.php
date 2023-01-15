<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Clinic;
use App\Models\Appointment;
use App\Models\LabTest;
use DB;

class ReportController extends Controller
{
    public function generate_report(Request $r) {
        $a = LabTest::select('testName')->distinct()->get();

        if($r->gender == 'All') {
            $b = Appointment::with('patient')->where('clinicID', $r->clinicID)->get();
        } else {
            $b = Appointment::WhereHas('patient',function ( $query ) use($r) {
                $query->where('sex', $r->gender);
            })->get();
        }

        return response()->json([$a, $b]);
    }

    public function generate_clinic_report(Request $r) {

        // if($r->gender == 'All') {
        //     $b = Appointment::with('patient')->where('clinicID', $r->clinicID)->get();
        // } else {
        //     $b = Appointment::WhereHas('patient',function ( $query ) use($r) {
        //         $query->where('sex', $r->gender);
        //     })->get();
        // }

        if($r->testsAvailed == 'All') {
            $a = LabTest::where('clinicID', $r->clinicID)->select('testName')->get();
        } else {
            $a = LabTest::where('clinicID', $r->clinicID)->where('testName', $r->testsAvailed)->select('testName')->get();
        }

        $b = Appointment::with('patient')->where('clinicID', $r->clinicID)->get();

        return response()->json([$a, $b]);
    }
}
