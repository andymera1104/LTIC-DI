<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\InvestigacionProyectos;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\InvestigacionProyectosFormRequest;
//use Illuminate\Support\Facades\Session;
use DB;


class InvestigacionProyectosController extends Controller
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
            $invpro=DB::table('invs_x_pryct as inpr')
            ->join('proyectoinvestigacion as prin','inpr.POST_ID','=','prin.POST_ID')
            ->join('investigador as inv','inpr.INV_ID','=','inv.INV_ID')

            ->select('inv.INV_ID as investigador','prin.POST_ID as proyecto')
            ->where('inv.NOMBRE','LIKE','%'.$query.'%')
            ->orwhere('prin.POST_ID','LIKE','%'.$query.'%')
            ->orderBy('inpr.INV_ID', 'ASC')
            ->paginate(7);

            return view('investigacionProyectos/index',["invpro"=>$invpro,"searchText"=>$query]);

        }
    }

    public function create()
    {
        $investigador=DB::table('investigador')->get();
        $proinves=DB::table('proyectoinvestigacion')->get();
        //dd($categorias);
        return view('investigacionProyectos/create',["investigador"=>$investigador,"proinves"=>$proinves ]);

    }

    public function store(InvestigacionProyectosFormRequest $request)
    {
        try{
        $invpro = new InvestigacionProyectos;
        $invpro->POST_ID=$request->get('POST_ID');
        $invpro->INV_ID=$request->get('INV_ID');
        $invpro->save();
        return Redirect::to('investigacionProyectos');
        }catch (\Illuminate\Database\QueryException $e)
        {
            return redirect()->back()->with('alert', 'ERROR... El registro ya existe!');
        }
    }

    public function show($id)
    {
        return view ("investigacionProyectos/show",["invpro"=>InvestigacionProyectos::findOrFail($id)]);
    }


    public function destroy($id)
    {
        try{
            if($invpro=InvestigacionProyectos::findOrFail($id))
            {
            $invpro->delete();
            return Redirect::to('investigacionProyectos');
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
