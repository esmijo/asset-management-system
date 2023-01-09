<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;

use App\Mail\VerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function register(Request $r) {

        $exists = User::where('username', $r->username)->first();
        
        if($exists) {
            return redirect()->back()->with('error', 'Username already used. ');
        } else {
            $user = new User;
            $user->firstName = $r->firstName;
            $user->middleName = $r->middleName;
            $user->lastName = $r->lastName;
            $user->sex = $r->sex;
            $user->birthday = $r->birthday;
            $user->username = $r->username;
            $user->password = md5($r->password);
            $user->emailAddress = $r->email;
            $user->contactNumber = $r->contactNumber;
            $user->userType = 'Normal';
            $user->imagePath = '/images/logo.png';
            $user->save();

            $fullName = $r->firstName . ' ' . $r->middleName . ' ' . $r->lastName;

            $mail = Mail::to($r->email)
            ->queue(new VerifyEmail(
                $r->username,
                $r->email,
                $fullName,
                'patient'
            ));

            return redirect('/login')->with('signup', 'Login failed. ');
        }
    }

    public function save_update(Request $r) {
        $user = User::where('id', $r->userID)->first();
        $user->firstName = $r->firstName;
        $user->middleName = $r->middleName;
        $user->lastName = $r->lastName;
        $user->sex = $r->sex;
        $user->birthday = $r->birthday;
        $user->username = $r->username;
        $user->password = md5($r->passWord);
        $user->emailAddress = $r->email;
        $user->contactNumber = $r->contactNumber;
        $user->userType = 'Normal';
        $user->save();
        return redirect()->back();
    }

    public function change_password(Request $r) {
        $user = User::where('id', $r->userID)->first();
        $user->password = md5($r->passWord);
        $user->save();
        return redirect()->back();
    }

    public function verify_patient(Request $r) {
        $user = User::where('userName', $r->userName)->first();
        $user->verified = 'Verified';
        $user->save();
        return redirect()->back();
    }

    public function user_photo(Request $r) {
        $user = User::where('id', $r->patient_id)->first();
        if($r->hasFile('image')) {
            $extension = $r->file('image')->extension();
            
            $filename = $user->userName . '.' . $extension;
            $user->imagePath = '/images/user/'. $user->id . '/' . $filename;
            $r->image->move(public_path('images/user/' . $user->id . '/'), $filename);
        }
        // return $user;
        $user->save();
        return redirect('/my-profile');
    }
}
