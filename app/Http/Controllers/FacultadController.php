<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Facultad;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\FacultadFormRequest;
use DB;
use Illuminate\Support\Facades\Session;

class FacultadController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if($request){
            $query= trim($request -> get('searchText') );
            $facultades= DB::table('facultad')->where('NOMBRE','LIKE','%'.$query.'%')
            ->orderBy('FAC_ID','ASC')
            ->paginate(15);
            return view('facultades/index',["facultades"=>$facultades,"searchText"=>$query]);
        }
    }

    public function create()
    {
        return view("facultades/create");
    }

    public function store(FacultadFormRequest $request)
    {
        try{
        $facultad = new Facultad;
        $facultad->FAC_ID=$request->get('FAC_ID');
        $facultad->CODIGOSEDE=$request->get('CODIGOSEDE');
        $facultad->NOMBRE=$request->get('NOMBRE');
        $facultad->SUBDECANO=$request->get('SUBDECANO');
        $facultad->DECANO=$request->get('DECANO');
        $facultad->TELEFONO=$request->get('TELEFONO');
        $facultad->EXTENSION=$request->get('EXTENSION');
        $facultad->save();
        Session::flash('message', $facultad->NOMBRE.' fue creada satisfactoriamente.');
        return Redirect::to('facultades');
        }catch (\Illuminate\Database\QueryException $e)
        {
            return redirect()->back()->with('alert', 'ERROR... El registro ya existe!');
        }
    }
    public function show($id)
    {
       return view("facultades/show",["facultad"=>Facultad::findOrFail($id)]); 
    }
    public function edit($id)
    {
        return view("facultades/edit",["facultad"=>Facultad::findOrFail($id)]); 
    }
    public function update(FacultadFormRequest $request, $id)
    {
        $facultad = Facultad::findOrFail($id);
        $facultad->FAC_ID=$request->get('FAC_ID');
        $facultad->CODIGOSEDE=$request->get('CODIGOSEDE');
        $facultad->NOMBRE=$request->get('NOMBRE');
        $facultad->SUBDECANO=$request->get('SUBDECANO');
        $facultad->DECANO=$request->get('DECANO');
        $facultad->TELEFONO=$request->get('TELEFONO');
        $facultad->EXTENSION=$request->get('EXTENSION');
        $facultad->save();
        Session::flash('message', $facultad->NOMBRE.' fue actualizado.');
        return Redirect::to('facultades');
    }
    public function destroy($id)
    {
        try{
            if( $facultad= Facultad::findOrFail($id))
            {
            $facultad->delete();
            Session::flash('message', $facultad->NOMBRE.' fue eliminado.');
            return Redirect::to('facultades');
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
