<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DominiosAcademicos extends Model
{
    protected $table='dominiosacademicos';

    protected $primaryKey="DOM_ID";
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
