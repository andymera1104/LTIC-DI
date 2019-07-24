<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Escuela;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\EscuelaFormRequest;
use DB;
use Illuminate\Support\Facades\Session;

class EscuelaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if($request){
            $query= trim($request -> get('searchText') );
            $escuelas= DB::table('escuela as esc')
            ->join('facultad as fac','esc.FAC_ID','=','fac.FAC_ID')

            ->select('esc.ESC_ID','fac.NOMBRE as facultad','esc.NOMBRE','esc.DIRECTOR','esc.TELEFONO','esc.EXTENSION')
            ->where('esc.NOMBRE','LIKE','%'.$query.'%')
            ->orwhere('esc.DIRECTOR','LIKE','%'.$query.'%')
            ->orderBy('ESC_ID','ASC')
            ->paginate(15);
            return view('escuelas/index',["escuelas"=>$escuelas,"searchText"=>$query]);
        }
    }

    public function create()
    {
        $facultades=DB::table('facultad')->get();
        return view("escuelas/create",["facultades"=>$facultades]);
    }

    public function store(EscuelaFormRequest $request)
    {
        try{
        $escuela = new Escuela;
        $escuela->ESC_ID=$request->get('ESC_ID');
        $escuela->FAC_ID=$request->get('FAC_ID');
        $escuela->NOMBRE=$request->get('NOMBRE');
        $escuela->DIRECTOR=$request->get('DIRECTOR');
        $escuela->TELEFONO=$request->get('TELEFONO');
        $escuela->EXTENSION=$request->get('EXTENSION');
        $escuela->save();
        Session::flash('message', $escuela->NOMBRE.' fue creado satisfactoriamente.');
        return Redirect::to('escuelas');
        }catch (\Illuminate\Database\QueryException $e)
        {
            return redirect()->back()->with('alert', 'ERROR... El registro ya existe!');
        }
    }
    public function show($id)
    {
       return view("escuelas/show",["escuela"=>Escuela::findOrFail($id)]); 
    }
    public function edit($id)
    {
        $escuela = Escuela::findOrFail($id);
        $facultades=DB::table('facultad')->get();
        return view("escuelas/edit",["escuela"=>$escuela,"facultades"=>$facultades]); 
    }
    public function update(EscuelaFormRequest $request, $id)
    {
        $escuela = Escuela::findOrFail($id);
        $escuela->ESC_ID=$request->get('ESC_ID');
        $escuela->FAC_ID=$request->get('FAC_ID');
        $escuela->NOMBRE=$request->get('NOMBRE');
        $escuela->DIRECTOR=$request->get('DIRECTOR');
        $escuela->TELEFONO=$request->get('TELEFONO');
        $escuela->EXTENSION=$request->get('EXTENSION');
        $escuela->save();
        Session::flash('message', $escuela->NOMBRE.' fue actualizado.');
        return Redirect::to('escuelas');
       
    }
    public function destroy($id)
    {
        try{  
            if( $escuela= Escuela::findOrFail($id))
            {
            $escuela->delete();
            Session::flash('message', $escuela->NOMBRE.' fue eliminado.');
            return Redirect::to('escuelas');
            }
            else{
                return back()->with('res','escuela no encontrado');
            }
            
        }catch (\Illuminate\Database\QueryException $e)
        {
            return redirect()->back()->with('alert', 'ERROR... Los Datos registrados dependen de otros atributos!!!');
        }
   
    }
}
