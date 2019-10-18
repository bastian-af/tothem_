<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Curso extends Model
{
    protected $table = 'cursos';
    protected $primaryKey = 'id';
    use SoftDeletes;
    protected $dates = ['delete_at'];
    protected $fillable = [
        'numero','letra','teacher_id'
    ];
    public $timestamps = false;

    public function teacher()
    {
        return $this->belongsTo('App\Teacher','id');
    }
public function findTeacher(){
    $teacher = Teacher::find(teacher_id);
    return $teacher->name;
}
    public function user()
    {
        return $this->hasMany('App\User','id');
    }

    public function asignatutas()
    {
        return $this->hasMany('App\Asignatura','id');
    }


}
