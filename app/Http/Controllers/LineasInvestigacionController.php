<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\LineasInvestigacion;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\LineasInvestigacionFormRequest;
use Illuminate\Support\Facades\Session;
use DB;

class LineasInvestigacionController extends Controller
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
            $lineas=DB::table('lineasinvestigacion as lininv')
            ->join('dominiosacademicos as dom','lininv.DOM_ID','=','dom.DOM_ID')

            ->select('lininv.LININV_ID','dom.NOMBRE as dominio','lininv.NOMBRE','lininv.DESCRIPCION','lininv.IMAGEN','lininv.VIDEO')
            ->where('lininv.NOMBRE','LIKE','%'.$query.'%')
            ->orderBy('LININV_ID', 'ASC')
            ->paginate(7);

            return view('proyectosInvestigacion/lineasInvestigacion/index',["lineas"=>$lineas,"searchText"=>$query]);


        }
    }

    public function create()
    {
        $dominios=DB::table('dominiosacademicos')->get();
        //dd($categorias);
        return view('proyectosInvestigacion/lineasInvestigacion/create',["dominios"=>$dominios]);

    }

    public function store(LineasInvestigacionFormRequest $request)
    {
        try{
        $linea = new LineasInvestigacion;
        $linea->LININV_ID=$request->get('LININV_ID');
        $linea->DOM_ID=$request->get('DOM_ID');
        $linea->NOMBRE=$request->get('NOMBRE');
        $linea->DESCRIPCION=$request->get('DESCRIPCION');
        $linea->VIDEO=$request->get('VIDEO');

        if(Input::hasFile('IMAGEN'))
        {
            $file = Input::file('IMAGEN');
            $file->move(public_path().'/imagenes/lineasInvestigacion/',$file->getClientOriginalName());
            $linea->IMAGEN = $file->getClientOriginalName();
        }
       
        $linea->save();
        Session::flash('message', $linea->NOMBRE.' fue creado satisfactoriamente.');
        return Redirect::to('proyectosInvestigacion/lineasInvestigacion');
        }catch (\Illuminate\Database\QueryException $e)
        {
            return redirect()->back()->with('alert', 'ERROR... El registro ya existe!');
        }
    }

    public function show($id)
    {
        return view ("proyectosInvestigacion/lineasInvestigacion/show",["linea"=>LineasInvestigacion::findOrFail($id)]);
    }

    public function edit($id)
    {
        $lineas = LineasInvestigacion::findOrFail($id);
        $dominios=DB::table('dominiosacademicos')->get();
        return view("proyectosInvestigacion/lineasInvestigacion/edit",["lineas"=>$lineas,"dominios"=>$dominios]);
    }

    public function update(LineasInvestigacionFormRequest $request, $id)
    {
         $linea = LineasInvestigacion::findOrFail($id);
        $linea->LININV_ID=$request->get('LININV_ID');
        $linea->DOM_ID=$request->get('DOM_ID');
        $linea->NOMBRE=$request->get('NOMBRE');
        $linea->DESCRIPCION=$request->get('DESCRIPCION');
        $linea->VIDEO=$request->get('VIDEO');

        if(Input::hasFile('IMAGEN'))
        {
            $file = Input::file('IMAGEN');
            $file->move(public_path().'/imagenes/lineasInvestigacion/',$file->getClientOriginalName());
            $linea->IMAGEN = $file->getClientOriginalName();
        }
       
        $linea->save();
        Session::flash('message', $linea->NOMBRE.' fue actualizado.');
        return Redirect::to('proyectosInvestigacion/lineasInvestigacion');
    }

    public function destroy($id)
    {
        try{
        $linea=LineasInvestigacion::findOrFail($id);
        $linea->delete();
       Session::flash('message', $linea->NOMBRE.' fue eliminado');
        return Redirect::to('proyectosInvestigacion/lineasInvestigacion');
        
        }catch (\Illuminate\Database\QueryException $e)
        {
            return redirect()->back()->with('alert', 'ERROR... Los Datos registrados dependen de otros atributos!!!');
        }
    }

}
