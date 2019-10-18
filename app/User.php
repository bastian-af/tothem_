<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'users';
    use SoftDeletes;
    protected $dates = ['delete_at'];


    protected $fillable = [
        'name', 'second_name', 'surname', 'second_surname', 'direccion','apoderado','url_imagen','id_curso',
        'rut', 'fecha_nacimiento', 'fono_contacto', 'email', 'password', 'password_confirmation','id'
    ];



    protected $hidden = [
        'password', 'remember_token'
    ];

    public function curso()
    {
        return $this->belongsTo('App\Curso','id');
    }

    public function asistencia()
    {
        return $this->hasMany('App\Asistencia','id');
    }
}
