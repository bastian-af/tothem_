<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Curso;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;


class RegisterController extends Controller
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

    use RegistersUsers;


    protected $redirectTo = '/admin';



    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function showRegistrationForm()
    {
        $cursos=Curso::all();
        return view('auth.register')->with([
            'cursos' => $cursos,
        ]);

    }

    public function register(Request $request)
    {

        $nombre_archivo = 'userprofilepic.png';
        if($request->hasFile('img_perfil')){
            $archivo = $request->file('img_perfil');
            $nombre_archivo = $archivo->getClientOriginalName();

            $archivo->move(public_path().'\profile_pic',$nombre_archivo);

        }
        $request->request->add(['photo' => $nombre_archivo]);

        $validado = $this->validator($request->all())->validate();
        $teacher = $this->create($request->all());

        $notificacion = 'ERROR al registrar estudiante';
        if($teacher){
            $notificacion= ' Nuevo estudiante registrado correctamente';
        }
        return redirect()->route('admin.dashboard', ['notificacion' =>  $notificacion]);

    }

    protected function validator(array $data)
    {
        return Validator::make($data, [

            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'surname' => 'required|string|max:255',
            'second_surname' => 'required|string|max:255',
            'rut' => 'required|string|max:14',
            'curso' => 'required|not_in:0',
            'address' => 'required|string|max:1000',
            'fecha_nacimiento' => 'required|date',
            'apoderado' => 'required|string|max:1000',
            'password' => 'required|string|min:6|confirmed',

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if (strnatcasecmp($data['password'],$data['password_confirmation']) === 0)
        {
            return User::create([
                'name' => $data['name'],
                'rut'=> $data['rut'],
                'second_name' => $data['second_name'],
                'surname' => $data['surname'],
                'second_surname' => $data['second_surname'],
                'direccion' => $data['address'],
                'rut' => $data['rut'],
                'fecha_nacimiento'=> $data['fecha_nacimiento'],
                'fono_contacto' => $data['fono_contacto'],
                'id_curso' => $data['curso'],
                'email' => $data['email'],
                'url_imagen' => $data['photo'],
                'password' => Hash::make($data['password']),
            ]);
        }
    }



}
