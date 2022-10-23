<?php

namespace App\Http\Controllers;

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
            $user->save();
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
        return redirect()->back();
    }
}
