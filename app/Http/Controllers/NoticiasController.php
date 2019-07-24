<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Noticias;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\NoticiasFormRequest;
use Illuminate\Support\Facades\Session;
use DB;

class NoticiasController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if($request){
            $query= trim($request -> get('searchText') );
            $noticias= DB::table('noticias')
            ->where('TITULO','LIKE','%'.$query.'%')
            ->orderBy('NOT_ID','ASC')
            ->paginate(7);
            return view('noticias/index',["noticias"=>$noticias,"searchText"=>$query]);
        }
    }

    public function create()
    {
        return view("noticias/create");
    }

    public function store(NoticiasFormRequest $request)
    {
        try{
        $noticia = new Noticias;
        $noticia->NOT_ID=$request->get('NOT_ID');
        $noticia->TITULO=$request->get('TITULO');
        $noticia->RESUMEN=$request->get('RESUMEN');

        if(Input::hasFile('IMAGEN'))
        {
            $file = Input::file('IMAGEN');
            $file->move(public_path().'/imagenes/noticias/',$file->getClientOriginalName());
            $noticia->IMAGEN = $file->getClientOriginalName();
        }

        $noticia->NOTICIA=$request->get('NOTICIA');
        $noticia->FECHA=$request->get('FECHA');
        $noticia->save();
        Session::flash('message', $noticia->TITULO.' fue creado satisfactoriamente.');
        return Redirect::to('noticias');
        }catch (\Illuminate\Database\QueryException $e)
        {
            return redirect()->back()->with('alert', 'ERROR... El registro ya existe!');
        }
    }
    public function show($id)
    {
       return view("noticias/show",["noticia"=>Noticias::findOrFail($id)]); 
    }
    public function edit($id)
    {
        return view("noticias/edit",["noticia"=>Noticias::findOrFail($id)]); 
    }

    public function update(NoticiasFormRequest $request, $id)
    {
        $noticia = Noticias::findOrFail($id);
        $noticia->NOT_ID=$request->get('NOT_ID');
        $noticia->TITULO=$request->get('TITULO');
        $noticia->RESUMEN=$request->get('RESUMEN');

        if(Input::hasFile('IMAGEN'))
        {
            $file = Input::file('IMAGEN');
            $file->move(public_path().'/imagenes/noticias/',$file->getClientOriginalName());
            $noticia->IMAGEN = $file->getClientOriginalName();
        }

        $noticia->NOTICIA=$request->get('NOTICIA');
        $noticia->FECHA=$request->get('FECHA');
        $noticia->save();
        Session::flash('message', $noticia->TITULO.' fue actualizado.');
        return Redirect::to('noticias');
    }
    public function destroy($id)
    {
        try{
        if( $noticia= Noticias::findOrFail($id))
        {
        $noticia->delete();
        Session::flash('message', $noticia->TITULO.' fue eliminado.');
        return Redirect::to('noticias');
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
