<?php

namespace App\Http\Controllers;

use DB;
use App\Investigacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
//use Validator;

class InvestigacionController extends Controller
{
    public function index()
    {
        try{            
            $investigacionR = Investigacion::paginate(5);  
            $investigacionRT = Investigacion::all();     
            htmlentities($investigacionR, ENT_QUOTES, "UTF-8");
            //return dd($investigacionR);
            return view('investigacionC.index',['investigacionT'=>$investigacionR,'investigacionTT'=>$investigacionRT,'errores' => null]);//vista,renombre,nombre variable
        }
      catch(\Illuminate\Database\QueryException $e){
            $investigacionR = Investigacion::paginate(5);  
            $investigacionRT = Investigacion::all();     
            return view('investigacionC.index', [                
                'errores' => $e-getMessage(),
                'investigacionT'=>$investigacionR,
                'investigacionTT'=>$investigacionRT
            ]);
        }  
    }   
    
    
}