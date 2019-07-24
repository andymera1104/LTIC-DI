<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function index (){

        $nombre='Alexis';
        return view ('contactenos/contacto')->with('nombre',$nombre);
    }
}
