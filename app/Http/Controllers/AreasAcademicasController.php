<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\AreasAcademicas;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\AreasAcademicasFormRequest;
use Illuminate\Support\Facades\Session;
use DB;

class AreasAcademicasController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if($request){
            $query= trim($request -> get('searchText') );
            $areas= DB::table('areasacademicas')
            ->where('NOMBRE','LIKE','%'.$query.'%')
            ->orderBy('AREA_ID','ASC')
            ->paginate(7);
            return view('publicaciones/areasAcademicas/index',["areas"=>$areas,"searchText"=>$query]);
        }
    }

    public function create()
    {
        return view("publicaciones/areasAcademicas/create");
    }

    public function store(AreasAcademicasFormRequest $request)
    {
        try {
            $area = new AreasAcademicas;
            $area->AREA_ID=$request->get('AREA_ID');
            $area->NOMBRE=$request->get('NOMBRE');
            $area->DESCRIPCION=$request->get('DESCRIPCION');
            $area->VIDEO=$request->get('VIDEO');

            if(Input::hasFile('IMAGEN'))
            {
                $file = Input::file('IMAGEN');
                $file->move(public_path().'/imagenes/areas/',$file->getClientOriginalName());
                $area->IMAGEN = $file->getClientOriginalName();
            }
        
            $area->save();
            Session::flash('message', $area->NOMBRE.' fue creado satisfactoriamente.');
            return Redirect::to('publicaciones/areasAcademicas');
        }catch (\Illuminate\Database\QueryException $e)
        {
            return redirect()->back()->with('alert', 'ERROR... El registro ya existe!');
        }
    }
    public function show($id)
    {
       return view("publicaciones/areasAcademicas/show",["area"=>AreasAcademicas::findOrFail($id)]); 
    }
    public function edit($id)
    {
        return view("publicaciones/areasAcademicas/edit",["area"=>AreasAcademicas::findOrFail($id)]); 
    }

    public function update(AreasAcademicasFormRequest $request, $id)
    {
        $area = AreasAcademicas::findOrFail($id);
        $area->AREA_ID=$request->get('AREA_ID');
        $area->NOMBRE=$request->get('NOMBRE');
        $area->DESCRIPCION=$request->get('DESCRIPCION');
        $area->VIDEO=$request->get('VIDEO');

        if(Input::hasFile('IMAGEN'))
        {
            $file = Input::file('IMAGEN');
            $file->move(public_path().'/imagenes/areas/',$file->getClientOriginalName());
            $area->IMAGEN = $file->getClientOriginalName();
        }
        $area->save();
        Session::flash('message', $area->NOMBRE.' fue actualizado.');
        return Redirect::to('publicaciones/areasAcademicas');
    }
    public function destroy($id)
    {
        try {
            if( $area= AreasAcademicas::findOrFail($id))
            {
            $area->delete();
            Session::flash('message', $area->NOMBRE.' fue eliminado.');
            return Redirect::to('publicaciones/areasAcademicas');
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
