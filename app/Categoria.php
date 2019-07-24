<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'cat_invest';

    protected $primaryKey="CATINV_ID";

    public $timestamps=false;

    public $fillable = [
        'NIVEL'
    ];

    protected $guarded=[

    ];


}
