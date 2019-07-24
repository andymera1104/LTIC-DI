<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Lineas_x_pi_postulado;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\Lineas_x_pi_postuladosFormRequest;
use Illuminate\Support\Facades\Session;
use App\Services\PayUService\Exception;
use DB;


class LineasxpipostuladosController extends Controller
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
            $linproy=DB::table('lineas_x_pi_postulado as lipro')
            ->join('lineasinvestigacion as li','lipro.LININV_ID','=','li.LININV_ID')
            ->join('pi_postulados as pp','lipro.POST_ID','=','pp.POST_ID')

            ->select('li.NOMBRE as linea','pp.POST_ID as proyecto')
            ->where('lipro.POST_ID','LIKE','%'.$query.'%')
            ->orderBy('lipro.POST_ID', 'ASC')
            ->paginate(7);

            return view('proyectosInvestigacion/lineas_x_pi_postulado/index',["linproy"=>$linproy,"searchText"=>$query]);

        }
    }

    public function create()
    {
        $lineas=DB::table('lineasinvestigacion')->get();
        $pipost=DB::table('pi_postulados')->get();
        //dd($categorias);
        return view('proyectosInvestigacion/lineas_x_pi_postulado/create',["lineas"=>$lineas,"pipost"=>$pipost ]);

    }

    public function store(Lineas_x_pi_postuladosFormRequest $request)
    {
        try{
        $lp = new Lineas_x_pi_postulado;
        $lp->LININV_ID=$request->get('LININV_ID');
        $lp->POST_ID=$request->get('POST_ID');
        $lp->save();
        return Redirect::to('proyectosInvestigacion/lineas_x_pi_postulado');
        }catch (\Illuminate\Database\QueryException $e)
        {
            return redirect()->back()->with('alert', 'ERROR... El registro ya existe!');
        }
    }

    public function show($id)
    {
        return view ("proyectosInvestigacion/lineas_x_pi_postulado/show",["lp"=>Lineas_x_pi_postulado::findOrFail($id)]);
    }

    public function edit($id)
    {
        $lp = Lineas_x_pi_postulado::findOrFail($id);
        $lineas=DB::table('lineasinvestigacion')->get();
        $pipost=DB::table('pi_postulados')->get();
        return view("proyectosInvestigacion/lineas_x_pi_postulado/edit",["lp"=>$lp,"lineas"=>$lineas,"pipost"=>$pipost]);
    }

    public function update(Lineas_x_pi_postuladosFormRequest $request, $id)
    {
         $lp = Lineas_x_pi_postulado::findOrFail($id);
         $lp->LININV_ID=$request->get('LININV_ID');
         $lp->POST_ID=$request->get('POST_ID');
         $lp->save();
        return Redirect::to('proyectosInvestigacion/lineas_x_pi_postulado');
    }
    

    public function destroy($id)
    {
        try 
        {
            if($lp=Lineas_x_pi_postulado::findOrFail($id))
            {
            $lp->delete();
            return Redirect::to('proyectosInvestigacion/lineas_x_pi_postulado');
            }
            else{
                return back()->with('res','Registro no encontrado');
            }
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
    }
    
     
}
