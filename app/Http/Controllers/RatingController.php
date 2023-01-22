<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;

class RatingController extends Controller
{
    public function submit_rating(Request $r) {
        $rating = new Rating;
        $rating->clinicID = $r->clinicID;
        $rating->review = $r->user_review;
        $rating->rating = $r->user_rating;
        $rating->userID = $r->userID;
        $rating->save();
        return redirect()->back();
    }
}
