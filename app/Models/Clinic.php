<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    use HasFactory;

    protected $appends = ['AverageRating', 'TotalReviews'];

    protected $guarded = ['id'];

    public function appointments() {
        return $this->hasMany(Appointment::class, 'id', 'clinicID');
    }

    public function tests() {
        return $this->hasMany(LabTest::class, 'clinicID', 'id')->where('isAvailable', 'Y');
    }

    public function ratings() {
        return $this->hasMany(Rating::class,'clinicID', 'id');
    }

    public function getAverageRatingAttribute() {
        $ratings = $this->ratings;

        $ratingQty = 0;
        $totalRatings = 0;
        $avgRating = 0;

        foreach($ratings as $key => $rating) {
            $ratingQty = $ratingQty + 1;
            $totalRatings = $totalRatings + $rating->rating;
        }

        if($ratingQty > 0) {
            $avgRating = ($totalRatings / $ratingQty);
        } else {
            $avgRating = 0;
        }

        return $avgRating;
    }

    public function getTotalReviewsAttribute() {
        $ratings = $this->ratings;

        $ratingQty = 0;

        foreach($ratings as $key => $rating) {
            $ratingQty = $ratingQty + 1;
        }

        if($ratingQty > 0) {
            return $ratingQty;
        } else {
            return 0;
        }
    }
}
