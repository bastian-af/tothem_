<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class MultiLoginController extends Controller
{
    /*public function __construct(){


                if (Auth::guard('admin')->check()) {
                    $this->middleware('auth:admin');
                }

                else if (Auth::guard('teacher')->check()) {
                    $this->middleware('auth:teacher');
                }
                else if (Auth::guard()->check()) {
                    $this->middleware('auth');
                }

    }*/
    public function showLoginForm()
    {
        return view('auth.multi-login');
    }

    public function login(Request $request)
    {
        //validate the form data
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        // Attempt to log the user in
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // if successful, then redirect to their intended location
            return redirect()->intended(route('admin.dashboard'));
        }
        else if (Auth::guard('teacher')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // if successful, then redirect to their intended location
            return redirect()->intended(route('teacher.dashboard'));
        }
        else if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // if successful, then redirect to their intended location
            return redirect()->intended(route('student.dashboard'));
        }

        // if unsuccessful, then redirect back to the login with the form data
        return redirect()->back()
            ->withInput($request->only('email', 'remember'))
            ->withErrors(['password'=> 'Contraseña incorrecta',
                'email'=> 'Email incorrecto',
                'edad' => 'Edad incorrecta'
            ]);
    }

}
