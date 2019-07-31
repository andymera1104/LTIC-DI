@extends('layout.home')
@section('content')
<!---->
<br>
<br><br><br>
<?php 
$LineaID=$_GET['LineaID'];
$Linea=$_GET['Linea'];
$pili=\DB::table('pi_postulados')
->join('lineas_x_pi_postulado','lineas_x_pi_postulado.POST_ID','=','pi_postulados.POST_ID')
->join('proyectoinvestigacion','proyectoinvestigacion.POST_ID','=','pi_postulados.POST_ID')
->select('pi_postulados.NOMBRE','proyectoinvestigacion.DESCRIPCION','proyectoinvestigacion.IMAGEN','lineas_x_pi_postulado.LININV_ID as LI','proyectoinvestigacion.DIRECTOR')
->where('lineas_x_pi_postulado.LININV_ID', '=', $LineaID)
->get();
//echo $LineaID;
//echo $Linea;
//echo $pili;
?>
    
    <div class="row text-center">
    <div class="col-12" style="margin:0%;">
    <div class="expandable" style=" margin:0%;padding:0%; width:100%;max-width:100%;"><br><h3><a style="text-decoration: none; color:black;" >{{ $Linea }}</a></h3><hr size="30">
    </div>
    </div>
    </div>


                    @foreach($pili as $el)
                        <div class="row col-lg-12">
                                <div class="col-3 align-self-center">
                                     <b><strong><H5>{{$el -> NOMBRE}}</strong></H5></b>
                                    <?php
                                            $dir=$el -> DIRECTOR ;
                                            $invs=\DB::table('investigador')
                                            ->select('investigador.NOMBRE as nom', 'investigador.APELLIDO as ape', 'investigador.CORREOINST as cor' )
                                            ->where('investigador.INV_ID', '=', $dir)
                                            ->get();
                                        ?>
                                        Director
                                        @foreach($invs as $inv)
                                            <H6>{{ $inv -> nom }} {{ $inv -> ape }}</H6>
                                            <H6>{{ $inv -> cor }}</H6>
                                        @endforeach
                                </div>
                            <div class="col-5 align-self-center ">
                               
                                        

                                 <div class="col-8 float-center zoom">
                                    <img src="{{asset('imagenes/proyectos/'.$el->IMAGEN)}}"  height="100px" width="100px" class="img-thumbnail">
                                 </div>
                                
                            </div>
                            <div class="col-4 align-self-center text-justify" >
                                    
                                    <br> {{ $el -> DESCRIPCION }} <br>
                            </div>

                        </div>
                        
                        <br>
                    @endforeach


@endsection