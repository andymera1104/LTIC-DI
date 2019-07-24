<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LaboratorioProyecto extends Model
{
    //
    protected $table='lab_x_pi';
    protected $primaryKey="LAB_ID";
    public $timestamps=false;

    protected $fillable= [
        'LAB_ID',
        'POST_ID'
    ];

    protected $guarded = 
    [
    ];
}
