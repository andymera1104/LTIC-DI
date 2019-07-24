@extends('layout.home')
@section('content')
<!---->
<br><br><br>
    
    <div class="row text-center">
    <div class="col-12" style="margin:0%;">
    <div class="expandable" style=" margin:0%;padding:0%; width:100%;max-width:100%;"><br><h3><a style="text-decoration: none; color:black;" >LINEAS DE INVESTIGACION </a></h3><hr size="30">
    </div>
    </div>
    </div>


<br>
<br>
<br>
<br>

<?php 
$area=$_GET['area'];
$lineas=\DB::table('lineasinvestigacion')
->join('dominiosacademicos','dominiosacademicos.DOM_ID','=','lineasinvestigacion.DOM_ID')
->select('dominiosacademicos.NOMBRE as DNOMBRE','lineasinvestigacion.NOMBRE','lineasinvestigacion.DESCRIPCION','lineasinvestigacion.IMAGEN')
->where('dominiosacademicos.NOMBRE', '=', $area)
->get();
?>

@foreach($lineas as $el)
                        <div class="row col-lg-12">
                            <div class="col-3 align-self-center">
                            <strong> <b><H5>{{ $el -> NOMBRE }}</H5></b></strong>
                            </div>

                            <div class="col-5 align-self-center ">
                               
                                 <div class="col-8 float-center zoom">
                                    <img src="{{asset('imagenes/lineasinvestigacion/'.$el->IMAGEN)}}"  height="100px" width="100px" class="img-thumbnail">
                                 </div>
                                
                            </div>
                            <div class="col-4 align-self-center text-justify" >
                                    
                                    <br> {{ $el -> DESCRIPCION }} <br>
                            </div>

                        </div>
                        
                        <br>
                        @endforeach

@endsection
