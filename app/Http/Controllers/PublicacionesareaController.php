<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicacionesareaController extends Controller
{
    
    public function index (){

        //$nombre='Alexis';
        return view ('publicacionesarea/publicacionesarea');
        //->with('nombre',$nombre);
        }
}
