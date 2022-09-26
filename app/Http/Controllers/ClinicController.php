<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Clinic;
use App\Models\LabTest;
use App\Models\Schedule;

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
        $clinic->passWord = md5($r->passWord);
        $clinic->save();

        $timeSlots = [
            '05:00AM - 06:00AM',
            '06:00AM - 07:00AM',
            '07:00AM - 08:00AM',
            '08:00AM - 09:00AM',
            '09:00AM - 10:00AM',
            '10:00AM - 11:00AM',
            '11:00AM - 12:00PM',
            '01:00PM - 02:00PM',
            '02:00PM - 03:00PM',
            '03:00PM - 04:00PM',
            '04:00PM - 05:00PM',
            '05:00PM - 06:00PM',
            '06:00PM - 07:00PM',
            '07:00PM - 08:00PM',
            '08:00PM - 09:00PM'
        ];

        $realTime = [
            '05:00', '06:00', '07:00', '08:00', '09:00', '10:00', '11:00',
            '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00'
        ];

        for($x = 0; $x<count($timeSlots); $x++) {
            $s = new Schedule;
            $s->timeSlotName = $timeSlots[$x];
            $s->realTime = $realTime[$x];
            $s->clinicID = $clinic->id;
            $s->isAvailable = 'Y';
            $s->save();
        }

        $labTests = [ 
            'Complete Bloood Count w/ Platelet',
            'Blood Typing',
            'Urinalysis',
            'Fecalysis',
            'Fasting Blood Sugar',
            'Creatitine',
            'SGPT',
            'SGOT',
            'SUA',
            'Lipid Profile',
            'HBA1C',
            'HBsAg (Qualitative)',
            'HIV',
            'Drug Test',
            'ECG',
            'Chest X-Ray'
        ];

        for($x = 0; $x<count($labTests); $x++) {
            $lt = new LabTest;
            $lt->testName = $labTests[$x];
            $lt->clinicID = $clinic->id;
            $lt->isAvailable = 'Y';
            $lt->price = 100.00;
            $lt->save();
        }
        return redirect('/login');
    }
}
