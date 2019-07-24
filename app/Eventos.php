<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eventos extends Model
{
    protected $table='eventos';

    protected $primaryKey="EVENT_ID";
    public $timestamps=false;
    public $incrementing= false;

    protected $fillable= [
        
        'TITULO',
        'DESCRIPCION',
        'FECHA_INICIO',
        'FECHA_FIN',
        'LUGAR'
    ];

    protected $guarded = 
    [
    ];
}
