<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->firstName = 'Appointment';
        $user->middleName = 'System';
        $user->lastName = 'Administrator';
        $user->sex = '?';
        $user->birthday = '01-01-1990';
        $user->username = 'admin';
        $user->password = md5('@dm1nP@ssw0rd');
        $user->emailAddress = 'app_admin@gmail.com';
        $user->contactNumber = '09101234567';
        $user->userType = 'Admin';
        $user->verified = 'Verified';
        $user->save();
    }
}
