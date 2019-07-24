<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $table = 'grupo';

    protected $primaryKey="GRUP_ID";

    public $timestamps=false;

    public $fillable = [
        'NOMBRE',
        'DESCRIPCION'
    ];

    protected $guarded=[

    ];

}
