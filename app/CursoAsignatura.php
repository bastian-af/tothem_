<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CursoAsignatura extends Model
{
    protected $table = "cursos_asignaturas";
    protected $primaryKey = 'id';
    use SoftDeletes;
    protected $fillable = [
        'id', 'id_curso', 'id_asignatura', 'id_teacher',
    ];
}
