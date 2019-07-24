<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lineas_x_pi_postulado extends Model
{
    protected $table='lineas_x_pi_postulado';
    protected $primaryKey="POST_ID";
    public $timestamps=false;

    protected $fillable= [
        'LININV_ID',
        'POST_ID'
    ];

    protected $guarded = 
    [
    ];
}
