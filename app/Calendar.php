<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Calendar extends Model
{
    protected $table = "calendario";
    use SoftDeletes;
    protected $primaryKey = 'id';

    public $timestamps = false;

    public function teacher()
    {
        return $this->belongsTo('App\Teacher','id');
    }

}


