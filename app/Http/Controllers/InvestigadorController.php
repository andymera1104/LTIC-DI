<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Investigador;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\InvestigadorFormRequest;

use Illuminate\Support\Facades\Session;

use DB;

class InvestigadorController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if($request)
        {
            $query=trim($request->get('searchText'));
            $investigador=DB::table('investigador as inv')
            ->join('cat_invest as cat','inv.CATINV_ID','=','cat.CATINV_ID')
            ->join('grupo as gru','inv.GRUP_ID','=','gru.GRUP_ID')
            ->join('carrera as car','inv.CAR_ID','=','car.CAR_ID')
            ->join('escuela as esc','car.ESC_ID','=','esc.ESC_ID')
            ->join('facultad as fac','esc.FAC_ID','=','fac.FAC_ID')

            ->select('inv.INV_ID','cat.NIVEL as nivel','gru.NOMBRE as grupo','inv.NOMBRE','inv.APELLIDO','inv.URLRESEARCH','car.NOMBRE as carrera','fac.NOMBRE as facultad','inv.FOTO')
            ->where('inv.NOMBRE','LIKE','%'.$query.'%')
            ->orwhere('gru.NOMBRE','LIKE','%'.$query.'%')
            ->orderBy('INV_ID', 'asc')
            ->paginate(7);

            return view('investigacion/investigador/index',["investigador"=>$investigador,"searchText"=>$query]);


        }
    }

    public function create()
    {
        $categorias=DB::table('cat_invest')->get();
        $grupos=DB::table('grupo')->get();
        $carreras=DB::table('carrera')->get();
        //dd($categorias);
        return view('investigacion/investigador/create',["categorias"=>$categorias,"grupos"=>$grupos,"carreras"=>$carreras]);

    }

    public function store(InvestigadorFormRequest $request)
    {
        try{
        $investigador = new Investigador;
        $investigador->INV_ID=$request->get('INV_ID');
        $investigador->CATINV_ID=$request->get('CATINV_ID');
        $investigador->GRUP_ID=$request->get('GRUP_ID');
        $investigador->CAR_ID=$request->get('CAR_ID');
        $investigador->NOMBRE=$request->get('NOMBRE');
        $investigador->APELLIDO=$request->get('APELLIDO');
        $investigador->CORREOINST=$request->get('CORREOINST');
        $investigador->URLRESEARCH=$request->get('URLRESEARCH');
        $investigador->URLLINKEDIN=$request->get('URLLINKEDIN');
        $investigador->BIOGRAFIA=$request->get('BIOGRAFIA');
        $investigador->VIDEO=$request->get('VIDEO');
        $investigador->TIPO=$request->get('TIPO');

        if(Input::hasFile('FOTO'))
        {
            $file = Input::file('FOTO');
            $file->move(public_path().'/imagenes/fotos/',$file->getClientOriginalName());
            $investigador->FOTO = $file->getClientOriginalName();
        }
        $investigador->save();
        Session::flash('message', $investigador->NOMBRE.' fue creado satisfactoriamente.');
        return Redirect::to('investigacion/investigador');
        }catch (\Illuminate\Database\QueryException $e)
        {
            return redirect()->back()->with('alert', 'ERROR... El registro ya existe!');
        }
    }

    public function show($id)
    {
        return view ("investigacion/investigador/show",["investigador"=>Investigador::findOrFail($id)]);
    }

    public function edit($id)
    {
        $investigador = Investigador::findOrFail($id);
        $categorias= DB::table('cat_invest')->get();
        $grupos= DB::table('grupo')->get();
        $carreras= DB::table('carrera')->get();
        return view("investigacion/investigador/edit",["investigador"=>$investigador,"categorias"=>$categorias,"grupos"=>$grupos,"carreras"=>$carreras]);
    }

    public function update(InvestigadorFormRequest $request, $id)
    {
         $investigador = Investigador::findOrFail($id);
         $investigador->INV_ID=$request->get('INV_ID');
         $investigador->CATINV_ID=$request->get('CATINV_ID');
         $investigador->GRUP_ID=$request->get('GRUP_ID');
         $investigador->CAR_ID=$request->get('CAR_ID');
         $investigador->NOMBRE=$request->get('NOMBRE');
         $investigador->APELLIDO=$request->get('APELLIDO');
         $investigador->CORREOINST=$request->get('CORREOINST');
         $investigador->URLRESEARCH=$request->get('URLRESEARCH');
         $investigador->URLLINKEDIN=$request->get('URLLINKEDIN');
         $investigador->BIOGRAFIA=$request->get('BIOGRAFIA');
         $investigador->VIDEO=$request->get('VIDEO');
         $investigador->TIPO=$request->get('TIPO');
 
         if(Input::hasFile('FOTO'))
         {
             $file = Input::file('FOTO');
             $file->move(public_path().'/imagenes/fotos/',$file->getClientOriginalName());
             $investigador->FOTO = $file->getClientOriginalName();
         }
         $investigador ->save();
         Session::flash('message', $investigador->NOMBRE.' fue actualizado.');
         return Redirect::to('investigacion/investigador');
    }

    public function destroy($id)
    {
        try {
            $inves=Investigador::findOrFail($id);
            $inves->delete();
        Session::flash('message', $inves->NOMBRE.' fue eliminado.');
            return Redirect::to('investigacion/investigador');
        }catch (\Illuminate\Database\QueryException $e)
        {
            return redirect()->back()->with('alert', 'ERROR... Los Datos registrados dependen de otros atributos!!!');
        }
    }


}
