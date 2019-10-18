<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Curso;
use App\Teacher;
use App\Unidad;


class Asignatura extends Model
{
    protected $table = "asignaturas";
    protected $primaryKey = 'id';
    use SoftDeletes;
    protected $dates = ['delete_at'];
    protected $fillable = [
        'name','color','descripcion','url_imagen',
    ];
    public $timestamps = false;


    public function teacher()
    {
        return $this->belongsTo('App\Teacher', 'id');
    }
    public function curso()
    {
        return $this->belongsTo('App/Curso', 'id');
    }
    public function unidades()
    {
        return $this->HasMany('App/Unidad', 'id');
    }
}
