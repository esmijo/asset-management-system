<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\User;

class AppointmentController extends Controller
{
    public function create_appointment(Request $r) {

        $servicesOffered = array();
        for($x = 1; $x <= $r->servicesCount; $x++) {
            if($r->{'test-' . $x}) {
                // if($x == $r->servicesCount) {
                    array_push($servicesOffered, $r->{'test-' . $x});
                // } else {
                    // array_push($servicesOffered, $r->{'test-' . $x} . ',');
                // }
            }
        }

        $app = new Appointment;
        $app->patientID = $r->userID;
        $app->appointmentDate = $r->appointmentDate;
        $app->appointmentTime = $r->appointmentTime;
        $app->clinicID = $r->clinicName;
        $app->status = 'Pending';
        $app->servicesAvailed = $servicesOffered;
        $app->totalAmount = $r->totalAmount;
        if($r->appointmentFor == NULL) {
            $patient = User::find($r->userID);
            $app->patientName = $patient->firstName . ' ' . $patient->firstName . ' ' . $patient->firstName;
        } else {
            $app->patientName = $r->appointmentFor;
        }

        $app->save();
        return redirect('/my-appointments');
    }

    public function cancel_appointment($id) {
        $app = Appointment::find($id);
        $app->update([
            'status' => 'Cancelled'
        ]);

        return redirect()->back();
    }

    public function complete_appointment($id) {
        $app = Appointment::find($id);
        $app->update([
            'status' => 'Completed'
        ]);

        return redirect()->back();
    }

    public function edit_appointment(Request $r) {
        $servicesOffered = array();
        for($x = 1; $x <= $r->servicesCount; $x++) {
            if($r->{'test-' . $x}) {
                array_push($servicesOffered, $r->{'test-' . $x});
            // } else {
            //     array_push($servicesOffered, 0);
            }
        }

        $app = Appointment::find($r->appointmentID);
        $app->patientID = $r->userID;
        $app->appointmentDate = $r->appointmentDate;
        $app->appointmentTime = $r->appointmentTime;
        $app->clinicID = $r->clinicName;
        $app->status = 'Pending';
        $app->servicesAvailed = $servicesOffered;
        $app->totalAmount = $r->totalAmount;

        if($r->appointmentFor == NULL) {
            $patient = User::find($r->userID);
            $app->patientName = $patient->firstName . ' ' . $patient->firstName . ' ' . $patient->firstName;
        } else {
            $app->patientName = $r->appointmentFor;
        }
        
        $app->save();
        return redirect('/');
    }
}
