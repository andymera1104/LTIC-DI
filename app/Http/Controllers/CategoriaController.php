<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Categoria;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CategoriaFormRequest;
use DB;
use Illuminate\Support\Facades\Session;

class CategoriaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if($request){
            $query= trim($request -> get('searchText') );
            $categorias= DB::table('cat_invest')->where('NIVEL','LIKE','%'.$query.'%')
            ->orderBy('CATINV_ID','ASC')
            ->paginate(7);
            return view('investigacion/categoria/index',["categorias"=>$categorias,"searchText"=>$query]);
        }
    }

    public function create()
    {
        return view("investigacion/categoria/create");
    }

    public function store(CategoriaFormRequest $request)
    {   
        try{
        $categoria = new Categoria;
        $categoria->NIVEL=$request->get('NIVEL');
        $categoria->save();
        Session::flash('message', $categoria->NIVEL.' fue creado satisfactoriamente.');
        return Redirect::to('investigacion/categoria');
        }catch (\Illuminate\Database\QueryException $e)
        {
            return redirect()->back()->with('alert', 'ERROR... El registro ya existe!');
        }
    }
    public function show($id)
    {
       return view("investigacion/categoria/show",["categoria"=>Categoria::findOrFail($id)]); 
    }
    public function edit($id)
    {
        return view("investigacion/categoria/edit",["categoria"=>Categoria::findOrFail($id)]); 
    }
    public function update(CategoriaFormRequest $request, $id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->NIVEL=$request->get('NIVEL');
        $categoria->save();
        Session::flash('message', $categoria->NIVEL.' fue actualizado.');
        return Redirect::to('investigacion/categoria');
    }
    public function destroy($id)
    {
        try{
            if( $categoria= Categoria::findOrFail($id))
            {
            $categoria->delete();
            Session::flash('message', $categoria->NIVEL.' fue eliminado.');
            return Redirect::to('investigacion/categoria');
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
