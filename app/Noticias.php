<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticias extends Model
{
    protected $table='noticias';

    protected $primaryKey="NOT_ID";
    public $timestamps=false;
    public $incrementing= false;

    protected $fillable= [
        
        'TITULO',
        'RESUMEN',
        'IMAGEN',
        'NOTICIA',
        'FECHA'
    ];

    protected $guarded = 
    [
    ];
}
