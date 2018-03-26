<?php

namespace App\Http\Controllers;
use App\User;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller


{


    public function login(Request $request)
    {
        //dd($request->all());

        if(Auth::attempt([
            'username'=> $request->username,
            'password'=> $request->password
        ])){

            $user=User::where('username',$request->username)->first();
            if($user->isStudent()){
                return redirect('student/dashboard');
            }

            if($user->isTeacher()){
                return redirect('teacher/dashboard');
            }

            if($user->isAdmin()){
                return redirect('admin/dashboard');
            }
            //return view('home');
            //return redirect()->route('home');
            //return redirect('home');
        }

        return redirect()->back()
        ->with('error-message', 'Your username and password combination is wrong.')
        ->withInput();;

    }

    public function username()
    {
        return 'username';
    }
}
