<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Clinic;
use App\Models\Schedule;
use App\Models\LabTest;
use App\Models\User;

class AxiosController extends Controller
{
    public function axios_get_time_slot(Request $r) {
        $NotAvailable = Appointment::where('clinicID', $r->clinicID)->where('appointmentDate', $r->appointmentDate)->get('appointmentTime');
        $data = Schedule::where('clinicID', $r->clinicID)->where('isAvailable', 'Y')->whereNotIn('realTime', $NotAvailable)->get();
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
            $result = Clinic::with('tests')->where('clinicName', 'like', '%'. $r->keyWord . '%')
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

    public function axios_match_password(Request $r) {
        $password = User::where('userName', session('userName'))->where('passWord', md5($r->passWord))->first();
        if($password) {
            $data = 'true';
        } else {
            $data = 'false';
        }
        return response()->json($data);
    }
}
