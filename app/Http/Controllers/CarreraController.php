<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Carrera;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CarreraFormRequest;
use DB;
use Illuminate\Support\Facades\Session;

class CarreraController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if($request){
            $query= trim($request -> get('searchText') );
            $carreras= DB::table('carrera as car')
            ->join ('escuela as esc','car.ESC_ID','=','esc.ESC_ID')
            ->join('facultad as fac','esc.FAC_ID','=','fac.FAC_ID')

            ->select('car.CAR_ID','esc.NOMBRE as escuela','car.NOMBRE','car.COORDINADOR','car.TELEFONO','car.EXTENSION')
            ->where('car.NOMBRE','LIKE','%'.$query.'%')
            ->orwhere('car.COORDINADOR','LIKE','%'.$query.'%')
            ->orderBy('CAR_ID','ASC')
            ->paginate(15);
            return view('carreras/index',["carreras"=>$carreras,"searchText"=>$query]);
        }
    }

    public function create()
    {
        $escuelas=DB::table('escuela')->get();
        return view("carreras/create",["escuelas"=>$escuelas]);
    }

    public function store(CarreraFormRequest $request)
    {   
        try{
        $carrera = new Carrera;
        $carrera->CAR_ID=$request->get('CAR_ID');
        $carrera->ESC_ID=$request->get('ESC_ID');
        $carrera->NOMBRE=$request->get('NOMBRE');
        $carrera->COORDINADOR=$request->get('COORDINADOR');
        $carrera->TELEFONO=$request->get('TELEFONO');
        $carrera->EXTENSION=$request->get('EXTENSION');
        $carrera->save();
        Session::flash('message', $carrera->NOMBRE.' fue creado satisfactoriamente.');
        return Redirect::to('carreras');
        }catch (\Illuminate\Database\QueryException $e)
        {
            return redirect()->back()->with('alert', 'ERROR... El registro ya existe!');
        }
    }
    public function show($id)
    {
       return view("carreras/show",["carrera"=>Carrera::findOrFail($id)]); 
    }
    public function edit($id)
    {
        $carrera = Carrera::findOrFail($id);
        $escuelas=DB::table('escuela')->get();
        return view("carreras/edit",["carrera"=>$carrera,"escuelas"=>$escuelas]); 
    }
    public function update(CarreraFormRequest $request, $id)
    {
        $carrera = Carrera::findOrFail($id);
        $carrera->CAR_ID=$request->get('CAR_ID');
        $carrera->ESC_ID=$request->get('ESC_ID');
        $carrera->NOMBRE=$request->get('NOMBRE');
        $carrera->COORDINADOR=$request->get('COORDINADOR');
        $carrera->TELEFONO=$request->get('TELEFONO');
        $carrera->EXTENSION=$request->get('EXTENSION');
        $carrera->save();
        Session::flash('message', $carrera->NOMBRE.' fue actualizado.');
        return Redirect::to('carreras');
       
    }
    public function destroy($id)
    {    
        try {

            if( $carrera= Carrera::findOrFail($id))
                {
                $carrera->delete();
                Session::flash('message', $carrera->NOMBRE.' fue eliminado.');
                return Redirect::to('carreras');
                }
            else{
                    return back()->with('res','Carrera no encontrado');
                }

        }catch (\Illuminate\Database\QueryException $e)
        {
            return redirect()->back()->with('alert', 'ERROR... Los Datos registrados dependen de otros atributos!!!');
        }
   
    }
}
