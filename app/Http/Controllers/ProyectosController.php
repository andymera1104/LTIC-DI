<?php

namespace App\Http\Controllers;
use App\ProyectoInvestigacion;
use App\PI_Postulados;
use App\ProyectosFacultad;
use DB;

use Illuminate\Http\Request;

class ProyectosController extends Controller
{
    public function index (){       
        return view ('proyectosC/proyectosC');

    }
}
