@extends('layout.home')
@section('content')
<!---->
<br><br><br>
    
    <div class="row text-center">
    <div class="col-12" style="margin:0%;">
    <div class="expandable" style=" margin:0%;padding:0%; width:100%;max-width:100%;"><br><h3><a style="text-decoration: none; color:black;" >PUBLICACIONES ASOCIADAS A UN PROYECTO</a></h3><hr size="30">
    </div>
    </div>
    </div>


<br>
<br>
<br>
<br>

<?php 
$area=$_GET['area'];
$publicaciones=\DB::table('publicaciones')
->join('areasacademicas','areasacademicas.AREA_ID','=','publicaciones.AREA_ID')
->join('pi_postulados','pi_postulados.POST_ID','=','publicaciones.POST_ID')
->select('pi_postulados.NOMBRE as PINOMBRE','areasacademicas.NOMBRE','publicaciones.TITULO','publicaciones.ABSTRACT','publicaciones.FECHAPUB','publicaciones.REVISTA')
->where('areasacademicas.NOMBRE', '=', $area)
->get();
?>


@foreach($publicaciones as $el)
                        <div class="row col-lg-12">
                            <div class="col-4 align-self-center">
                                <strong> <b><H2>{{ $el -> TITULO }}</H2></b></strong>
                                
                            </div>
                            <div class="col-2 align-self-center text-justify"">
                                
                                <br>{{ $el -> REVISTA }} <br>
                                <br> {{ $el -> FECHAPUB }} <br>
                            </div>
                            <div class="col-4 align-self-center text-justify"">
                                <b>{{ $el -> ABSTRACT }}</b>
                            </div>
                            <div class="col-2 align-self-center text-justify" >
                                    
                                    <br> {{ $el -> PINOMBRE }} <br>
                                    <br>
                            </div>

                        </div>
                        
                        <br>
                        @endforeach

                        <div class="row text-center">
    <div class="col-12" style="margin:0%;">
    <div class="expandable" style=" margin:0%;padding:0%; width:100%;max-width:100%;"><br><h3><a style="text-decoration: none; color:black;" >PUBLICACIONES INDEPENDIENTES</a></h3><hr size="30">
    </div>
    </div>
    </div>

<!-- otra seccion-->

<?php 
$publnopry=\DB::table('publc_no_prycts')
->join('areasacademicas','areasacademicas.AREA_ID','=','publc_no_prycts.AREA_ID')
->select('areasacademicas.NOMBRE','publc_no_prycts.TITULO','publc_no_prycts.ABSTRACT','publc_no_prycts.FECHAPUB','publc_no_prycts.REVISTA')
->where('areasacademicas.NOMBRE', '=', $area)
->get();
?>

@foreach($publnopry as $el)
                        <div class="row col-lg-12">
                            <div class="col-4 align-self-center">
                                <strong> <b><H2>{{ $el -> TITULO }}</H2></b></strong>
                            </div>
                            <div class="col-4 align-self-center text-justify"">
                                
                                <br>{{ $el -> REVISTA }} <br>
                                <br> {{ $el -> FECHAPUB }} <br>
                            </div>
                            <div class="col-4 align-self-center text-justify"">
                                <b>{{ $el -> ABSTRACT }}</b>
                            </div>
                            

                        </div>
                        
                        <br>
                        @endforeach



                       
@endsection
