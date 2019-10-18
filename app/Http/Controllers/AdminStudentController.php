<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asignatura;
use App\Curso;
use App\User;
use App\Anotacion;
use App\Evaluacion;
use App\CursoAsignatura;
use App\LibroNota;
use App\Teacher;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;

class AdminStudentController extends Controller
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
        $alumno = User::where('id',$id)->firstOrFail();
        $cursos = Curso::where('id',$alumno->id_curso)->firstOrFail();

        return view('admin.student')->with([
            'user' => $alumno,
            'cursos' => $cursos,
        ]);
    }

    public function obtenerNombreArchivo(Request $request){

        return $request->all();
    }

    public function editStudent($id)
    {
        $alumno = User::find($id);
        $curso=Curso::all();
        return view('admin.editStudent')->with([
            'alumno' => $alumno,
            'cursos' => $curso,
        ]);
    }
    public function listAnnotations($id){
        $alumno = User::find($id);
        $curso=Curso::where('id',$alumno->id_curso)->firstOrFail();
        $anotaciones = Anotacion::where('user_id', $alumno->id)->get()->toarray();
        if (!isset($anotaciones)|| empty($anotaciones)) {
            return view('admin.annotationsList')->with([
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
            return view('admin.annotationsList')->with([
                'alumno' => $alumno,
                'anotaciones' => $lista_anotaciones,
                'curso' => $curso,
            ]);
        }
    }


    public function listMarks($id){

        $alumno=User::where('id',$id)->firstOrFail();
        $curso=Curso::where('id',$alumno->id_curso)->firstOrFail();
        $curso_asignaturas =CursoAsignatura::where('id_curso',$curso->id)->get()->toarray();
        if (!isset($curso_asignaturas) || empty($curso_asignaturas)) {
            return view('admin.studentMarks')->with([
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
        return view('admin.studentMarks')->with([
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

    public function updateStudent(Request $request, $id)
    {
        if($request->hasFile('img_perfil')){
            $archivo = $request->file('img_perfil');
            $nombre_archivo = $archivo->getClientOriginalName();
            $archivo->move(public_path().'\profile_pic',$nombre_archivo);
        }else{
            $nombre_archivo = 'userprofilepic.png';
        }
        $request->request->add(['photo' => $nombre_archivo]);
        $this->validatorStudent($request->all())->validate();

        $student= User::find($id);
        $student->name=$request->name;
        $student->second_name=$request->second_name;
        $student->surname=$request->surname;
        $student->second_surname=$request->second_surname;
        $student->direccion=$request->address;
        $student->fono_contacto=$request->fono_contacto;
        $student->rut=$request->rut;
        $student->fecha_nacimiento=$request->fecha_nacimiento;
        $student->apoderado=$request->name_apoderado;
        $student->email=$request->email;
        $student->id_curso=$request->id_curso;
        $student->url_imagen=$nombre_archivo;
        $student->password=Hash::make($request->password);

        $notificacion = 'Error al guardar cambios.';
        if ($student->save()) {
            $notificacion = 'Cambios realizados con exito';
        }

        return redirect()->route('admin.dashboard', ['notificacion' => $notificacion]);
    }

    protected function validatorStudent(array $data)
    {
        return Validator::make($data, [

            'name' => 'required|string|max:100',
            'second_name' => 'string|max:100',
            'surname' => 'required|string|max:100',
            'second_surname' => 'required|string|max:100',
            'email' => 'email',
            'fono_contacto'=>'required|string|max:15',
            'rut' => 'required|string|max:13',
            'id_curso'=>'required|int',
            'name_apoderado'=>'required|string|max:50',
            'fecha_nacimiento' => 'required|date',
            'address'=>'required|string|min:6',
            'password' => 'required|string|min:6|max:20|confirmed',
        ]);
    }
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'second_name' => $data['second_name'],
            'surname' => $data['surname'],
            'second_surname' => $data['second_surname'],
            'email'=> $data['email'],
            'apoderado'=>$data['apoderado'],
            'fono_contacto'=>$data['fono_contacto'],
            'rut' => $data['rut'],
            'id_curso'=>$data['curso'],
            'fecha_nacimiento' => $data['fecha_nacimiento'],
            'direccion'=>$data['address'],
            'password' => Hash::make($data['password']),
            'url_imagen' => $data['photo'],

        ]);
    }
    public function deleteStudent($id)
    {
        $alumno = User::find($id);
        $notificacion = 'Error al eliminar datos.';
        if ($alumno->delete()) {
            $notificacion = 'Eliminado con exito';
        }

        return redirect()->route('admin.dashboard', ['notificacion' => $notificacion]);

    }


}
