<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\PublicacionesProyectos;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\PublicacionesProyectosFormRequest;
//use Illuminate\Support\Facades\Session;
use DB;


class PublicacionesProyectosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if($request)
        {
            $query=trim($request->get('searchText'));
            $publicaciones=DB::table('publicaciones as public')
            ->join('areasacademicas as acad','public.AREA_ID','=','acad.AREA_ID')
            //->join('pi_x_fac as pifac','public.FAC_ID','=','pifac.FAC_ID')
            //->join('facultad as fac','public.FAC_ID','=','fac.FAC_ID')
            ->join('proyectoinvestigacion as proy', 'public.POST_ID','=','proy.POST_ID')
                    

            ->select('public.PUBL_ID','acad.NOMBRE as area','proy.POST_ID as proyecto','public.TITULO','public.ABSTRACT','public.FECHAPUB','public.REVISTA','public.TIPO')

            ->where('public.TITULO','LIKE','%'.$query.'%')
            ->orwhere('public.REVISTA','LIKE','%'.$query.'%')
            ->orderBy('PUBL_ID', 'ASC')
            ->paginate(7);

            return view('publicaciones/publicacionesProyectos/index',["publicaciones"=>$publicaciones,"searchText"=>$query]);
        }
    }

    public function create()
    {
        $areas=DB::table('areasacademicas')->get();
        $proyectos=DB::table('proyectoinvestigacion')->get();
        //$facultades=DB::table('pi_x_fac')->get();
        //$fac=DB::table('facultad')->get();
        //dd($categorias);
        return view('publicaciones/publicacionesProyectos/create',["areas"=>$areas,"proyectos"=>$proyectos]);

    }

    public function store(PublicacionesProyectosFormRequest $request)
    {
        //try{
        $publicacion = new PublicacionesProyectos;
        $publicacion->PUBL_ID=$request->get('PUBL_ID');
        $publicacion->AREA_ID=$request->get('AREA_ID');
       // $publicacion->FAC_ID=$request->get('FAC_ID');
        $publicacion->POST_ID=$request->get('POST_ID');
        $publicacion->TITULO=$request->get('TITULO');
        $publicacion->ABSTRACT=$request->get('ABSTRACT');
        $publicacion->FECHAPUB=$request->get('FECHAPUB');
        $publicacion->REVISTA=$request->get('REVISTA');
        $publicacion->TIPO=$request->get('TIPO');
        //$publicacion->NIVEL=$request->get('NIVEL');

        $publicacion->save();
        return Redirect::to('publicaciones/publicacionesProyectos');
        //}catch (\Illuminate\Database\QueryException $e)
        //{
          //  return redirect()->back()->with('alert', 'ERROR... El registro ya existe!');
        //}
    }

    public function show($id)
    {
        return view ("publicaciones/publicacionesProyectos/show",["publicacion"=>PublicacionesProyectos::findOrFail($id)]);
    }

    public function edit($id)
    {
        $publicacion = PublicacionesProyectos::findOrFail($id);
        $areas=DB::table('areasacademicas')->get();
        $proyectos=DB::table('proyectoinvestigacion')->get();
        //$facultades=DB::table('pi_x_fac')->get();
        return view("publicaciones/publicacionesProyectos/edit",["publicacion"=>$publicacion,"areas"=>$areas,"proyectos"=>$proyectos]);
    }

    public function update(PublicacionesProyectosFormRequest $request, $id)
    {
         $publicacion = PublicacionesProyectos::findOrFail($id);
         $publicacion->PUBL_ID=$request->get('PUBL_ID');
        $publicacion->AREA_ID=$request->get('AREA_ID');
        //$publicacion->FAC_ID=$request->get('FAC_ID');
        $publicacion->POST_ID=$request->get('POST_ID');
        $publicacion->TITULO=$request->get('TITULO');
        $publicacion->ABSTRACT=$request->get('ABSTRACT');
        $publicacion->FECHAPUB=$request->get('FECHAPUB');
        $publicacion->REVISTA=$request->get('REVISTA');
        $publicacion->TIPO=$request->get('TIPO');
       // $publicacion->NIVEL=$request->get('NIVEL');

        $publicacion->save();
        return Redirect::to('publicaciones/publicacionesProyectos');
    }

    public function destroy($id)
    {
        try{
        $publicacion=PublicacionesProyectos::findOrFail($id);
        $publicacion->delete();
       //Session::flash('message', $inves->NOMBRE.' fue eliminado');
        return Redirect::to('publicaciones/publicacionesProyectos');
        
        }catch (\Illuminate\Database\QueryException $e)
        {
            return redirect()->back()->with('alert', 'ERROR... Los Datos registrados dependen de otros atributos!!!');
        }
    }

    
}
