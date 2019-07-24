<?php

namespace App\Http\Controllers;
use App\Laboratorio;
use DB;

use Illuminate\Http\Request;

class LabotController extends Controller
{
    public function index(){
        
        //$laboratorios=\DB::table('laboratorio')
        //->join('carrera', 'carrera.CAR_ID','=','laboratorio.CAR_ID')
        //->select('laboratorio.NOMBRE','laboratorio.DESCRIPCION','laboratorio.IMAGEN','carrera.NOMBRE as CARRERA')
        //->get();


        //$labproinv=\DB::table('lab_x_pi as labpi')
        //->join('proyectoinvestigacion as prin','labpi.POST_ID','=','prin.POST_ID')
        //->join('laboratorio as lab','labpi.LAB_ID','=','lab.LAB_ID')
        //->select('lab.LAB_ID as laboratorio','prin.POST_ID as proyecto')
        //->get();




        //dd($labproinv);
        $laboratorios=Laboratorio::all();
        return view ('labotC/labotC', compact('laboratorios'));

    }
}
