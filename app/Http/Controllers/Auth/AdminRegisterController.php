<?php

namespace App\Http\Controllers\Auth;

use App\DatosAlumno;
use DateTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\App\Curso;

use App\Admin;
use Auth;

class AdminRegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function showRegistrationForm()
    {
        return view('auth.admin-register');
    }
     /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function register(Request $request)
    {
        $nombre_archivo = 'userprofilepic.png';
        if($request->hasFile('img_perfil')){
            $archivo = $request->file('img_perfil');
            $nombre_archivo = $archivo->getClientOriginalName();
            $archivo->move(public_path().'\profile_pic',$nombre_archivo);
        }
        $request->request->add(['photo' => $nombre_archivo]);

        $this->validator($request->all())->validate();
        $admin = $this->create($request->all());

        $notificacion = 'ERROR al registrar administrador';
        if($admin){
            $notificacion= 'Nuevo administrador registrado correctamente';
        }
        return redirect()->route('admin.dashboard', ['notificacion' =>  $notificacion]);

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'surname' => 'required|string|max:255',
            'second_surname' => 'required|string|max:255',
            'rut' => 'required|string|max:14',
            'address' => 'required|string|max:1000',
            'fecha_nacimiento' => 'required|date',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Admin
     */
    protected function create(array $data)
    {
        $date = new DateTime($data['fecha_nacimiento']);
        $now = new DateTime();
        $interval = $now->diff($date);
        $age=$interval->y;

        return Admin::create([
            'name' => $data['name'],
            'rut'=> $data['rut'],
            'direccion' => $data['address'],
            'second_name'=>$data['second_name'],
            'surname'=>$data['surname'],
            'second_surname'=>$data['second_surname'],
            'fecha_nacimiento'=>$data['fecha_nacimiento'],
            'email' => $data['email'],
            'url_imagen' => $data['photo'],
            'password' => Hash::make($data['password']),
        ]);
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

}
