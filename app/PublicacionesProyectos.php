<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublicacionesProyectos extends Model
{
    //
    protected $table='publicaciones';

    protected $primaryKey="PUBL_ID";
    public $timestamps=false;
    public $incrementing= false;

    protected $fillable= [
        'AREA_ID',
        'FAC_ID',
        'POST_ID',
        'TITULO',
        'ABSTRACT',
        'FECHAPUB',
        'REVISTA',
        'TIPO',
        'NIVEL'
    ];

    protected $guarded = 
    [
    ];
}
