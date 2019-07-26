<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\InvPubNoProy;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\InvPubNoProyFormRequest;
//use Illuminate\Support\Facades\Session;
use DB;


class InvPubNoProyController extends Controller
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
            $noproy=DB::table('inv_x_pub_no_pryct as ipnp')
            ->join('publc_no_prycts as pnp','ipnp.PUBLNOPROY_ID','=','pnp.PUBLNOPROY_ID')
            ->join('investigador as inv','ipnp.INV_ID','=','inv.INV_ID')

            ->select('inv.NOMBRE as investigador','pnp.PUBLNOPROY_ID as proyecto')
            ->where('inv.NOMBRE','LIKE','%'.$query.'%')
            ->orwhere('pnp.TITULO','LIKE','%'.$query.'%')
            ->orderBy('ipnp.PUBLNOPROY_ID', 'ASC')
            ->paginate(7);

            return view('invesNoProyecto/index',["noproy"=>$noproy,"searchText"=>$query]);

        }
    }

    public function create()
    {
        $investigador=DB::table('investigador')->get();
        $noproyectos=DB::table('publc_no_prycts')->get();
        //dd($categorias);
        return view('invesNoProyecto/create',["investigador"=>$investigador,"noproyectos"=>$noproyectos ]);

    }

    public function store(InvPubNoProyFormRequest $request)
    {
        try{
        $noproy = new InvPubNoProy;
        $noproy->PUBLNOPROY_ID=$request->get('PUBLNOPROY_ID');
        $noproy->INV_ID=$request->get('INV_ID');
        $noproy->save();
        return Redirect::to('publicaciones/publicaciones_noproyectos');
        }catch (\Illuminate\Database\QueryException $e)
        {
            return redirect()->back()->with('alert', 'ERROR... El registro ya existe!');
        }
    }

    public function show($id)
    {
        return view ("invesNoProyecto/show",["noproy"=>InvPubNoProy::findOrFail($id)]);
    }


    public function destroy($id)
    {   
        try{
        if($noproy=InvPubNoProy::findOrFail($id))
        {
        $noproy->delete();
        return Redirect::to('invesNoProyecto');
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
