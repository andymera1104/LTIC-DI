<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escuela extends Model
{
    protected $table='escuela';

    protected $primaryKey="ESC_ID";
    public $timestamps=false;
    public $incrementing= false;

    protected $fillable= [
        'ESC_ID',
        'FAC_ID',
        'NOMBRE',
        'DIRECTOR',
        'TELEFONO',
        'EXTENSION'
    ];

    protected $guarded = 
    [
    ];
}
