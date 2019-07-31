@extends('layout.home')
@section('content')
    <!--
    <br>
            <div class="col-lg-4 col-md-8 col-sm-8 col-xs-12 float-right">
            @include ('investigacionC/search')
            </div>
            <br><br><br>
    -->
       <br><br><br> <br><br>    
<!-- CAPTURO TODOS LOS DATOS DE LA LINEA DE INVESTIGACION-->
        <?php
            $linea=\DB::table('lineasinvestigacion')
            ->get();
            //echo $linea;
        ?>
        @foreach($linea as $lin)

            <div class="row text-center">
            <div class="col-12" style="margin:0%;">
            <div class="expandable" style=" margin:0%;padding:0%; width:100%;max-width:100%;"><br><h3><a style="text-decoration: none; color:black;" href="#publicaciones">{{ $lin -> NOMBRE }}</a></h3><hr size="30">
            </div>   
            </div>
            </div>
            <br>
            <br>
            <br>
                    <?php
                        $dato=$lin -> LININV_ID;
                    ?>
                    <?php
                        $CI=\DB::table('lineas_x_pi_postulado')
                        ->join('invs_x_pryct','lineas_x_pi_postulado.POST_ID','=','invs_x_pryct.POST_ID')
                        ->select('invs_x_pryct.INV_ID as NOM')
                        ->where('lineas_x_pi_postulado.LININV_ID', '=', $dato)
                        ->get();
                        //echo $CI;
                    ?> 



                    @foreach($CI as $ci)
                        <?php
                            $data= $ci -> NOM 
                        ?>

                        <?php
                            
                            $INV=\DB::table('investigador')
                            ->select('investigador.NOMBRE as nombre','investigador.APELLIDO as apellido','investigador.CORREOINST as correo','investigador.FOTO','investigador.BIOGRAFIA')
                            ->where('investigador.INV_ID', '=', $data)
                            ->get();
                        ?>

                <div>
                        @foreach($INV as $inv) 
                        <div class="row col-12">
                            <!--
                            <div class="col-4 align-self-center text-center">
                            
                            </div>
                            -->
                            <div class="col-6">
                                
                                 <div class="col-4 float-center zoom">
                                 <img src="{{asset('imagenes/fotos/'.$inv->FOTO)}}" alt="{{$inv->nombre }}" width="304" height="236" class="img-thumbnail"> 
                                   
                                 </div>
                            </div>
                            <div class="col-6 align-self-center text-justify" >
                            <h3 style="text-align: left;">{{ $inv -> nombre }}&nbsp {{ $inv -> apellido }}</h3>
                            <h5>{{ $inv -> correo }}</h5>
                                                
                                                    <br>
                                                    {{$inv->BIOGRAFIA}}
                            </div>
                            <span class="elementor-divider-separator blue"></span>   
                                                               
                        </div>
                        <br>
                        @endforeach
                </div>
   
                    @endforeach
        @endforeach      
@endsection