<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ProyectoInvestigacion;
use App\PI_Postulados;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\ProyectoInvestigacionFormRequest;
use App\Http\Requests\PI_PostuladosFormRequest;
use Illuminate\Support\Facades\Session;
use DB;


class ProyectoInvestigacionController extends Controller
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
            $proyectos=DB::table('proyectoinvestigacion as proinv')
            ->join('pi_postulados as pipos','proinv.POST_ID','=','pipos.POST_ID')
            ->join('programas as prog','proinv.PROG_ID','=','prog.PROG_ID')
            ->join('invs_x_pryct as invpro','proinv.POST_ID','=','invpro.POST_ID')
            ->join('investigador as inv','invpro.INV_ID','=','inv.INV_ID')
            
            
            ->select('proinv.POST_ID','proinv.DESCRIPCION','pipos.NOMBRE as nombre','prog.DESCRIPCION as programa','proinv.DIRECTOR')
            ->where('pipos.NOMBRE','LIKE','%'.$query.'%')
           
               ->orderBy('proinv.POST_ID', 'asc')
               ->paginate(8);

            return view('proyectosInvestigacion/proyectos/index',["proyectos"=>$proyectos,"searchText"=>$query]);


        }
    }

    public function create()
    {
        //para crear proyectos postulados
        $pipo=DB::table('pi_postulados')->get();
        //para nombres de programa
        $programa=DB::table('programas')->get();
        //para nombres de investigador
        $inves= DB::table('investigador')->get();
        //dd($categorias);
        return view('proyectosInvestigacion/proyectos/create',["pipo"=>$pipo,"programa"=>$programa,"inves"=>$inves]);

    }

    public function store(ProyectoInvestigacionFormRequest $request)
    {
        try{
        $proinv = new ProyectoInvestigacion;
        $proinv->POST_ID=$request->get('POST_ID');
        $proinv->PROG_ID=$request->get('PROG_ID');
        $proinv->DESCRIPCION=$request->get('DESCRIPCION');
        $proinv->VIDEO=$request->get('VIDEO');
        //director del proyecto
        $proinv->DIRECTOR=$request->get('DIRECTOR');
        $proinv->save();

        if(Input::hasFile('IMAGEN'))
        {
            $file = Input::file('IMAGEN');
            $file->move(public_path().'/imagenes/proyectos/',$file->getClientOriginalName());
            $proinv->IMAGEN = $file->getClientOriginalName();
        }
       
        Session::flash('message', $proinv->POST_ID.' fue creado satisfactoriamente.');
        return Redirect::to('proyectosInvestigacion/proyectos');
        }catch (\Illuminate\Database\QueryException $e)
        {
            
            return redirect()->back()->with('alert', 'ERROR... El registro ya existe!');
        }
    }

    public function show($id)
    {
        return view ("proyectosInvestigacion/proyectos/show",["proinv"=>ProyectoInvestigacion::findOrFail($id)]);
    }

    public function edit($id)
    {
        $proinv = ProyectoInvestigacion::findOrFail($id);
        $pipo= DB::table('pi_postulados')->get();
        $programa= DB::table('programas')->get();
        $inves= DB::table('investigador')->get();

        return view("proyectosInvestigacion/proyectos/edit",["proinv"=>$proinv,"pipo"=>$pipo,"programa"=>$programa,"inves"=>$inves]);
    }

    public function update(ProyectoInvestigacionFormRequest $request, $id)
    {
         $proinv = ProyectoInvestigacion::findOrFail($id);
         $proinv->POST_ID=$request->get('POST_ID');
         $proinv->PROG_ID=$request->get('PROG_ID');
         $proinv->DESCRIPCION=$request->get('DESCRIPCION');
         $proinv->VIDEO=$request->get('VIDEO');
         $proinv->DIRECTOR=$request->get('DIRECTOR');
 
         if(Input::hasFile('IMAGEN'))
         {
             $file = Input::file('IMAGEN');
             $file->move(public_path().'/imagenes/proyectos/',$file->getClientOriginalName());
             $proinv->IMAGEN = $file->getClientOriginalName();
         }
        
         $proinv->save();
         Session::flash('message', $proinv->POST_ID.' fue actualizado.');
         return Redirect::to('proyectosInvestigacion/proyectos');
    }

    public function destroy($id)
    {
        try {
        $proinv=ProyectoInvestigacion::findOrFail($id);
        $proinv->delete();
       Session::flash('message', $proinv->POST_ID.' fue eliminado');
        return Redirect::to('proyectosInvestigacion/proyectos');
        }catch (\Illuminate\Database\QueryException $e)
        {
            //return 'ERROR... Los Datos registrados dependen de otros atributos!!';
            return redirect()->back()->with('alert', 'ERROR... Los Datos registrados dependen de otros atributos!!!');
        }
    }
}
