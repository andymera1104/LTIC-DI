<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\DominiosAcademicos;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\DominiosAcademicosFormRequest;
use Illuminate\Support\Facades\Session;
use DB;

class DominiosAcademicosController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if($request){
            $query= trim($request -> get('searchText') );
            $dominios= DB::table('dominiosacademicos')->where('NOMBRE','LIKE','%'.$query.'%')
            ->orderBy('DOM_ID','ASC')
            ->paginate(7);
            return view('proyectosInvestigacion/dominiosAcademicos/index',["dominios"=>$dominios,"searchText"=>$query]);
        }
    }

    public function create()
    {
        return view("proyectosInvestigacion/dominiosAcademicos/create");
    }

    public function store(DominiosAcademicosFormRequest $request)
    {
        try{
        $dominio = new DominiosAcademicos;
        $dominio->DOM_ID=$request->get('DOM_ID');
        $dominio->NOMBRE=$request->get('NOMBRE');
        $dominio->DESCRIPCION=$request->get('DESCRIPCION');
        $dominio->VIDEO=$request->get('VIDEO');

        if(Input::hasFile('IMAGEN'))
        {
            $file = Input::file('IMAGEN');
            $file->move(public_path().'/imagenes/dominios/',$file->getClientOriginalName());
            $domino->IMAGEN = $file->getClientOriginalName();
        }
       
        $dominio->save(); 
        Session::flash('message', $dominio->NOMBRE.' fue creado satisfactoriamente.');
        return Redirect::to('proyectosInvestigacion/dominiosAcademicos');
        }catch (\Illuminate\Database\QueryException $e)
        {
            return redirect()->back()->with('alert', 'ERROR... El registro ya existe!');
        }
    }
    public function show($id)
    {
       return view("proyectosInvestigacion/dominiosAcademicos/show",["dominio"=>DominiosAcademicos::findOrFail($id)]); 
    }
    public function edit($id)
    {
        return view("proyectosInvestigacion/dominiosAcademicos/edit",["dominio"=>DominiosAcademicos::findOrFail($id)]); 
    }
    public function update(DominiosAcademicosFormRequest $request, $id)
    {
        $dominio = DominiosAcademicos::findOrFail($id);
        $dominio->DOM_ID=$request->get('DOM_ID');
        $dominio->NOMBRE=$request->get('NOMBRE');
        $dominio->DESCRIPCION=$request->get('DESCRIPCION');
        $dominio->VIDEO=$request->get('VIDEO');

        if(Input::hasFile('IMAGEN'))
        {
            $file = Input::file('IMAGEN');
            $file->move(public_path().'/imagenes/dominios/',$file->getClientOriginalName());
            $dominio->IMAGEN = $file->getClientOriginalName();
        }
        $dominio->save();
        Session::flash('message', $dominio->NOMBRE.' fue actualizado.');
        return Redirect::to('proyectosInvestigacion/dominiosAcademicos');
    }
    public function destroy($id)
    {
        try{
            if( $dominio= DominiosAcademicos::findOrFail($id))
            {
            $dominio->delete();
            Session::flash('message', $dominio->NOMBRE.' fue eliminado.');
            return Redirect::to('proyectosInvestigacion/dominiosAcademicos');
            }
            else{
                return back()->with('res','Dominio Academico no encontrado');
            }
        
        }catch (\Illuminate\Database\QueryException $e)
        {
            return redirect()->back()->with('alert', 'ERROR... Los Datos registrados dependen de otros atributos!!!');
        }    
   
    }
}
