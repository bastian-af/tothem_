<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asignatura;
use App\Curso;
use App\User;
use App\Teacher;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\Types\Object_;

class AdminTeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index($id)
    {
        $profesor= Teacher::find($id);
        $curso_jefatura = Curso::where('teacher_id',$profesor->id)->first();
        if(!$curso_jefatura){
            $jefatura= new Object_();
            $jefatura->numero='Sin';
            $jefatura->letra='Jefatura';
        }else
            $jefatura=$curso_jefatura;
        return view('admin.teacher')->with([
            'user' => $profesor,
            'curso' => $jefatura,
        ]);
    }

    public function editTeacher($id)
    {
        $teachers= Teacher::find($id);
        $curso_jefatura = Curso::where('teacher_id',$teachers->id)->first();
        if(!$curso_jefatura){
            $jefatura= new Object_();
            $jefatura->numero='Sin';
            $jefatura->letra='Jefatura';
        }else
            $jefatura=$curso_jefatura;
        return view('admin.editTeacher')->with([
            'teacher' => $teachers,
            'jefatura' => $jefatura,
        ]);
    }

    public function updateTeacher(Request $request, $id)
    {

        if($request->hasFile('img_perfil')){
            $archivo = $request->file('img_perfil');
            $nombre_archivo = $archivo->getClientOriginalName();
            $archivo->move(public_path().'\profile_pic',$nombre_archivo);
        }else{
            $nombre_archivo = 'userprofilepic.png';
        }
        $request->request->add(['photo' => $nombre_archivo]);

        $this->validatorTeacher($request->all())->validate();

        $teachers = Teacher::find($id);
        $teachers->name = $request->name;
        $teachers->second_name = $request->second_name;
        $teachers->surname = $request->surname;
        $teachers->second_surname = $request->second_surname;
        $teachers->job_title = $request->jobTitle;
        $teachers->fecha_nacimiento = $request->fecha_nacimiento;
        $teachers->email = $request->email;
        $teachers->direccion = $request->address;
        $teachers->fono_contacto = $request->fono_contacto;
        $teachers->rut = $request->rut;
        $teachers->url_imagen=$request->photo;
        $teachers->password=Hash::make($request->password);

        $notificacion = 'Error al guardar cambios.';
        if ($teachers->save()) {
            $notificacion = 'Cambios realizados con exito';
        }

        return redirect()->route('admin.dashboard', ['notificacion' => $notificacion]);
    }

    protected function validatorTeacher(array $data)
    {
        return Validator::make($data, [
            'name'=>'required|string|max:100',
            'second_name'=>'required|string|max:100',
            'surname'=>'required|string|max:100',
            'second_surname'=>'required|string|max:100',
            'fecha_nacimiento'=>'required|date',
            'email'=>'required|string|email|max:255|unique:users',
            'address'=>'required|string|max:50',
            'fono_contacto'=>'required|string|max:15',
            'password'=>'required|string|min:6|confirmed',
            'jobTitle'=>'required|string|max:100',
            'rut'=>'required|string|max:13',
        ]);
    }

    public function deleteTeacher($id)
    {
        $teachers= Teacher::find($id);
        $notificacion = 'Error al eliminar profesor';
        if ($teachers->delete()) {
            $notificacion = 'Eliminado correctamente';
        }
        return redirect()->route('admin.dashboard', ['notificacion' => $notificacion]);
    }


}
