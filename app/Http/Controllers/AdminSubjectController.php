<?php

namespace App\Http\Controllers;

use App\Asignatura;
use App\Curso;
use Illuminate\Http\Request;
use App\Teacher;
use App\CursoAsignatura;
use App\Unidad;
use App\Material;
use App\LibroNota;
use App\Evaluacion;
use App\User;
use Illuminate\Support\Facades\Validator;

class AdminSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $profesores=Teacher::all();
        return view('admin.addSubject')->with([
            'teachers'=>$profesores,
            'id_curso'=>$id
        ]);

    }

    protected function validatorSubject(array $data)
    {
        return Validator::make($data, [
            'name'=>'required|string|max:100',
            'descripcion'=>'required|string|max:5000',
            'color'=>'required',
            'teacher_id'=>'required',
        ]);
    }

    public function store(Request $request,$id)
    {
        $nombre_archivo = 'welcome_card.jpg';
        if($request->hasFile('img_asignatura')){
            $archivo = $request->file('img_asignatura');
            $nombre_archivo = $archivo->getClientOriginalName();
            $archivo->move(public_path().'\subject_pic',$nombre_archivo);

        }
        $request->request->add(['photo' => $nombre_archivo]);

        $this->validatorSubject($request->all())->validate();
        $asignaturaCreada= $this->crearAsignatura($request->all());
        $notificacion = 'Error al crear el asignatura';
        if ($asignaturaCreada){
            $curso_asignatura=CursoAsignatura::create([
                'id_curso'=>$id,
                'id_asignatura'=>$asignaturaCreada->id,
                'id_teacher'=> $request->teacher_id,
            ]);
            if($curso_asignatura)
            $notificacion = 'Creado con exito';
        }
        return redirect()->route('admin.dashboard', ['notificacion' => $notificacion]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $asignatura= Asignatura::where('id',$id)->firstOrFail();
        $curso_asignatura=CursoAsignatura::where('id_asignatura',$asignatura->id)->firstOrFail();
        $curso=Curso::where('id',$curso_asignatura->id_curso)->firstOrFail();
        $teacher=Teacher::where('id',$curso_asignatura->id_teacher)->firstOrFail();
        $unidades= Unidad::where('asignatura_id',$asignatura->id)->orderBy('numero','asc')->get()->toarray();
        if (!isset($unidades) || empty($unidades)){
            return view('admin.subject')->with([
                'asignatura' => $asignatura,
                'teacher' => $teacher,
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
        return view('admin.subject')->with([
            'asignatura' => $asignatura,
            'unidades' => $unidades,
            'teacher'=>$teacher,
            'curso' => $curso,
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profesores = Teacher::all();
        $asignatura = Asignatura::where('id',$id)->firstOrFail()->toarray();
        return view('admin.editSubject')->with([
            'teachers'=>$profesores,
            'asignatura'=>$asignatura
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $nombre_archivo = 'welcome_card.jpg';
        if($request->hasFile('img_asignatura')){
            $archivo = $request->file('img_asignatura');
            $nombre_archivo = $archivo->getClientOriginalName();
            $archivo->move(public_path().'\subject_pic',$nombre_archivo);
        }
        $request->request->add(['photo' => $nombre_archivo]);
        $this->validatorSubject($request->all())->validate();
        $subject = Asignatura::where('id',$id)->firstOrFail();
        $curso_asig=CursoAsignatura::where('id_asignatura',$id)->firstOrFail();
        if($subject && $curso_asig ) {
            $curso_asig->id_teacher=$request->teacher_id;
            $subject->name = $request->name;
            $subject->descripcion = $request->descripcion;
            $subject->color = $request->color;
            $subject->url_imagen = $request->photo;
            if ($subject->save()&&$curso_asig->save()) {
                $notificacion = 'Cambios realizados con exito';
            }else
                $notificacion = 'Error al guardar cambios.';
        }else
            $notificacion = 'Error al editar asignatura';

        return redirect()->route('admin.dashboard', ['notificacion' => $notificacion]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $asignatura=Asignatura::find($id);
        $curso_asignatura=CursoAsignatura::where('id_asignatura',$asignatura->id)->firstOrFail();

        if($curso_asignatura->delete() && $asignatura->delete()){
            $notificacion='Asignatura eliminada';
        }else
            $notificacion = 'Problemas al eliminar';

        return redirect()->route('admin.dashboard', ['notificacion' => $notificacion]);
    }

    public function crearAsignatura(array $request){
        return Asignatura::create([
            'name' => $request['name'],
            'descripcion'=>$request['descripcion'],
            'color'=>$request['color'],
            'url_imagen'=>$request['photo']
        ]);
    }

    public function subjectMarks($id){

        $asignatura= Asignatura::where('id',$id)->firstOrFail();
        $curso_asignaturas = CursoAsignatura::where('id_asignatura', $asignatura->id)->get()->toarray();

        if (!isset($curso_asignaturas) || empty($curso_asignaturas)) {

            return redirect(route('admin.subject',$id));

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
        return view('admin.subjectMarks')->with([
            'pilaNotas' => $pilaNotas,
            'id_subject' => $id
        ]);
    }
}
