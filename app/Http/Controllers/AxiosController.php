<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Clinic;
use App\Models\Schedule;
use App\Models\LabTest;

class AxiosController extends Controller
{
    public function axios_get_time_slot(Request $r) {
        $data = Schedule::where('clinicID', $r->ClinicID)->where('isAvailable', 'Y')->get();
        return response()->json($data);
    }

    public function axios_get_available_time(Request $r) {
        $appCheck = Appointment::where('clinicID', 1)->where('appointmentTime', $r->appTime)->first();
        if($appCheck) {
            $data = 'taken';
        } else {
            $data = 'available';
        }
        return response()->json($data);
    }

    public function axios_get_lab_tests(Request $r) {
        $data = LabTest::where('clinicID', $r->ClinicID)->where('isAvailable', 'Y')->get();
        
        return response()->json($data);
    }

    public function axios_live_search(Request $r) {
        if($r->keyWord == '') {
            $result = '';
        } else {
            $result = Clinic::where('clinicName', 'like', '%'. $r->keyWord . '%')
            ->orWhereHas('tests',function ( $query ) use($r) {
                $query->where('testName','like', '%'. $r->keyWord . '%');
            })->get();
        }
        $data = $result;
        $labtests = '';
        return response()->json($data);
    }

    public function axios_live_search_tests(Request $r) {
        $data = LabTest::where('clinicID', $r->clinicID)->get();
        return response()->json($data);
    }
}
