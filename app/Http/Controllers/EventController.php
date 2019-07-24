<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Eventos;
use DB;

class EventController extends Controller
{
       
    public function index(){
            $eventos=Eventos::all();
            return view ('eventC/eventC', compact('eventos'));
        }
}
