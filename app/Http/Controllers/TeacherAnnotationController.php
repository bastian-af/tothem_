<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;
use App\Curso;
use App\Teacher;
use App\Anotacion;

class TeacherAnnotationController extends Controller
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

    public function index($id)
    {
        $alumno = User::find($id);

        return view('teacher.annotations')->with([
            'alumno' => $alumno,

        ]);
    }
    public function list($id)
    {
        $alumno = User::find($id);
        $curso=Curso::where('id',$alumno->id_curso)->firstOrFail();
        $anotaciones = Anotacion::where('user_id', $alumno->id)->get()->toarray();
        if (!isset($anotaciones)|| empty($anotaciones)) {
            return view('teacher.annotationsList')->with([
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
            return view('teacher.annotationsList')->with([
                'alumno' => $alumno,
                'anotaciones' => $lista_anotaciones,
                'curso' => $curso,
            ]);
        }
    }


    public function add(Request $request,$idStudent)
    {
        $request->request->add(['idalumno' => $idStudent]);
        $this->create($request->all());

        return redirect(route('teacher.annotation.list',$idStudent));
    }

    protected function create(array $data)
    {
        $anotacion = new Anotacion;
        $anotacion->tipo = $data['tipoAnot'];
        $anotacion->descripcion = $data['descripcion'];
        $anotacion->teacher_id = Auth::user()->id;
        $anotacion->user_id = $data['idalumno'];
        $anotacion->fecha= date("Y-m-d H:i:s");
        $anotacion->save();
    }
    public function deleteAnnotation($id){
        $anotation= Anotacion::find($id);
        $id_est=$anotation->user_id;
        if($anotation->delete()){
            return 1;
        }else{
            return 0;
        }

    }
}
