<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProyectosFacultad extends Model
{
    //
    protected $table='pi_x_fac';
    protected $primaryKey="FAC_ID";
    public $timestamps=false;

    protected $fillable= [
        'FAC_ID',
        'POST_ID'
    ];

    protected $guarded = 
    [
    ];
}
