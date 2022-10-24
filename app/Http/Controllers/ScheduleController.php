<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;

class ScheduleController extends Controller
{
    public function create(Request $r) {
        $s = new Schedule;
        $s->clinicID = session('userID');
        $s->isAvailable = 'Y';
        $s->timeSlotName = $r->timeSlotName;
        $s->realTime = $r->realTime;
        $s->save();
        return redirect('/clinic-time-schedules');
    }

    public function update($id, Request $r) {
        $s = Schedule::find($id);
        $s->update([
            'isAvailable' => $r->schedInput
        ]);
        // return $id;
        return redirect()->back();
    }

    public function delete($id) {
        $s = Schedule::find($id);
        $s->delete();
        return redirect()->back();
    }
}
