<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function register(Request $r) {
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
        return redirect('/login');
    }
}
