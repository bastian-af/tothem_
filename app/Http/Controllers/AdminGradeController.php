<?php

namespace App\Http\Controllers;

use App\CursoAsignatura;
use App\Evaluacion;
use App\LibroNota;
use Illuminate\Http\Request;
use App\Asignatura;
use App\Curso;
use App\User;
use App\Teacher;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminGradeController extends Controller
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
    public function index($id)
    {
        $curso = Curso::where('id', $id)->firstOrfail();
        $alumnos = User::where('id_curso', $id)->get();
        $teacher = Teacher::where('id', $curso->teacher_id)->firstOrFail();
        $cursos_asig = CursoAsignatura::where('id_curso', $curso->id)->get()->toarray();

        if (!isset($cursos_asig)|| empty($cursos_asig)){
            return view('admin.grade')->with([
                'curso' => $curso,
                'alumnos' => $alumnos,
                'teacher' => $teacher,
            ]);
        }else{
            foreach ($cursos_asig as $curso_asig){
                $current_Asig = Asignatura::where('id', $curso_asig['id_asignatura'])->firstOrfail()->toarray();
                $asignatura[$curso_asig['id']] = $current_Asig;
                $current_profesor = Teacher::where('id', $curso_asig['id_teacher'])->firstOrFail()->toarray();
                $asignatura[$curso_asig['id']]['profesor'] = $current_profesor;
            }
            return view('admin.grade')->with([
                'curso' => $curso,
                'alumnos' => $alumnos,
                'teacher' => $teacher,
                'asignaturas'=>$asignatura,
            ]);
        }


    }

    public function editGrade($id)
    {
        $curso= Curso::find($id);

        $profesores= Teacher::all();
        foreach ($profesores as $profesor){
            if(!Curso::where('teacher_id',$profesor->id)->exists()){
                $teachers[]=$profesor;
            }
        }
        return view('admin.editGrade')->with([
            'curso' => $curso,
            'teachers' => $teachers,
        ]);
    }

    public function updateGrade(Request $request, $id)
    {
        $this->validatorGrade($request->all())->validate();

        $curso= Curso::find($id);
        $curso->numero=$request->numero;
        $curso->letra=strtoupper($request->letra);
        $curso->teacher_id=$request->teacher_id;
        $notificacion = 'Error al editar el curso';
        if ($curso->save()) {
            $notificacion = 'Curso editado con exito';
        }
        return redirect()->route('admin.dashboard', ['notificacion' => $notificacion]);
    }

    protected function validatorGrade(array $data)
    {
        return Validator::make($data, [
            'teacher_id' => '|required|unique:cursos|int|max:10',
            'numero' => 'required|integer|max:8',
            'letra' => 'required|string|max:1',

        ]);
    }

    public function deleteGrade($id)
    {
        $curso= Curso::find($id);

        $notificacion = 'Error al eliminar el curso';
        if ($curso->delete()) {
            $notificacion = 'Eliminado con exito';
        }
        return redirect()->route('admin.dashboard', ['notificacion' => $notificacion]);
    }

    public function addGradeForm()
    {
        $profesores=Teacher::all();
        foreach ($profesores as $profesor){
            if(!Curso::where('teacher_id',$profesor->id)->exists()){
                $teachers[]=$profesor;
            }
        }
        return view('admin.addGrade')->with([
            'teachers'=>$teachers,
        ]);
    }

    public function addGrade(Request $request)
    {
        $this->validatorGrade($request->all())->validate();
        $notificacion = 'Error al crear el curso';
        if ($this->createGrade($request->all())) {
            $notificacion = 'Creado con exito';
        }
        return redirect()->route('admin.dashboard', ['notificacion' => $notificacion]);
    }

    protected function createGrade(array $data)
    {
        return Curso::create([
            'numero' => $data['numero'],
            'letra' => strtoupper($data['letra']),
            'teacher_id' => $data['teacher_id'],
        ]);
    }
}
