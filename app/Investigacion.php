<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Investigacion extends Model
{
    protected $table = 'dominiosacademicos';
    protected $primaryKey = 'DOM_ID';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = ['NOMBRE','DESCRIPCION', 'IMAGEN', 'VIDEO'];
}
