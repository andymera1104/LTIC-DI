<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ElementosMultimedia;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\ElementosMultimediaFormRequest;
use Illuminate\Support\Facades\Session;
use DB;


class ElementosMultimediaController extends Controller
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
            $elementos=DB::table('elmntmultimedia as elemul')
            ->join('centinvest as cent','elemul.CENINV_ID','=','cent.CENINV_ID')

            ->select('elemul.ELEMMULT_ID','cent.NOMBRE as centro','elemul.FOTO','elemul.VIDEO')
            ->where('cent.CENINV_ID','LIKE','%'.$query.'%')
            ->orderBy('ELEMMULT_ID', 'ASC')
            ->paginate(7);

            return view('elementosMultimedia/index',["elementos"=>$elementos,"searchText"=>$query]);


        }
    }

    public function create()
    {
        $centros=DB::table('centinvest')->get();
        //dd($categorias);
        return view('elementosMultimedia/create',["centros"=>$centros]);

    }

    public function store(ElementosMultimediaFormRequest $request)
    {
        try{
        $elemento = new ElementosMultimedia;
        $elemento->ELEMMULT_ID=$request->get('ELEMMULT_ID');
        $elemento->CENINV_ID=$request->get('CENINV_ID');
        $elemento->VIDEO=$request->get('VIDEO');
       
        if(Input::hasFile('FOTO'))
        {
            $file = Input::file('FOTO');
            $file->move(public_path().'/imagenes/elementosMultimedia/',$file->getClientOriginalName());
            $elemento->FOTO = $file->getClientOriginalName();
        }
       
        $elemento->save();
        Session::flash('message', $elemento->ELEMMULT_ID.' fue creado satisfactoriamente.');
        return Redirect::to('elementosMultimedia');
        }catch (\Illuminate\Database\QueryException $e)
        {
            return redirect()->back()->with('alert', 'ERROR... El registro ya existe!');
        }
    }

    public function show($id)
    {
        return view ("elementosMultimedia/show",["elemento"=>ElementosMultimedia::findOrFail($id)]);
    }

    public function edit($id)
    {
        $elemento = ElementosMultimedia::findOrFail($id);
        $centros=DB::table('centinvest')->get();
        return view("elementosMultimedia/edit",["elemento"=>$elemento,"centros"=>$centros]);
    }

    public function update(ElementosMultimediaFormRequest $request, $id)
    {
         $elemento = ElementosMultimedia::findOrFail($id);
         $elemento->ELEMMULT_ID=$request->get('ELEMMULT_ID');
        $elemento->CENINV_ID=$request->get('CENINV_ID');
        $elemento->VIDEO=$request->get('VIDEO');
       
        if(Input::hasFile('FOTO'))
        {
            $file = Input::file('FOTO');
            $file->move(public_path().'/imagenes/elementosMultimedia/',$file->getClientOriginalName());
            $elemento->FOTO = $file->getClientOriginalName();
        }
       
        $elemento->save();
        Session::flash('message', $elemento->ELEMMULT_ID.' fue actualizado.');
        return Redirect::to('elementosMultimedia');
    }

    public function destroy($id)
    {
        try{
            $elemento=ElementosMultimedia::findOrFail($id);
            $elemento->delete();
            Session::flash('message', $elemento->ELEMMULT_ID.' fue eliminado.');
            return Redirect::to('elementosMultimedia');
            
        }catch (\Illuminate\Database\QueryException $e)
        {
            return redirect()->back()->with('alert', 'ERROR... Los Datos registrados dependen de otros atributos!!!');
        }
    }
}
