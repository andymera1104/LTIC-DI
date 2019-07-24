<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LineasController extends Controller
{
    //
    public function index (){

        //$nombre='Alexis';
        return view ('lineasC/lineasC');
        //->with('nombre',$nombre);
        }
}
