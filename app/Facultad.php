<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facultad extends Model
{
    protected $table = 'facultad';

    protected $primaryKey="FAC_ID";

    public $timestamps=false;
    public $incrementing= false;

    public $fillable = [
        'CODIGOSEDE',
        'NOMBRE',
        'SUBDECANO',
        'DECANO',
        'TELEFONO',
        'EXTENSION'
    ];

    protected $guarded=[

    ];
}
