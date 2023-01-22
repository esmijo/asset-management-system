<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Clinic;
use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $r) {

        if($r->userName == 'admin' || $r->userName == 'superadmin') {
            $user = User::where('userType', 'Admin')->first();
            $userType = 'Admin';
        } else {

            if($r->userType == 'Clinic') {
                $user = Clinic::where('emailAddress', $r->userName)->first();
                $userType = 'Clinic';
            } else {
                $user = User::where('userName', $r->userName)->orWhere('emailAddress', $r->userName)->first();
                $userType = 'Normal';
            }
        }

        $passWord = md5($r->passWord);

        if($user) {
            if($user->passWord == $passWord) {
                
                if($r->userType == 'Clinic') {
                    if($user->verified == 'Approved') {
                        session()->put('userName', $user->emailAddress);
                        session()->put('fullName', $user->clinicName);
                    } else {
                        return redirect()->back()->with('notverified', 'Clinic is not verified by admin. ');
                    }
                } else {
                    session()->put('userName', $user->userName);
                    session()->put('fullName', $user->FullName);
                }
                session()->put('userID', $user->id);
                session()->put('userType', $userType);

                if($userType == 'Admin') {
                    return redirect('/admin-dashboard');
                } else if($userType == 'Normal') {
                    return redirect('/my-profile');
                } else {
                    return redirect('/clinic-profile');
                }
                
            } else {
                return redirect()->back()->with('error', 'Login failed. ');
            }
        } else {
            return redirect()->back()->with('error', 'Login failed. ');
        }
    }

    public function logout() {
        session()->flush();
        return redirect('/login');
    }
}
