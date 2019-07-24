<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvestigacionProyectos extends Model
{
    protected $table='invs_x_pryct';
    protected $primaryKey="INV_ID";
    public $timestamps=false;

    protected $fillable= [
        'INV_ID',
        'POST_ID'
    ];

    protected $guarded = 
    [
    ];
}
