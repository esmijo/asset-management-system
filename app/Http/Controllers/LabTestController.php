<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LabTest;

class LabTestController extends Controller
{
    public function create(Request $r) {
        $s = new LabTest;
    }

    public function update($id, Request $r) {
        $s = LabTest::find($id);
        $s->update([
            'isAvailable' => $r->schedInput,
            'price' => $r->priceInput
        ]);
        // return $id;
        return redirect()->back();
    }

    public function delete($id) {
        $s = LabTest::find($id);
        $s->delete();
        return redirect()->back();
    }
}
