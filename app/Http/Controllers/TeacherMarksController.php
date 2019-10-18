<?php

namespace App\Http\Controllers;

use App\Evaluacion;
use Illuminate\Http\Request;
use Auth;
use App\DatosAlumno;
use App\Curso;
use App\User;
use App\CursoAsignatura;
use App\LibroNota;
use App\Asignatura;
use phpDocumentor\Reflection\Types\Integer;

class TeacherMarksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:teacher');
    }

    public function index($id)
    {
        $curso=Curso::where('id',$id)->firstOrFail();
        $date=date('d/m/Y');
        $alumnos = User::where('id_curso',$curso->id)->get();
        $curso_asignatura= CursoAsignatura::where('id_teacher',Auth::user()->id)->where('id_curso',$curso->id)->get()->toarray();

        if (!isset($curso_asignatura) || empty($curso_asignatura)) {

        }else {
            foreach ($curso_asignatura as $curso_asig) {
                $current_asignatura = Asignatura::where('id', $curso_asig['id_asignatura'])->firstOrfail();
                $asignaturas[$current_asignatura['id']]=$current_asignatura;
                $evaluaciones[$curso_asig['id']] = Evaluacion::where('asignatura_id', $curso_asig['id_asignatura'])->where('teacher_id', Auth::user()->id)->get()->toarray();
                if (!isset($evaluaciones[$curso_asig['id']]) || empty($evaluaciones[$curso_asig['id']])) {
                    unset($evaluaciones[$curso_asig['id']]);
                } else {
                    foreach ($evaluaciones as $evaluacion) {
                        for ($i=0;$i<count($evaluaciones[$curso_asig['id']]);$i++) {
                            $current_asignatura_otra = Asignatura::where('id', $evaluacion[$i]['asignatura_id'])->firstOrfail();
                            $evaluaciones[$curso_asig['id']][$i]['asignatura'] = $current_asignatura_otra->name;
                            $evaluaciones[$curso_asig['id']][$i]['curso_asignatura'] = $curso_asig['id'];
                        }
                    }
                }
            }
        }
        $lista_evaluaciones=$evaluaciones;
        foreach ($evaluaciones as $evaluacion){
            for($i=0;$i<count($evaluacion);$i++){
                if (LibroNota::where('id_evaluacion', $evaluacion[$i]['id'])->exists()) {
                    unset($evaluaciones[$evaluacion[$i]['curso_asignatura']][$i]);
                }
            }
        }


        if(!isset($evaluaciones) || empty($evaluaciones)){
            return view('teacher.marks')->with([
                'curso' => $curso,
                'alumnos' => $alumnos,
                'date'=> $date,
                'asignaturas'=> $asignaturas,
                'lista_evaluaciones' => $lista_evaluaciones,
            ]);
        }else{
            return view('teacher.marks')->with([
                'curso' => $curso,
                'alumnos' => $alumnos,
                'evaluaciones' => $evaluaciones,
                'date'=> $date,
                'asignaturas'=> $asignaturas,
                'lista_evaluaciones' => $lista_evaluaciones,
            ]);

        }
    }

    public function register(Request $request)
    {
        $valores_id= explode(',',$request->evaluacion_id[0]);
        foreach ($request->notas as $asis_alum){
            $id_alumno=key($asis_alum);
            $libro_nota = $this->createLibroNotas($asis_alum[$id_alumno],$valores_id[0],$valores_id[1],$id_alumno);
        }
        return redirect(route('teacher.dashboard'));
    }

    protected function createLibroNotas(int $nota,int $id_evaluacion,int $id_curso_asig, int $id_alumno)
    {
            return LibroNota::create([
                'id_evaluacion' => $id_evaluacion,
                'id_alumno' => $id_alumno,
                'id_curso_asignatura'=> $id_curso_asig,
                'nota' => $nota,
            ]);
    }

    public function markStudent($id)
    {
        $alumno=User::where('id',$id)->firstOrFail();
        $curso=Curso::where('id',$alumno->id_curso)->firstOrFail();
        $curso_asignaturas =CursoAsignatura::where('id_teacher',Auth::user()->id)->where('id_curso',$curso->id)->get()->toarray();
        if (!isset($curso_asignaturas) || empty($curso_asignaturas)) {
            return view('teacher.studentMarks')->with([
                'alumno'=>$alumno,
                'curso'=>$curso,
            ]);
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
        return view('teacher.studentMarks')->with([
            'asignaturas' => $asignaturas,
            'alumno'=>$alumno,
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
    public  function  registerEvaluation(Request $request){
        $evaluacion = $this->createEvaluation($request->all());
        if($evaluacion){
            return response()->json('data');
        }else{
            return response()->json('fail');
        }
    }
    protected function createEvaluation(array $data)
    {
        return Evaluacion::create([
        'name' => $data['titulo'],
        'tipo_actividad' => $data['tipo'],
        'hora_inicio'=> $data['evaluacionStart'],
        'hora_final' => $data['evaluacionEnd'],
        'asignatura_id' => $data['asignatura'],
        'teacher_id' => Auth::user()->id
        ]);
    }
    public function deleteEvaluation($id){
        $evaluacion= Evaluacion::where('id',$id)->firstOrFail();
        $notas=LibroNota::where('id_evaluacion',$evaluacion->id)->get();
        foreach ($notas as $nota){
            $this->eliminarNotas($nota->id);
        }
        if($evaluacion->delete()){
            return 1;
        }else{
            return 0;
        }
    }
    public function eliminarNotas($id){
        $libro_notas=LibroNota::where('id',$id)->firstOrFail();
        $libro_notas->delete();
    }
}
