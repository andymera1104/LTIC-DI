@extends('layout.home')

@section('content')
    <!---->
    <br><br><br>
    
            <div class="row text-center">
            <div class="col-12" style="margin:0%;">
            <div class="expandable" style=" margin:0%;padding:0%; width:100%;max-width:100%;"><br><h3><a style="text-decoration: none; color:black;" >NUESTROS PROYECTOS</a></h3><hr size="30">

<?php
//$proyectos=\DB::table('proyectoinvestigacion')
//->join('pi_postulados','pi_postulados.POST_ID','=','proyectoinvestigacion.POST_ID')
//->select('pi_postulados.NOMBRE','proyectoinvestigacion.DESCRIPCION','proyectoinvestigacion.IMAGEN')
//->get();
?>

@foreach($eventos as $el)
                        <div class="row col-lg-12">
                            <div class="col-4 align-self-center">
                                <b>{{ $el -> TITULO }}</b>
                            </div>

                            <div class="col-4 ">
                             Inicio:    
                            <b>{{ $el -> FECHA_INICIO }}</b>
                            <br>
                            Fin: 
                            <b>{{ $el -> FECHA_FIN }}</b>
                            <br>
                            Donde: 
                            <b>{{ $el -> LUGAR }}</b>
                              
                            </div>
                            <div class="col-4 align-self-center text-justify" >
                                    
                                    <br> {{ $el -> DESCRIPCION }} <br>
                                    <br>
                            </div>

                        </div>
                        
                        <br>
                        @endforeach
@endsection
