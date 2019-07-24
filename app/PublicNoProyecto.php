<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublicNoProyecto extends Model
{
    protected $table='publc_no_prycts';

    protected $primaryKey="PUBLNOPROY_ID";
    public $timestamps=false;
    public $incrementing= false;

    protected $fillable= [
        'AREA_ID',
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
