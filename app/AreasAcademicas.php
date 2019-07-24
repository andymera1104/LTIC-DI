<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AreasAcademicas extends Model
{
    protected $table='areasacademicas';

    protected $primaryKey="AREA_ID";
    public $timestamps=false;
    public $incrementing= false;

    protected $fillable= [
        
        'NOMBRE',
        'DESCRIPCION',
        'IMAGEN',
        'VIDEO'
    ];

    protected $guarded = 
    [
    ];

}
