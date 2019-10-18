<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;
use App\Asignatura;
use App\CursoAsignatura;
use App\Curso;
use App\Teacher;
use App\Calendar;


class TeacherCalendarController extends Controller
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
        $profesor= Teacher::find(Auth::user()->id);
        $calendario = Calendar::where('id_teacher', $profesor->id)->get()->toArray();

        $curso_asignatura = CursoAsignatura::where('id_teacher',$profesor->id)->get()->toArray();

        //solo interesan los cursos donde el profesor tenga asignaturas
        foreach($curso_asignatura as $cur_asig){
            $current_curso = Curso::where('id',$cur_asig['id_curso'])->get()->toArray();
            $cursos_profesor[$current_curso['0']['id']] = $current_curso['0'];
        }

        //Obtenemos el curso asociado a la actividad de calendario y se guardan los datos en el arreglo del calendario
        for ($i=0; $i<count($calendario); $i++) {
            $calendario[$i]['data_curso'] = Curso::where('id', $calendario[$i]['id_curso'])->get()->toArray();
        }

        return view('teacher.activityCalendar')->with([
            'teacher' => $profesor,
            'calendario' => $calendario,
            'cursos_profesor' => $cursos_profesor,
        ]);
    }

    public function register(Request $request){

        //$this->activity_calendar_validator($request->all())->validate();

        $actividad = new Calendar;
        $actividad->titulo = $request->titulo;
        $actividad->fecha = $request->fecha;
        $actividad->hora_inicio = $request->hora_inicio;
        $actividad->hora_fin = $request->hora_fin;
        $actividad->id_curso =  $request->id_curso;
        $actividad->id_teacher = Auth::user()->id;


        $actividad->save();

        return redirect(route('teacher.calendar'));

    }
    public function activity(Request $request)
    {
        $actividad = new Calendar;
        $actividad->titulo = $request->titulo;
        $actividad->fecha = $request->fecha;
        $actividad->hora_inicio = $request->hora_inicio;
        $actividad->hora_fin = $request->hora_termino;
        $actividad->id_curso = $request->curso;
        $actividad->id_teacher = Auth::user()->id;


        $actividad->save();
        return response()->json($actividad);
    }
    public function delete($id){
        $actividad=Calendar::find($id);
        $actividad->delete();
        return redirect(route('teacher.calendar'));
    }

    public function deleteActivity(Request $request){

        $actividad=Calendar::find($request);

        $actividad->delete();

        return response()->json($actividad);
    }
}
