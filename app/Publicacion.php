<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    protected $table = 'areasacademicas';
    protected $primaryKey = 'AREA_ID';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = ['NOMBRE','DESCRIPCION', 'IMAGEN', 'VIDEO'];
}
