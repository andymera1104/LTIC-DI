<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests;
use App\Investigador;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
//use App\Http\Requests\LaboratorioFormRequest;
use Illuminate\Support\Facades\Session;
use DB;


class investigadoresC extends Controller
{
    //
    public function index(Request $request)
    {
        if($request)
        {
        $query=trim($request->get('searchText'));
            $investigador=DB::table('investigador as inv')
            ->join('carrera as car','inv.CAR_ID','=','car.CAR_ID')

            ->select('inv.NOMBRE','inv.APELLIDO','car.NOMBRE as carrera','inv.CORREOINST','inv.FOTO')
            //'inv.BIOGRAFIA'
            ->where('inv.NOMBRE','LIKE','%'.$query.'%')
            ->orwhere('car.NOMBRE','LIKE','%'.$query.'%')
            ->orderBy('car.NOMBRE', 'asc')
            ->paginate(10);

            return view('investigacionC/investigadoresC',["investigador"=>$investigador,"searchText"=>$query]);

        }
        
    }
}
