<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unidad extends Model
{
    protected $table = "unidades";
    protected $primaryKey = 'id';
    use SoftDeletes;
    protected $dates = ['delete_at'];

    protected $fillable = [
        'name', 'id', 'numero', 'descripcion','asignatura_id',
    ];
    public function material_aula(){

        return $this->HasMany('App/Material', 'id');
    }
}
