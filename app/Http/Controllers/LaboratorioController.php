<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Laboratorio;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\LaboratorioFormRequest;
use Illuminate\Support\Facades\Session;
use DB;

class LaboratorioController extends Controller
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
            $laboratorios=DB::table('laboratorio as lab')
            ->join('carrera as car','lab.CAR_ID','=','car.CAR_ID')
            ->join('centinvest as cen','lab.CENINV_ID','=','cen.CENINV_ID')

            ->select('lab.LAB_ID','car.NOMBRE as carrera','cen.NOMBRE as centro','lab.NOMBRE as laboratorio','lab.DESCRIPCION','lab.IMAGEN')
            ->where('lab.NOMBRE','LIKE','%'.$query.'%')
            ->orwhere('car.NOMBRE','LIKE','%'.$query.'%')
            ->orderBy('LAB_ID', 'asc')
            ->paginate(7);

            return view('laboratorios/index',["laboratorios"=>$laboratorios,"searchText"=>$query]);


        }
    }

    public function create()
    {
        $carreras=DB::table('carrera')->get();
        $centros=DB::table('centinvest')->get();
        
        return view('laboratorios/create',["carreras"=>$carreras,"centros"=>$centros]);

    }

    public function store(LaboratorioFormRequest $request)
    {
        try{
        $laboratorio = new Laboratorio;
        $laboratorio->LAB_ID=$request->get('LAB_ID');
        $laboratorio->CAR_ID=$request->get('CAR_ID');
        $laboratorio->CENINV_ID=$request->get('CENINV_ID');
        $laboratorio->NOMBRE=$request->get('NOMBRE');
        $laboratorio->DESCRIPCION=$request->get('DESCRIPCION');
    
        if(Input::hasFile('IMAGEN'))
        {
            $file = Input::file('IMAGEN');
            $file->move(public_path().'/imagenes/laboratorios/',$file->getClientOriginalName());
            $laboratorio->IMAGEN = $file->getClientOriginalName();
        }
        $laboratorio->save();
        Session::flash('message', $laboratorio->NOMBRE.' fue creado satisfactoriamente.');
        return Redirect::to('laboratorios');
        }catch (\Illuminate\Database\QueryException $e)
        {
            return redirect()->back()->with('alert', 'ERROR... El registro ya existe!');
        }
    }

    public function show($id)
    {
        return view ("laboratorios/show",["investigador"=>Laboratorio::findOrFail($id)]);
    }

    public function edit($id)
    {
        $laboratorio = Laboratorio::findOrFail($id);
        $carreras= DB::table('carrera')->get();
        $centros= DB::table('centinvest')->get();
       
        return view("laboratorios/edit",["laboratorio"=>$laboratorio,"centros"=>$centros,"carreras"=>$carreras]);
    }

    public function update(LaboratorioFormRequest $request, $id)
    {
        $laboratorio = Laboratorio::findOrFail($id);
        $laboratorio->LAB_ID=$request->get('LAB_ID');
        $laboratorio->CAR_ID=$request->get('CAR_ID');
        $laboratorio->CENINV_ID=$request->get('CENINV_ID');
        $laboratorio->NOMBRE=$request->get('NOMBRE');
        $laboratorio->DESCRIPCION=$request->get('DESCRIPCION');
    
        if(Input::hasFile('IMAGEN'))
        {
            $file = Input::file('IMAGEN');
            $file->move(public_path().'/imagenes/laboratorios/',$file->getClientOriginalName());
            $laboratorio->IMAGEN = $file->getClientOriginalName();
        }
        $laboratorio->save();
        Session::flash('message', $laboratorio->NOMBRE.' fue actualizado.');
        return Redirect::to('laboratorios');
    }

    public function destroy($id)
    {
        try{
        $laboratorio=Laboratorio::findOrFail($id);
        $laboratorio->delete();
       Session::flash('message', $laboratorio->NOMBRE.' fue eliminado');
        return Redirect::to('laboratorios');
        
        }catch (\Illuminate\Database\QueryException $e)
        {
            return redirect()->back()->with('alert', 'ERROR... Los Datos registrados dependen de otros atributos!!!');
        }
    }


}
