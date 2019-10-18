<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\TeacherResetPasswordNotification;
use Illuminate\Database\Eloquent\SoftDeletes;


class Teacher extends Authenticatable
{
    use Notifiable;
    protected $table = 'teachers';
    use SoftDeletes;
    protected $dates = ['delete_at'];


    protected $fillable = [
        'name', 'second_name', 'surname', 'second_surname', 'direccion','fecha_nacimiento',
        'fono_contacto', 'email', 'password', 'password_confirmation', 'url_imagen', 'job_title', 'id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new TeacherResetPasswordNotification($token));
    }
    /*public function curso(){
        $this->hasMany('\App\Curso','id');
    }*/

};
