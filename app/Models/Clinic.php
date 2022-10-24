<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function appointments() {
        return $this->hasMany(Appointment::class, 'id', 'clinicID');
    }

    public function tests() {
        return $this->hasMany(LabTest::class, 'clinicID', 'id')->where('isAvailable', 'Y');
    }
}
