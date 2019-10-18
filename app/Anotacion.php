<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Anotacion extends Model
{
    protected $table = "anotaciones";
    use SoftDeletes;
    protected $primaryKey = 'id';
    protected $fillable = [
        'name','tipo','descripcion'
    ];
    public $timestamps = false;

    public function teacher()
    {
        return $this->belongsTo('App\Teacher', 'id');
    }
    public function users()
    {
        return $this->belongsTo('App\User','id');
    }

}
