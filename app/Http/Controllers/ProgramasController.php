<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Programas;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\ProgramasFormRequest;
use Illuminate\Support\Facades\Session;
use DB;

class ProgramasController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if($request){
            $query= trim($request -> get('searchText') );
            $programas= DB::table('programas')
            ->where('PROG_ID','LIKE','%'.$query.'%')
            ->orwhere('DESCRIPCION','LIKE','%'.$query.'%')
            ->orderBy('PROG_ID','ASC')
            ->paginate(7);
            return view('programas/index',["programas"=>$programas,"searchText"=>$query]);
        }
    }

    public function create()
    {
        return view("programas/create");
    }

    public function store(ProgramasFormRequest $request)
    {
        try{
        $programa = new Programas;
        $programa->PROG_ID=$request->get('PROG_ID');
        $programa->DESCRIPCION=$request->get('DESCRIPCION');
        
        $programa->save();
        Session::flash('message', $programa->PROG_ID.' fue creado satisfactoriamente.');
        return Redirect::to('programas');
        }catch (\Illuminate\Database\QueryException $e)
        {
            return redirect()->back()->with('alert', 'ERROR... El registro ya existe!');
        }
    }
    public function show($id)
    {
       return view("programas/show",["programa"=>Programas::findOrFail($id)]); 
    }
    public function edit($id)
    {
        return view("programas/edit",["programa"=>Programas::findOrFail($id)]); 
    }

    public function update(ProgramasFormRequest $request, $id)
    {
        $programa = Programas::findOrFail($id);
        $programa->PROG_ID=$request->get('PROG_ID');
        $programa->DESCRIPCION=$request->get('DESCRIPCION');
        
        $programa->save();
        Session::flash('message', $programa->PROG_ID.' fue actualizado.');
        return Redirect::to('programas');
    }

    public function destroy($id)
    {
        try{
        if( $programa= Programas::findOrFail($id))
        {
        $programa->delete();
        Session::flash('message', $programa->PROG_ID.' fue eliminado.');
        return Redirect::to('programas');
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
