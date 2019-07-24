<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\CentrosInvestigacion;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\CentrosInvestigacionFormRequest;
use Illuminate\Support\Facades\Session;
use DB;


class CentrosInvestigacionController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if($request){
            $query= trim($request -> get('searchText') );
            $centros= DB::table('centinvest')
            ->where('NOMBRE','LIKE','%'.$query.'%')
            ->orderBy('CENINV_ID','ASC')
            ->paginate(7);
            return view('centrosInvestigacion/index',["centros"=>$centros,"searchText"=>$query]);
        }
    }

    public function create()
    {
        return view("centrosInvestigacion/create");
    }

    public function store(CentrosInvestigacionFormRequest $request)
    {
        try{
        $centro = new CentrosInvestigacion;
        $centro->CENINV_ID=$request->get('CENINV_ID');
        $centro->NOMBRE=$request->get('NOMBRE');
        $centro->DESCRIPCION=$request->get('DESCRIPCION');
        
        $centro->save();
        Session::flash('message', $centro->NOMBRE.' fue creado satisfactoriamente.');
        return Redirect::to('centrosInvestigacion');
        }catch (\Illuminate\Database\QueryException $e)
        {
            return redirect()->back()->with('alert', 'ERROR... El registro ya existe!');
        }
    }
    public function show($id)
    {
       return view("centrosInvestigacion/show",["centro"=>CentrosInvestigacion::findOrFail($id)]); 
    }
    public function edit($id)
    {
        return view("centrosInvestigacion/edit",["centro"=>CentrosInvestigacion::findOrFail($id)]); 
    }

    public function update(CentrosInvestigacionFormRequest $request, $id)
    {
        $centro = CentrosInvestigacion::findOrFail($id);
        $centro->CENINV_ID=$request->get('CENINV_ID');
        $centro->NOMBRE=$request->get('NOMBRE');
        $centro->DESCRIPCION=$request->get('DESCRIPCION');
        
        $centro->save();
        Session::flash('message', $centro->NOMBRE.' fue actualizado.');
        return Redirect::to('centrosInvestigacion');
    }

    public function destroy($id)
    {
        try{
            if( $centro= CentrosInvestigacion::findOrFail($id))
            {
            $centro->delete();
            Session::flash('message', $centro->NOMBRE.' fue eliminado.');
            return Redirect::to('centrosInvestigacion');
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
