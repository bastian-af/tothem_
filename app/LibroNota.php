<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LibroNota extends Model
{
    protected $table = "libro_notas";
    use SoftDeletes;
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_evaluacion', 'id', 'id_alumno', 'id_curso_asignatura','nota',
    ];
}
