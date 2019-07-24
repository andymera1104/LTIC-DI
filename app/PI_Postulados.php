<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PI_Postulados extends Model
{
    protected $table='pi_postulados';

    protected $primaryKey="POST_ID";
    public $timestamps=false;
    public $incrementing= false;

    protected $fillable= [
        'POST_ID',
        'ESTADO',
        'NOMBRE'
    ];

    protected $guarded = 
    [
    ];
}
