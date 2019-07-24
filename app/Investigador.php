<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Investigador extends Model
{
    protected $table='investigador';

    protected $primaryKey="INV_ID";
    public $timestamps=false;

    protected $fillable= [
        'CATINV_ID',
        'GRUP_ID',
        'CAR_ID',
        'NOMBRE',
        'APELLIDO',
        'CORREOINST',
        'URLRESEARCH',
        'URLLINKEDIN',
        'BIOGRAFIA',
        'FOTO',
        'VIDEO',
        'TIPO'
    ];

    protected $guarded = 
    [
    ];

}
