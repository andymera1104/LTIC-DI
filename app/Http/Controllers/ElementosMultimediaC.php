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

class ElementosMultimediaC extends Controller
{
    //
    public function index(Request $request)
    {
        if($request)
        {   
            $query=trim($request->get('searchText'));
            $elementos=DB::table('elmntmultimedia as elemul')
            ->join('centinvest as cent','elemul.CENINV_ID','=','cent.CENINV_ID')

            ->select('cent.NOMBRE as centro','cent.DESCRIPCION','elemul.FOTO','elemul.VIDEO')
            ->where('cent.NOMBRE','LIKE','%'.$query.'%')
            
            ->orderBy('cent.NOMBRE', 'ASC')
            ->paginate(7);

            return view('elementosMultimediaC/elementosMultimediaC',["elementos"=>$elementos,"searchText"=>$query]);


        }
    }
}
