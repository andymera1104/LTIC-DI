<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\PublicNoProyecto;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\PublicNoProyectoFormRequest;
use Illuminate\Support\Facades\Session;
use DB;


class PublicacionesNoProyectoController extends Controller
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
            $noproyectos=DB::table('publc_no_prycts as punp')
            ->join('areasacademicas as acad','punp.AREA_ID','=','acad.AREA_ID')

            ->select('punp.PUBLNOPROY_ID','acad.NOMBRE as area','punp.TITULO','punp.ABSTRACT','punp.FECHAPUB','punp.REVISTA','punp.TIPO')
            ->where('punp.TITULO','LIKE','%'.$query.'%')
            ->orwhere('punp.REVISTA','LIKE','%'.$query.'%')
            ->orderBy('PUBLNOPROY_ID', 'ASC')
            ->paginate(7);

            return view('publicaciones/publicaciones_noproyectos/index',["noproyectos"=>$noproyectos,"searchText"=>$query]);
        }
    }

    public function create()
    {
        $areas=DB::table('areasacademicas')->get();
        //dd($categorias);
        return view('publicaciones/publicaciones_noproyectos/create',["areas"=>$areas]);

    }

    public function store(PublicNoProyectoFormRequest $request)
    {
        try{
        $noproy = new PublicNoProyecto;
        $noproy->PUBLNOPROY_ID=$request->get('PUBLNOPROY_ID');
        $noproy->AREA_ID=$request->get('AREA_ID');
        $noproy->TITULO=$request->get('TITULO');
        $noproy->ABSTRACT=$request->get('ABSTRACT');
        $noproy->FECHAPUB=$request->get('FECHAPUB');
        $noproy->REVISTA=$request->get('REVISTA');
        $noproy->TIPO=$request->get('TIPO');
        $noproy->NIVEL=$request->get('NIVEL');

        $noproy->save();
        Session::flash('message', $noproy->TITULO.' fue creado satisfactoriamente.');
        return Redirect::to('publicaciones/publicaciones_noproyectos');
        }catch (\Illuminate\Database\QueryException $e)
        {
            return redirect()->back()->with('alert', 'ERROR... El registro ya existe!');
        }
    }

    public function show($id)
    {
        return view ("publicaciones/publicaciones_noproyectos/show",["noproy"=>PublicNoProyecto::findOrFail($id)]);
    }

    public function edit($id)
    {
        $noproy = PublicNoProyecto::findOrFail($id);
        $areas=DB::table('areasacademicas')->get();
        return view("publicaciones/publicaciones_noproyectos/edit",["noproy"=>$noproy,"areas"=>$areas]);
    }

    public function update(PublicNoProyectoFormRequest $request, $id)
    {
         $noproy = PublicNoProyecto::findOrFail($id);
         $noproy->PUBLNOPROY_ID=$request->get('PUBLNOPROY_ID');
         $noproy->AREA_ID=$request->get('AREA_ID');
         $noproy->TITULO=$request->get('TITULO');
         $noproy->ABSTRACT=$request->get('ABSTRACT');
         $noproy->FECHAPUB=$request->get('FECHAPUB');
         $noproy->REVISTA=$request->get('REVISTA');
         $noproy->TIPO=$request->get('TIPO');
         $noproy->NIVEL=$request->get('NIVEL');

        $noproy->save();
        Session::flash('message', $noproy->TITULO.' fue actualizado.');
        return Redirect::to('publicaciones/publicaciones_noproyectos');
    }

    public function destroy($id)
    {
        try{
        $noproy=PublicNoProyecto::findOrFail($id);
        $noproy->delete();
       Session::flash('message', $noproy->TITULO.' fue eliminado');
        return Redirect::to('publicaciones/publicaciones_noproyectos');
        
        }catch (\Illuminate\Database\QueryException $e)
        {
            return redirect()->back()->with('alert', 'ERROR... Los Datos registrados dependen de otros atributos!!!');
        }
    }
}
