<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;
use App\Asignatura;
use App\CursoAsignatura;
use App\LibroNota;
use App\Material;
use App\Curso;
use App\Teacher;
use App\Calendar;
use App\Anotacion;
use App\Unidad;

class TeacherController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:teacher');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profesor= Teacher::where('id',Auth::user()->id)->firstOrFail();
        $curso_jefe=Curso::where('teacher_id',$profesor->id)->firstOrFail();
        $curso_asig = CursoAsignatura::where('id_teacher', $profesor['id'])->get()->toArray();
        //solo interesan los cursos donde el profesor tenga asignaturas
        if (!isset($curso_asig)|| empty($curso_asig)){
            return view('portalTeacher')->with([
                'cursos'=> $curso_jefe,
                'teacher' => $profesor,
            ]);
        }else{
            foreach($curso_asig as $cu_asig){
                $datos_curso = Curso::where('id', $cu_asig['id_curso'])->get()->toArray();
                $datos_asignatura = Asignatura::where('id', $cu_asig['id_asignatura'])->get()->toArray();

                $prof_cur_asig[$cu_asig['id_curso']]['datos_curso']=  $datos_curso[0];
                $prof_cur_asig[$cu_asig['id_curso']]['profe_jefe'] = Teacher::where('id',$datos_curso[0]['teacher_id'])->firstOrFail()->toarray();
                $prof_cur_asig[$cu_asig['id_curso']]['matricula']= User::where('id_curso',$datos_curso[0]['id'])->count();

                $prof_cur_asig[$cu_asig['id_curso']]['asignaturas'][$cu_asig['id_asignatura']] = $datos_asignatura[0];

            }
            return view('portalTeacher')->with([
                'cursos'=> $curso_jefe,
                'teacher' => $profesor,
                'prof_cur_asig' => $prof_cur_asig
            ]);
        }
    }

    public function studentList($id)
    {
        $curso = Curso::where('id',$id)->firstOrFail();
        $alumnos = User::where('id_curso', $curso->id)->get();
        return view('teacher.studentList')->with([
            'curso' => $curso,
            'alumnos' => $alumnos
        ]);
    }
    public function student($id)
    {
        $alumno = User::where('id',$id)->firstOrFail();
        $cursos = Curso::where('id', $alumno->id_curso )->firstOrFail();
        return view('teacher.student')->with([
            'cursos' => $cursos,
            'user' => $alumno
        ]);
    }

    public function subject($id)
    {
        $asignatura= Asignatura::where('id',$id)->firstOrFail();
        $curso_asignatura=CursoAsignatura::where('id_asignatura',$asignatura->id)->firstOrFail();
        $curso=Curso::where('id',$curso_asignatura->id_curso)->firstOrFail();
        $unidades= Unidad::where('asignatura_id',$asignatura->id)->orderBy('numero','asc')->get()->toarray();
        if (!isset($unidades) || empty($unidades)){
            return view('teacher.subject')->with([
                'asignatura' => $asignatura,
                'curso' => $curso,
            ]);
        }else {
            for ($i=0;$i<count($unidades); $i++) {
                //agregando el contenido de cada unidad al arreglo
                $current_content = Material::where('unidad_id', $unidades[$i]['id'])->get()->toarray();
                if (isset($current_content) && !empty($current_content)) {
                    $unidades[$i]['content']=$current_content;
                }
            }
        }
        return view('teacher.subject')->with([
            'asignatura' => $asignatura,
            'unidades' => $unidades,
            'curso'=>$curso,
        ]);
    }


}
