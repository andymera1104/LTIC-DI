@extends('layout.home')
@section('content')
<!---->
<br><br><br><br>
    
    <div class="row text-center">
    <div class="col-12" style="margin:0%;">
    <div class="expandable" style=" margin:0%;padding:0%; width:100%;max-width:100%;"><br><h3><a style="text-decoration: none; color:black;" >PUBLICACIONES ASOCIADAS A UN PROYECTO</a></h3><hr size="30">
    </div>
    </div>
    </div>


<?php 
$area=$_GET['area'];
$publicaciones=\DB::table('publicaciones')
->join('areasacademicas','areasacademicas.AREA_ID','=','publicaciones.AREA_ID')
->join('pi_postulados','pi_postulados.POST_ID','=','publicaciones.POST_ID')
->select('pi_postulados.NOMBRE as PINOMBRE','areasacademicas.NOMBRE','publicaciones.TITULO','publicaciones.ABSTRACT','publicaciones.FECHAPUB','publicaciones.REVISTA','publicaciones.POST_ID')
->where('areasacademicas.NOMBRE', '=', $area)
->get();
?>


@foreach($publicaciones as $el)
                        <div class="row col-lg-12">
                            <div class="col-4 align-self-center">
                                <strong> <b><H2>{{ $el -> TITULO }}</H2></b></strong>
                                
                                <?php 
                                $data=$el -> POST_ID ;
                                $autor=\DB::table('invs_x_pryct')
                                ->join('pi_x_fac','pi_x_fac.POST_ID','=','invs_x_pryct.POST_ID')
                                ->join('investigador','investigador.INV_ID','=','invs_x_pryct.INV_ID')
                                ->select('investigador.NOMBRE','investigador.APELLIDO')
                                ->where('pi_x_fac.POST_ID', '=', $data)
                                ->get();
                                //echo $autor;
                                ?> 
                                    
                                    <div class="col-12 align-self-center">
                                        @foreach ($autor as $aut)
                                            <strong> <b><H6>{{ $aut -> NOMBRE }} {{ $aut -> APELLIDO }}</H6></b></strong>
                                        @endforeach
                                    </div>




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
//echo  $publnopry;
?>

@foreach($publnopry as $el)
                        <div class="row col-lg-12">
                            <div class="col-4 align-self-center">
                                <strong> <b><H2>{{ $el -> TITULO }}</H2></b></strong>
                            
                            
                                <?php 
                                $data=$el -> TITULO ;
                                $autor=\DB::table('inv_x_pub_no_pryct')
                                ->join('publc_no_prycts','inv_x_pub_no_pryct.PUBLNOPROY_ID','=','publc_no_prycts.PUBLNOPROY_ID')
                                ->join('investigador','investigador.INV_ID','=','inv_x_pub_no_pryct.INV_ID')
                                ->select('investigador.NOMBRE','investigador.APELLIDO')
                                ->where('publc_no_prycts.TITULO', '=', $data)
                                ->get();
                                //echo $autor;
                                ?> 
                                    
                                    <div class="col-12 align-self-center">
                                        @foreach ($autor as $aut)
                                            <strong> <b><H6>{{ $aut -> NOMBRE }} {{ $aut -> APELLIDO }}</H6></b></strong>
                                        @endforeach
                                    </div>
                                    

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