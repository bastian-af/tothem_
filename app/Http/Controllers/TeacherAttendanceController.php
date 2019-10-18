<?php

namespace App\Http\Controllers;

use Auth;
use App\Asistencia;
use App\Curso;
use App\User;
use App\Teacher;
use Illuminate\Http\Request;
use Carbon\Carbon;


class TeacherAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:teacher');
    }

    public function index($id_curso)
    {
        $grade = Curso::find($id_curso);
        $students = User::where('id_curso', $id_curso)->get();
        $today_print = date('d-m-Y');
        $today = date('Y-m-d');
        $is_taken = false;
        $is_taken = Asistencia::where('fecha', $today)->where('curso_id', $id_curso)->exists();

        return view('teacher.attendance')->with([
            'curso' => $grade,
            'alumnos' => $students,
            'hoy' => $today_print,
            'estado' => $is_taken,
        ]);
    }

    public function create(array $data, $curso_id)
    {
        $asist = new Asistencia;
        $asist->fecha = date('Y-m-d');
        $asist->estado = $data['estado'];
        $asist->curso_id = $curso_id;
        $asist->user_id = $data['id'];
        $asist->teacher_id = Auth::user()->id;

        if($asist->save()){
            return true;
        }
        else{
            return false;
        }

    }

    public function register(Request $request)
    {

        foreach ($request['options'] as $asis_alum){
            $asistencia = $this->create($asis_alum, $request['id_curso']);
        }
        $notificacion = 'ERROR al registrar asistencia';
        $today = date('Y-m-d H:m');
        if($asistencia){
            $notificacion= 'Asistencia registrada correctamente // '.$today;
        }
        return redirect()->route('teacher.attendance',  [ 'id' => $request['id_curso'], 'notificacion' =>  $notificacion]);
    }

    public function historicAttendanceIndex($id_curso)
    {
        $lastAttendanceDate  = Asistencia::where('curso_id', $id_curso)->max('fecha');
        return view('teacher.attendanceHistoric')->with([
            'id_curso'=>$id_curso,
            'lastdate' => $lastAttendanceDate,
        ]);
    }

    public function historicAttendanceByDate($date, $id_curso)
    {
        $allLastAttendance = Asistencia::where('curso_id',$id_curso)->where('fecha', $date)->get()->toArray();
        $attendanceCounter = count($allLastAttendance);

        $profesor=Teacher::where('id', $allLastAttendance[0]['teacher_id'])->select('name', 'surname')->firstOrFail()->toArray();
        $curso=Curso::where('id', $id_curso)->select('numero', 'letra')->firstOrFail()->toArray();
        $allLastAttendance[0]['profesor'] = $profesor['name'].' '.$profesor['surname'];
        $allLastAttendance[0]['curso'] = $curso['numero'].' '.$curso['letra'];

        for($i=0; $i<$attendanceCounter; $i++){

            $studentID= $allLastAttendance[$i]['user_id'];
            $studentData= User::where('id',  $studentID)->get()->toArray();
            $allLastAttendance[$i]['rut'] = $studentData['0']['rut'];
            $allLastAttendance[$i]['nombre'] = $studentData['0']['name'];
            $allLastAttendance[$i]['apellido'] = $studentData['0']['surname'];

            if($allLastAttendance[$i]['estado'] == '1'){ $allLastAttendance[$i]['nombre_estado'] = 'Presente';}
            else if($allLastAttendance[$i]['estado'] == '2'){ $allLastAttendance[$i]['nombre_estado'] = 'Ausente';}
            else if($allLastAttendance[$i]['estado'] == '3'){$allLastAttendance[$i]['nombre_estado'] = 'Atraso';}
            else if($allLastAttendance[$i]['estado'] == '4'){$allLastAttendance[$i]['nombre_estado'] = 'Justificado';}
            else {$allLastAttendance[$i]['nombre_estado'] = 'No Registrado';}

        }
        return $allLastAttendance;
    }

}
