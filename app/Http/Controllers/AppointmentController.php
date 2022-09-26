<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    public function create_appointment(Request $r) {

        $servicesOffered = array();
        for($x = 1; $x <= $r->servicesCount; $x++) {
            if($r->{'test-' . $x} == $x) {
                array_push($servicesOffered, (int)$r->{'test-' . $x});
            } else {
                array_push($servicesOffered, 0);
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
        $app->save();
        return redirect('/');
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
}
