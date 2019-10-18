<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Material extends Model
{
    protected $table = "material_aula";
    protected $primaryKey = 'id';
    use SoftDeletes;
    protected $dates = ['delete_at'];

    protected $fillable = [
        'nombre', 'id', 'surname', 'tipo', 'ruta_archivo','unidad_id',
    ];
}
