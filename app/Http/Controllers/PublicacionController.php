<?php

namespace App\Http\Controllers;

use DB;
use App\Publicacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
//use Validator;



class PublicacionController extends Controller
{
    public function index()
    {
        try{            
            $publicacionR = Publicacion::paginate(5); 
            $publicacionRT = Publicacion::all();
            htmlentities($publicacionR, ENT_QUOTES, "UTF-8");
            //return dd($publicacionR);
            return view('publicacionC.index',['publicacionT'=>$publicacionR,'publicacionTT'=>$publicacionRT,'errores' => null]);//vista,renombre,nombre variable
        }
      catch(\Illuminate\Database\QueryException $e){
            $publicacionR = Publicacion::paginate(5);  
            $publicacionRT = Publicacion::all();
            return view('publicacionC.index', [                
                'errores' => $e-getMessage(),
                'publicacionT'=>$publicacionR,
                'publicacionTT'=>$publicacionRT
            ]);
        }  
    }    

  
}