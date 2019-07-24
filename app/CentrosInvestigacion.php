<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CentrosInvestigacion extends Model
{
    protected $table='centinvest';

    protected $primaryKey="CENINV_ID";
    public $timestamps=false;
    public $incrementing= false;

    protected $fillable= [
        
        'NOMBRE',
        'DESCRIPCION',
        
    ];

    protected $guarded = 
    [
    ];
}
