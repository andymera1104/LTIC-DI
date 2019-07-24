<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProyectoInvestigacion extends Model
{
    protected $table='proyectoinvestigacion';

    protected $primaryKey="POST_ID";
    public $timestamps=false;
    public $incrementing= false;

    protected $fillable= [
        'PROG_ID',
        'POST_ID',
        //'ACTINV_ID',
        
        'DESCRIPCION',
        'IMAGEN',
        'VIDEO'
    ];

    protected $guarded = 
    [
    ];
}
