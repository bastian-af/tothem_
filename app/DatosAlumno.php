<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DatosAlumno extends Model
{
    protected $table = "datos_alumno";
    protected $primaryKey = 'id';
    use SoftDeletes;
    protected $fillable = [
        'nota'
    ];
    public $timestamps = false;

    public function evaluacion()
    {
        return $this->belongsTo('App\Evaluacion', 'id');
    }
    public function user()
    {
        return $this->belongsTo('App\User','id');
    }




}
