<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Laboratorio;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\LaboratorioFormRequest;
use Illuminate\Support\Facades\Session;
use DB;

class LaboratorioC extends Controller
{
    
    public function index(Request $request)
    {
        if($request)
        {
            $query=trim($request->get('searchText'));
            $laboratorios=DB::table('laboratorio as lab')
            ->join('carrera as car','lab.CAR_ID','=','car.CAR_ID')
            ->join('centinvest as cen','lab.CENINV_ID','=','cen.CENINV_ID')

            ->select('car.NOMBRE as carrera','cen.NOMBRE as centro','lab.NOMBRE as laboratorio','lab.DESCRIPCION','lab.IMAGEN')
            ->where('lab.NOMBRE','LIKE','%'.$query.'%')
            ->orwhere('car.NOMBRE','LIKE','%'.$query.'%')
            ->orderBy('car.NOMBRE', 'asc')
            ->paginate(10);

            return view('laboratoriosC/laboratoriosC',["laboratorios"=>$laboratorios,"searchText"=>$query]);


        }
    }
}
