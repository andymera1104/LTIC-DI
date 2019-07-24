<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvPubNoProy extends Model
{
    //
    protected $table='inv_x_pub_no_pryct';
    protected $primaryKey="PUBLNOPROY_ID";
    public $timestamps=false;

    protected $fillable= [
        'PUBLNOPROY_ID',
        'INV_ID'
    ];

    protected $guarded = 
    [
    ];
}
