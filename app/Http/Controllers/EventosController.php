<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Eventos;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\EventosFormRequest;
use Illuminate\Support\Facades\Session;
use DB;

class EventosController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if($request){
            $query= trim($request -> get('searchText') );
            $eventos= DB::table('eventos')
            ->where('TITULO','LIKE','%'.$query.'%')
            ->orderBy('EVENT_ID','ASC')
            ->paginate(7);
            return view('eventos/index',["eventos"=>$eventos,"searchText"=>$query]);
        }
    }

    public function create()
    {
        return view("eventos/create");
    }

    public function store(EventosFormRequest $request)
    {
        try{
        $evento = new Eventos;
        $evento->EVENT_ID=$request->get('EVENT_ID');
        $evento->TITULO=$request->get('TITULO');
        $evento->DESCRIPCION=$request->get('DESCRIPCION');
        $evento->FECHA_INICIO=$request->get('FECHA_INICIO');
        $evento->FECHA_FIN=$request->get('FECHA_FIN');
        $evento->LUGAR=$request->get('LUGAR');
        $evento->save();
        Session::flash('message', $evento->TITULO.' fue creado satisfactoriamente.');
        return Redirect::to('eventos');
        }catch (\Illuminate\Database\QueryException $e)
        {
            return redirect()->back()->with('alert', 'ERROR... El registro ya existe!');
        }
    }
    public function show($id)
    {
       return view("eventos/show",["evento"=>Eventos::findOrFail($id)]); 
    }
    public function edit($id)
    {
        return view("eventos/edit",["evento"=>Eventos::findOrFail($id)]); 
    }

    public function update(EventosFormRequest $request, $id)
    {
        $evento = Eventos::findOrFail($id);
        $evento->EVENT_ID=$request->get('EVENT_ID');
        $evento->TITULO=$request->get('TITULO');
        $evento->DESCRIPCION=$request->get('DESCRIPCION');
        $evento->FECHA_INICIO=$request->get('FECHA_INICIO');
        $evento->FECHA_FIN=$request->get('FECHA_FIN');
        $evento->LUGAR=$request->get('LUGAR');
        $evento->save();
        Session::flash('message', $evento->TITULO.' fue actualizado.');
        return Redirect::to('eventos');
    }
    public function destroy($id)
    {
        try{  
            if( $evento= Eventos::findOrFail($id))
            {
            $evento->delete();
            Session::flash('message', $evento->TITULO.' fue eliminado.');
            return Redirect::to('eventos');
            }
            else{
                return back()->with('alert','Registro no encontrado');
            }
        
        }catch (\Illuminate\Database\QueryException $e)
        {
            return redirect()->back()->with('alert', 'ERROR... Los Datos registrados dependen de otros atributos!!!');
        }
    }
}
