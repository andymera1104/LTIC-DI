<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\LaboratorioProyecto;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\LaboratorioProyectoFormRequest;
use Illuminate\Support\Facades\Session;
use DB;


class LaboratorioProyectoController extends Controller
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
            $labproinv=DB::table('lab_x_pi as labpi')
            ->join('proyectoinvestigacion as prin','labpi.POST_ID','=','prin.POST_ID')
            ->join('laboratorio as lab','labpi.LAB_ID','=','lab.LAB_ID')

            ->select('lab.LAB_ID as laboratorio','prin.POST_ID as proyecto')
            ->where('lab.LAB_ID','LIKE','%'.$query.'%')
            ->orwhere('prin.POST_ID','LIKE','%'.$query.'%')
            ->orderBy('labpi.LAB_ID', 'ASC')
            ->paginate(7);

            return view('laboratoriosProyectos/index',["labproinv"=>$labproinv,"searchText"=>$query]);

        }
    }

    public function create()
    {
        $laboratorio=DB::table('laboratorio')->get();
        $proinves=DB::table('proyectoinvestigacion')->get();
        //dd($categorias);
        return view('laboratoriosProyectos/create',["laboratorio"=>$laboratorio,"proinves"=>$proinves ]);

    }

    public function store(LaboratorioProyectoFormRequest $request)
    {
        try{
        $labproinv = new LaboratorioProyecto;
        $labproinv->POST_ID=$request->get('POST_ID');
        $labproinv->LAB_ID=$request->get('LAB_ID');
        $labproinv->save();
        Session::flash('message', $labproinv->POST_ID.' fue creado satisfactoriamente.');
        return Redirect::to('laboratoriosProyectos');
        }catch (\Illuminate\Database\QueryException $e)
        {
            return redirect()->back()->with('alert', 'ERROR... El registro ya existe!');
        }
    }

    public function show($id)
    {
        return view ("laboratoriosProyectos/show",["labproinv"=>LaboratorioProyecto::findOrFail($id)]);
    }


    public function destroy($id)
    {
        try{
            if($labproinv=LaboratorioProyecto::findOrFail($id))
            {
            $labproinv->delete();
            Session::flash('message', $labproinv->POST_ID.' fue eliminado.');
            return Redirect::to('laboratoriosProyectos');
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
