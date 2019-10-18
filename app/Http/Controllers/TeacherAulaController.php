<?php

namespace App\Http\Controllers;

use App\Evaluacion;
use App\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Auth;
use App\Asignatura;
use App\CursoAsignatura;
use App\Curso;
use App\Teacher;
use App\LibroNota;
use App\Unidad;
use App\Material;


class TeacherAulaController extends Controller
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

    function subjectFile(Request $request){
        if($request->hasFile('archivo')){
            $archivo = $request->file('archivo');
            $tipo_archivo = $request->tipo_archivo;
            $id_unidad = $request->unidad_id;

            $nombre_archivo = $archivo->getClientOriginalName();

            $variable=$archivo->move(public_path().'/archivos_unidades/',$nombre_archivo);
            $ruta = $nombre_archivo;

            $request->request->add(['ruta' => $ruta]);
            $request->request->add(['nombre_archivo' => $nombre_archivo]);
            $unidad_archivo = $this->create($request->all());

            return response()->json('done');

        }else{
            return response()->json('fail');
        }
    }

    public function subjectMarks($id){

        $asignatura= Asignatura::where('id',$id)->firstOrFail();
        $curso_asignaturas = CursoAsignatura::where('id_asignatura', $asignatura->id)->get()->toarray();

        if (!isset($curso_asignaturas) || empty($curso_asignaturas)) {

            return redirect(route('teacher.subject',$id));

        } else{

            $pilaNotas=array();
            $counterCurAsig = count($curso_asignaturas);

            for($i=0; $i<$counterCurAsig; $i++) {

                //Obtenemos las notas de la asignatura
                $currNotas = LibroNota::where('id_curso_asignatura', $curso_asignaturas[$i]['id'])->get()->toarray();

                //Guardamos las notas de la asignatura y el nombre de la misma
                $pilaNotas['notas_asign'] = $currNotas;
                $pilaNotas['nombre_asig'] = $asignatura->name;


                $counterNotas = count($pilaNotas['notas_asign']);
                for($j=0; $j<$counterNotas; $j++){

                    //obtenemos los datos del estudiante que obtuvo la nota actual y la evaluacion relacionada
                    $stu = User::where('id',$pilaNotas['notas_asign'][$j]['id_alumno'])->firstOrFail();
                    $eval = Evaluacion::where('id', $pilaNotas['notas_asign'][$j]['id_evaluacion'])->firstOrFail();

                    //guardamos el nombre de la evaluacion y del estudiante que obtuvo la nota actual
                    $pilaNotas['notas_asign'][$j]['rut'] = $stu->rut;
                    $pilaNotas['notas_asign'][$j]['nombre_estu'] = $stu->name.' '.$stu->surname;
                    $pilaNotas['notas_asign'][$j]['nombre_eval'] = $eval->name;
                }

            }
        }

        $current_asignatura = 'hola';
        return view('teacher.subjectMarks')->with([
            'pilaNotas' => $pilaNotas,
            'id_subject' => $id
        ]);
    }

    function addUnit(Request $request){
        $unidad = $this->crearUnidad($request->all());
        if($unidad){
            return response()->json('data');
        }else{
            return response()->json('fail');
        }
    }

    function crearUnidad(array $data){
        return Unidad::create([
            'name' => $data['titulo'],
            'descripcion' => $data['descripcion'],
            'numero'=> $data['numero'],
            'asignatura_id' => $data['id_asignatura'],
        ]);
    }

    protected function create(array $data)
    {
        return Material::create([
            'unidad_id' => $data['unidad_id'],
            'ruta_archivo'=> $data['ruta'],
            'nombre'=> $data['nombre_archivo'],
            'tipo'=> $data['tipo_archivo']
        ]);
    }

    public function deleteMaterial($id){
        $material= Material::find($id);
        if($material->delete()){
            return 1;
        }else{
            return 0;
        }
    }
    public function deleteUnidad($id){
        $unidad= Unidad::find($id);
        if($unidad->delete()){
            return 1;
        }else{
            return 0;
        }
    }
}
