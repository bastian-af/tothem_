<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use App\Asignatura;
use App\Curso;
use App\User;
use App\Teacher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin=Admin::where('id',Auth::user()->id)->firstOrFail();
        $cursos = Curso::all();
        $profesor= Teacher::all();
        $asignaturas = Asignatura::all();
        $notificacion = null;
        return view('portalAdmin')->with([
            'admin'=>$admin,
            'cursos' => $cursos,
            'teachers' => $profesor,
            'asignaturas' => $asignaturas,
            'notificacion' => $notificacion,
        ]);
    }

}
