@extends('layout.home')

@section('content')
<br>
<!-- CAPTURO TODOS LOS DATOS DE LA LINEA DE INVESTIGACION-->
        <?php
                $linea=\DB::table('lineasinvestigacion')
                ->get();
        ?>
<!-- PRESENTACION DE CADA LINEA DE INVESTIGACIÓN-->
<br>
<br>
<br>
        @foreach($linea as $lin)
                    <!-- CAPTURA DEL ID DE LINEA DE INVESTIGACIÓN-->
                    <?php
                        $dato=$lin -> LININV_ID;
                    ?>
                    
                        <!-- PRESENTACION DE CADA LINEA DE INVESTIGACIÓN-->    
                        <div class="row text-center">
                        <div class="col-12" style="margin:0%;">
                        <div class="expandable" style=" margin:0%;padding:0%; width:100%;max-width:100%;"><br><h3><a style="text-decoration: none; color:black;" >{{ $lin -> NOMBRE }}</a></h3><hr size="30">
                        </div>
                        </div>
                        </div>    
                                <!-- CONSULTA EN LA TABLA 'lineas_x_pi_postulado', EXTRAER NOMBRE DE LINEA DE INVESTIGACION-->
                                <?php
                                     $pili=\DB::table('lineas_x_pi_postulado')
                                    ->join('pi_postulados','lineas_x_pi_postulado.POST_ID','=','pi_postulados.POST_ID')
                                    ->join('lineasinvestigacion','lineasinvestigacion.LININV_ID','=','lineas_x_pi_postulado.LININV_ID')
                                    ->select('pi_postulados.NOMBRE as NOM')
                                    ->where('lineas_x_pi_postulado.LININV_ID', '=', $dato)
                                    ->get();
                                ?>
                    <!-- PRESENTACION DE PROYECTOS POR CADA LINEA DE INVESTIGACION-->         
                    @foreach($pili as $proinvest)

                                <?php
                                    $data=$proinvest->NOM;
                                    $proy=\DB::table('proyectoinvestigacion')
                                    ->join('pi_postulados','proyectoinvestigacion.POST_ID','=','pi_postulados.POST_ID')
                                    ->select('pi_postulados.NOMBRE as nombre', 'proyectoinvestigacion.DESCRIPCION as descripcion', 'proyectoinvestigacion.IMAGEN', 'proyectoinvestigacion.DIRECTOR')
                                    ->where('pi_postulados.NOMBRE', '=', $data)
                                    ->get();
                                ?>
                                
                            @foreach($proy as $p)
                                <div class="row col-lg-12">
                                    <div class="col-3 align-self-center">
                                        <strong> <b><H4>{{ $p -> nombre }}</H4></b></strong> <br>
                                        <?php
                                            $dir=$p -> DIRECTOR ;
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
                                        <div class="col-10 float-center ">
                                            <img src="{{asset('imagenes/proyectos/'.$p->IMAGEN)}}"  height="100px" width="100px" class="img-thumbnail">
                                        </div>
                                    </div>
                                    <div class="col-4 align-self-center text-justify" >
                                    {{ $p -> descripcion }}
                                    <br>
                                    <br>
                                    </div>
                                </div>
                            @endforeach
                        
                    @endforeach
                        
                    
                        
        @endforeach
                    
@endsection
