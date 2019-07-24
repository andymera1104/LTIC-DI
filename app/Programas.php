<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programas extends Model
{
    protected $table='programas';

    protected $primaryKey="PROG_ID";
    public $timestamps=false;
    public $incrementing= false;

    protected $fillable= [
    
        'DESCRIPCION',
        
    ];

    protected $guarded = 
    [
    ];
}
