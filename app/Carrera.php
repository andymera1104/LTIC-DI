<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    protected $table='carrera';

    protected $primaryKey="CAR_ID";
    public $timestamps=false;
    public $incrementing= false;

    protected $fillable= [
        'CAR_ID',
        'ESC_ID',
        'NOMBRE',
        'COORDINADOR',
        'TELEFONO',
        'EXTENSION'
    ];

    protected $guarded = 
    [
    ];
}
