<?php

namespace App\Http\Controllers;

use App\CursoAsignatura;
use App\Evaluacion;
use App\LibroNota;
use App\Material;
use App\User;
use App\Asistencia;
use App\Asignatura;
use App\Curso;
use App\Calendar;
use App\Anotacion;
use App\Teacher;
use App\Unidad;
use Carbon\Carbon;

use Auth;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function student()
    {
        $alumno= User::find(Auth::user()->id);
        $curso = Curso::where('id',$alumno->id_curso)->firstOrFail();
        $cursoAsignatura = CursoAsignatura::where('id_curso',$alumno->id_curso)->get()->toarray();
        //obtener asignaturas del curso y su profesor
        foreach ($cursoAsignatura as $currentCursoAsigna){
            $asignaturas[$currentCursoAsigna['id_asignatura']]= Asignatura::where('id',$currentCursoAsigna['id_asignatura'])->firstOrFail();
            $current_asigna_profesor = Teacher::where('id',$currentCursoAsigna['id_teacher'])->firstOrFail()->toarray();
            $asignaturas[$currentCursoAsigna['id_asignatura']]['profesor']=$current_asigna_profesor;
        }



        return view('portalStudent')->with([
            'cursos'=> $curso,
            'subjects'=> $asignaturas,
            'user'=> $alumno,
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function attendance($id)
    {
         $alumno= User::find(Auth::user()->id);
         $curso = Curso::find($alumno->id_curso);
         $attendances = Asistencia::where('user_id',$id)->get()->toArray();

         $count_att = count($attendances);

         for($i=0; $i < $count_att; $i++){
             $new_date = Carbon::parse($attendances[$i]['fecha'])->format('d/m/Y') ;
             $attendances[$i]['fecha'] = $new_date;
             $profe = Teacher::find($attendances[$i]['teacher_id']);
            $attendances[$i]['nombre_profe'] = $profe->name.' '.$profe->surname;
         }

        if($curso){
            $curso_alumn = $curso->numero.''.$curso->letra;
        }else{
            $curso_alumn="--";
        }
         return view('student.attendance')->with([
             'curso'=> $curso_alumn,
             'attendances'=> $attendances,
             'user'=> $alumno
         ]);
    }

    public function marks($id){

        $curso=Curso::where('id',$id)->firstOrFail();
        $curso_asignaturas =CursoAsignatura::where('id_curso',$curso->id)->get()->toarray();
        if (!isset($curso_asignaturas) || empty($curso_asignaturas)) {
            return view('student.marks');
        }else{
            foreach ($curso_asignaturas as $curso_asignatura) {
                $current_asignatura = Asignatura::where('id', $curso_asignatura['id_asignatura'])->firstOrFail()->toarray();
                $asignaturas[$curso_asignatura['id']] = $current_asignatura;
                $asignaturas[$curso_asignatura['id']]['curso_asignatura'] = $curso_asignatura['id'];
                $current_notas = LibroNota::where('id_curso_asignatura', $curso_asignatura['id'])->where('id_alumno', $id)->get()->toarray();
                if (isset($current_notas) && !empty($current_notas)) {
                    $asignaturas[$curso_asignatura['id']]['cantidad']= count($current_notas);
                    $asignaturas[$curso_asignatura['id']]['promedio']= $this->promedio($current_notas);
                    foreach ($current_notas as $current_nota){
                        $evaluacion=Evaluacion::where('id',$current_nota['id_evaluacion'])->firstOrFail()->toarray();
                        $evaluacion['nota']=$current_nota['nota'];
                        $asignaturas[$curso_asignatura['id']]['evaluaciones'][] = $evaluacion;
                    }
                }
            }
        }
        return view('student.marks')->with([
            'asignaturas' => $asignaturas,
            'curso'=>$curso,
        ]);
    }

    public function promedio(array $notas){
        $subTotal=0;
        foreach ($notas as $nota){
            $subTotal= $subTotal+$nota['nota'];
        }
        return $subTotal/count($notas);

    }

    public function subjects($id)
    {
        $curso_asig = CursoAsignatura::where('id_curso',$id)->get()->toArray();

        foreach($curso_asig as $asignatura) {
            $current_asignatura = Asignatura::where('id', $asignatura['id_asignatura'])->get()->toArray();
            $asignatura_cursos[$current_asignatura['0']['id']] = $current_asignatura['0'];
            $current_asigna_profesor = Teacher::where('id',$asignatura['id_teacher'])->firstOrFail()->toarray();
            $asignatura_cursos[$current_asignatura['0']['id']]['profesor']=$current_asigna_profesor;
            $unidades= Unidad::where('asignatura_id',$current_asignatura[0]['id'])->get()->toarray();
            for($i=0;$i<count($unidades);$i++){
                $current_contenido = Material::where('unidad_id',$unidades[$i]['id'])->get()->toarray();
                $unidades[$i]['contenido']=$current_contenido;
            }
            $asignatura_cursos[$current_asignatura['0']['id']]['unidades']=$unidades;
        }
        return view('student.subjects')->with([

            'subjects' => $asignatura_cursos,
        ]);
    }

    public function activity_calendar(){

        $student= User::find(Auth::user()->id);
        $calendario = Calendar::where('id_curso', $student->id_curso)->get()->toArray();

        //Obtenemos el curso asociado a la actividad de calendario y se guardan los datos en el arreglo del calendario
        for ($i=0; $i<count($calendario); $i++) {
            $calendario[$i]['data_teacher'] = Teacher::where('id', $calendario[$i]['id_teacher'])->get()->toArray();
        }

        return view('student/activityCalendar')->with([
            'calendario' => $calendario,
        ]);
    }

    public function contentSubject($id){
        $asignatura= Asignatura::where('id',$id)->firstOrFail();
        $curso_asignatura= CursoAsignatura::where('id_asignatura',$asignatura->id)->firstOrFail();
        $profesor=Teacher::where('id',$curso_asignatura->id_teacher)->firstOrFail();
        $curso=Curso::where('id',$curso_asignatura->id_curso)->firstOrFail();
        $curs_name= $curso->numero.'° '.$curso->letra;
        $unidades= Unidad::where('asignatura_id',$asignatura->id)->orderBy('numero','asc')->get()->toarray();
        if (!isset($unidades) || empty($unidades)) {
            return view('student.subjectContent')->with([
                'asignatura' => $asignatura,
                'teacher'=> $profesor,
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
            return view('student.subjectContent')->with([
                'asignatura' => $asignatura,
                'unidades' => $unidades,
                'curso'=> $curs_name,
                'teacher'=> $profesor,
            ]);
    }
    public function showAnnotations($id){
        $alumno = User::find($id);
        $curso=Curso::where('id',$alumno->id_curso)->firstOrFail();
        $anotaciones = Anotacion::where('user_id', $alumno->id)->get()->toarray();
        if (!isset($anotaciones)|| empty($anotaciones)) {
            return view('student.annotations')->with([
                'alumno' => $alumno,
                'curso' => $curso,
            ]);
        }else{
            foreach ($anotaciones as $anotacion) {
                $profe = Teacher::where('id', $anotacion['teacher_id'])->firstOrFail()->toarray();
                $lista_anotaciones[$anotacion['id']] = $anotacion;
                $lista_anotaciones[$anotacion['id']]['fecha'] = date_parse($lista_anotaciones[$anotacion['id']]['fecha']);
                $lista_anotaciones[$anotacion['id']]['profesor'] = $profe;
            }
            return view('student.annotations')->with([
                'alumno' => $alumno,
                'anotaciones' => $lista_anotaciones,
                'curso' => $curso,
            ]);
        }
    }
}