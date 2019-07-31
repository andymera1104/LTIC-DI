<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Investigador;
use App\Noticias;
use APP\PublicacionesProyectos;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
//use App\Http\Requests\LaboratorioFormRequest;
use Illuminate\Support\Facades\Session;
use DB;

class noticiasC extends Controller
{
    public function index(Request $request)
    {
        if($request){
            $query= trim($request -> get('searchText') );
            $noticias= DB::table('noticias')
            ->where('TITULO','LIKE','%'.$query.'%')
            ->orwhere('FECHA','LIKE','%'.$query.'%')
            ->orderBy('FECHA','ASC')
            ->paginate(4);
            return view('noticiasC/noticiasC',["noticias"=>$noticias,"searchText"=>$query]);
        }
    }

    public function index2(Request $request)
    {
        if($request){
            $query= trim($request -> get('searchText') );
            $noticias= DB::table('noticias')
            ->where('TITULO','LIKE','%'.$query.'%')
            ->orwhere('FECHA','LIKE','%'.$query.'%')
            ->orderBy('FECHA','DESC')
            ->paginate(3);
            return view('welcome',["noticias"=>$noticias,"searchText"=>$query]);
        }
    }

    public function publicaciones(Request $request)
    {
        if($request)
        {
            $query=trim($request->get('searchText'));
            $elementos=DB::table('publicaciones as public')
            ->join('areasacademicas as acad','public.AREA_ID','=','acad.AREA_ID')
            ->join('pi_x_fac as pifac','public.FAC_ID','=','pifac.FAC_ID')
            //->join('proyectoinvestigacion as pro', 'pifac.POST_ID', '=','pro.POST_ID' )
            //->join('pi_postulados as pos', 'pro.POST_ID', '=','pos.POST_ID' )

                ->select('public.TITULO','public.ABSTRACT')
                //,'pro.IMAGEN','pos.NOMBRE'
            ->where('public.TITULO','LIKE','%'.$query.'%')
            ->orwhere('public.REVISTA','LIKE','%'.$query.'%')
            ->orderBy('FECHAPUB', 'desc')
            ->paginate(3);

            return view('welcome',["elementos"=>$elementos,"searchText"=>$query]);
        }
    }

}
