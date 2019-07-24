<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ElementosMultimedia extends Model
{
    protected $table='elmntmultimedia';

    protected $primaryKey="ELEMMULT_ID";
    public $timestamps=false;
    public $incrementing= false;


    protected $fillable= [
        'ELEMMULT_ID',
        'CENINV_ID',
        'FOTO',
        'VIDEO',
        
    ];

    protected $guarded = 
    [
    ];
}
