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
        // $a = DB::table('categories')
        // ->join('tickets', 'categories.id', '=', 'tickets.CategoryID')
        // ->select(DB::raw('categories.CategoryDescription, count(tickets.CategoryID) as Qty'))
        // ->when($r->Category != 'all', function ($q) use ($r) {
        //     $q->where('tickets.CategoryID', $r->Category);
        // })
        // ->when($r->Status != 'all', function ($q) use ($r) {


        $a = LabTest::select('testName')->distinct()->get();

        if($r->gender == 'All') {
            $b = Appointment::with('patient')->get();
        } else {
            $b = Appointment::WhereHas('patient',function ( $query ) use($r) {
                $query->where('sex', $r->gender);
            })->get();
        }

        return response()->json([$a, $b]);
    }
}
