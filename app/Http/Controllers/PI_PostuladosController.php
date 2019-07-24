<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\PI_Postulados;
use Illuminate\Support\Facades\Redirect;
//use Illuminate\Support\Facades\Input;
use App\Http\Requests\PI_PostuladosFormRequest;
use Illuminate\Support\Facades\Session;
use DB;

class PI_PostuladosController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if($request){
            $query= trim($request -> get('searchText') );
            $postulados= DB::table('pi_postulados')

            ->where('NOMBRE','LIKE','%'.$query.'%')
            ->orwhere('POST_ID','LIKE','%'.$query.'%')
            ->orderBy('POST_ID','ASC')
            ->paginate(10);
            return view('proyectosInvestigacion/proyectosPostulados/index',["postulados"=>$postulados,"searchText"=>$query]);
        }
    }

    public function create()
    {
        return view("proyectosInvestigacion/proyectosPostulados/create");
    }

    public function store(PI_PostuladosFormRequest $request)
    {
        try{
        $pipostulado = new PI_Postulados;
        $pipostulado->POST_ID=$request->get('POST_ID');
        $pipostulado->NOMBRE=$request->get('NOMBRE');
        $pipostulado->ESTADO=1;
        $pipostulado->save();
        Session::flash('message', $pipostulado->NOMBRE.' fue creado satisfactoriamente.');
        return Redirect::to('proyectosInvestigacion/proyectosPostulados');
        }catch (\Illuminate\Database\QueryException $e)
        {
            return redirect()->back()->with('alert', 'ERROR... El registro ya existe!');
        }
    }
    public function show($id)
    {
       return view("proyectosInvestigacion/proyectosPostulados/show",["pipostulado"=>PI_Postulados::findOrFail($id)]); 
    }
    public function edit($id)
    {
        return view("proyectosInvestigacion/proyectosPostulados/edit",["pipostulado"=>PI_Postulados::findOrFail($id)]); 
    }
    public function update(PI_PostuladosFormRequest $request, $id)
    {
        $pipostulado = PI_Postulados::findOrFail($id);
        $pipostulado->POST_ID=$request->get('POST_ID');
        $pipostulado->NOMBRE=$request->get('NOMBRE');
        //$pipostulado->ESTADO=1;
        $pipostulado->save();
        Session::flash('message', $pipostulado->NOMBRE.' fue actualizado.');
        return Redirect::to('proyectosInvestigacion/proyectosPostulados');
    }
    public function destroy($id)
    {
        try{
        if( $pipostulado= PI_Postulados::findOrFail($id))
        {
        $pipostulado->delete();
        Session::flash('message', $pipostulado->NOMBRE.' fue eliminado.');
        return Redirect::to('proyectosInvestigacion/proyectosPostulados');
        }
        else{
            alert("id no encontrado");
        }
        
        }catch (\Illuminate\Database\QueryException $e)
        {
            return redirect()->back()->with('alert', 'ERROR... Los Datos registrados dependen de otros atributos!!!');
        }
        
    }
}
