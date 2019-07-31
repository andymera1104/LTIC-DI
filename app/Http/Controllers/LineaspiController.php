<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LineaspiController extends Controller
{

    public function index (){

        //$nombre='Alexis';
        return view ('lineaspiC/lineaspiC');
        //->with('nombre',$nombre);
        }
}
