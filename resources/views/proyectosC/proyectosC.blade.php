@extends('layout.home')

@section('content')
    <!---->
    <br><br><br>
    
            <div class="row text-center">
            <div class="col-12" style="margin:0%;">
            <div class="expandable" style=" margin:0%;padding:0%; width:100%;max-width:100%;"><br><h3><a style="text-decoration: none; color:black;" >NUESTROS PROYECTOS</a></h3><hr size="30">

<?php
$proyectos=\DB::table('proyectoinvestigacion')
->join('pi_postulados','pi_postulados.POST_ID','=','proyectoinvestigacion.POST_ID')
->select('pi_postulados.NOMBRE','proyectoinvestigacion.DESCRIPCION','proyectoinvestigacion.IMAGEN')
->get();
?>

@foreach($proyectos as $el)
                        <div class="row col-lg-12">
                            <div class="col-3 align-self-center text-justify">
                            <strong> <b><H5>{{ $el -> NOMBRE }}</H5></b></strong>
                                
                            </div>

                            <div class="col-5 align-self-center ">
                                
                                 <div class="col-8 float-center zoom">
                                    <img src="{{asset('imagenes/proyectos/'.$el->IMAGEN)}}" alt="{{$el->NOMBRE}}" height="100px" width="100px" class="img-thumbnail">
                                 </div>
                              
                            </div>
                            <div class="col-4 align-self-center text-justify" >
                                    
                                    <br> {{ $el -> DESCRIPCION }} <br>
                                    <br>
                            </div>

                        </div>
                        
                        <br>
                        @endforeach
@endsection
