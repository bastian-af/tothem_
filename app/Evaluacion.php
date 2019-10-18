<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evaluacion extends Model
{
    protected $table = "evaluaciones";
    protected $primaryKey = 'id';
    use SoftDeletes;
    protected $fillable = [
        'name','hora_final','tipo_actividad','hora_inicio','asignatura_id','teacher_id','id'
    ];
    public $timestamps = false;

    public function asignatura()
    {
        return $this->belongsTo('App\Asignatura', 'id');
    }




}
