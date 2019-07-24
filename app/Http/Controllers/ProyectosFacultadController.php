<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ProyectosFacultad;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\ProyectosFacultadFormRequest;
//use Illuminate\Support\Facades\Session;
use DB;

class ProyectosFacultadController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if($request)
        {
            $query=trim($request->get('searchText'));
            $profac=DB::table('pi_x_fac as pifac')
            ->join('proyectoinvestigacion as prin','pifac.POST_ID','=','prin.POST_ID')
            ->join('facultad as fac','pifac.FAC_ID','=','fac.FAC_ID')

            ->select('fac.FAC_ID as facultad','prin.POST_ID as proyecto')
            ->where('fac.FAC_ID','LIKE','%'.$query.'%')
            ->orwhere('prin.POST_ID','LIKE','%'.$query.'%')
            ->orderBy('pifac.FAC_ID', 'ASC')
            ->paginate(7);

            return view('proyectosFacultad/index',["profac"=>$profac,"searchText"=>$query]);

        }
    }

    public function create()
    {
        $facultad=DB::table('facultad')->get();
        $proinves=DB::table('proyectoinvestigacion')->get();
        //dd($categorias);
        return view('proyectosFacultad/create',["facultad"=>$facultad,"proinves"=>$proinves ]);

    }

    public function store(ProyectosFacultadFormRequest $request)
    {
        try{
        $profac = new ProyectosFacultad;
        $profac->POST_ID=$request->get('POST_ID');
        $profac->FAC_ID=$request->get('FAC_ID');
        $profac->save();
        return Redirect::to('proyectosFacultad');
        }catch (\Illuminate\Database\QueryException $e)
        {
            return redirect()->back()->with('alert', 'ERROR... El registro ya existe!');
        }
    }

    public function show($id)
    {
        return view ("proyectosFacultad/show",["profac"=>ProyectosFacultad::findOrFail($id)]);
    }


    public function destroy($id)
    {
        try{
        if($profac=ProyectosFacultad::findOrFail($id))
        {
        $profac->delete();
        return Redirect::to('proyectosFacultad');
        }
        else{
            return back()->with('res','Registro no encontrado');
        }
        
        }catch (\Illuminate\Database\QueryException $e)
        {
            return redirect()->back()->with('alert', 'ERROR... Los Datos registrados dependen de otros atributos!!!');
        }
    }
}
