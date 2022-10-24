<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'servicesAvailed' => 'array'
    ];

    public function clinic() {
        return $this->belongsTo(Clinic::class, 'clinicID', 'id');
    }

    public function patient() {
        return $this->belongsTo(User::class, 'patientID', 'id');
    }
}
