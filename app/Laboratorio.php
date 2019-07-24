<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laboratorio extends Model
{
    protected $table='laboratorio';

    protected $primaryKey="LAB_ID";
    public $timestamps=false;
    public $incrementing= false;

    protected $fillable= [
        'LAB_ID',
        'CAR_ID',
        'CENINV_ID',
        'NOMBRE',
        'DESCRIPCION',
        'IMAGEN',
    ];

    protected $guarded = 
    [
    ];
}
