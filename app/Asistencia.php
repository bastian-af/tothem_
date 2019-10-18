<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asistencia extends Model
{
    protected $table = "asistencias";
    protected $primaryKey = 'id';
    use SoftDeletes;
    protected $dates = ['delete_at', 'created_at'];
    protected $fillable = [
        'estado','curso_id','user_id'
    ];
    public $timestamps = false;
    public function user()
    {
        return $this->belongsTo('App\User','id');
    }
    public function curso()
    {
        return $this->belongsTo('App\Curso','id');
    }

}


