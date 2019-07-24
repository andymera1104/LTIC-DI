<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Grupo;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\GrupoFormRequest;
use DB;
use Illuminate\Support\Facades\Session;

class GrupoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if($request){
            $query= trim($request -> get('searchText') );
            $grupos= DB::table('grupo')->where('NOMBRE','LIKE','%'.$query.'%')
            ->orderBy('GRUP_ID','ASC')
            ->paginate(7);
            return view('investigacion/grupo/index',["grupos"=>$grupos,"searchText"=>$query]);
        }
    }

    public function create()
    {
        return view("investigacion/grupo/create");
    }

    public function store(GrupoFormRequest $request)
    {
        try{
        $grupo = new Grupo;
        $grupo->NOMBRE=$request->get('NOMBRE');
        $grupo->DESCRIPCION=$request->get('DESCRIPCION');
        $grupo->save();
        Session::flash('message', $grupo->NOMBRE.' fue creado satisfactoriamente.');
        return Redirect::to('investigacion/grupo');
        }catch (\Illuminate\Database\QueryException $e)
        {
            return redirect()->back()->with('alert', 'ERROR... El registro ya existe!');
        }
    }
    public function show($id)
    {
       return view("investigacion/grupo/show",["grupo"=>Grupo::findOrFail($id)]); 
    }
    public function edit($id)
    {
        return view("investigacion/grupo/edit",["grupo"=>Grupo::findOrFail($id)]); 
    }
    public function update(GrupoFormRequest $request, $id)
    {
        $grupo = Grupo::findOrFail($id);
        $grupo->NOMBRE=$request->get('NOMBRE');
        $grupo->DESCRIPCION=$request->get('DESCRIPCION');
        $grupo->save();
        Session::flash('message', $grupo->NOMBRE.' fue actualizado.');
        return Redirect::to('investigacion/grupo');
    }
    public function destroy($id)
    {
        try{
            if( $grupo= Grupo::findOrFail($id))
            {
            $grupo->delete();
            Session::flash('message', $grupo->NOMBRE.' fue eliminado.');
            return Redirect::to('investigacion/grupo');
            }
            else{
                return back()->with('res','Grupo no encontrado');
            }
            
        }catch (\Illuminate\Database\QueryException $e)
        {
            return redirect()->back()->with('alert', 'ERROR... Los Datos registrados dependen de otros atributos!!!');
        }
    }
}
