<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LineasInvestigacion extends Model
{
    protected $table='lineasinvestigacion';

    protected $primaryKey="LININV_ID";
    public $timestamps=false;
    public $incrementing= false;

    protected $fillable= [
        'DOM_ID',
        'NOMBRE',
        'DESCRIPCION',
        'IMAGEN',
        'VIDEO'
    ];

    protected $guarded = 
    [
    ];
}
