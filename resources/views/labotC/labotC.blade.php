@extends('layout.home')

@section('content')
    <!---->
    <br><br><br><br>
    
            <div class="row text-center">
            <div class="col-12" style="margin:0%;">
            <div class="expandable" style=" margin:0%;padding:0%; width:100%;max-width:100%;"><br><h3><a style="text-decoration: none; color:black;" >LABORATORIOS</a></h3><hr size="30">
            </div>
            </div>
            </div>

<div class="row d-flex justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="row col-12">
                <table class="table  table-condensed table-hover">
                    <thead style=display:none>
                    <tr>
                        
                        <th>TITULO</th>
                        <th>NOTICIA</th>
                        <th>FECHA</th>
                        <th>IMAGEN</th>
                       
                    </tr>
                    </thead>
                    <div>
                        @foreach($laboratorios as $lab)
                        <div class="row col-12">
                            <!--
                            <div class="col-4 align-self-center text-center">
                            
                            </div>
                            -->
                            <div class="col-6 align-self-center">
                                
                                 <div class="col-8 float-center zoom">
                                 <img src="{{asset('imagenes/laboratorios/'.$lab->IMAGEN)}}" alt="{{$lab->laboratorios }}" height="100px" width="100px" class="img-thumbnail">    
                                 </div>
                            </div>
                            <div class="col-6 align-self-center text-justify" >
                            <strong> <b><H2>{{ $lab -> NOMBRE }}</H2></b></strong>
                            <?php
                                $array[] =$lab->NOMBRE;
                                ?>
                                    <br>
                                {{ $lab -> DESCRIPCION }}
                                <br>
                                <br>
                                {{$lab->CARRERA}}
                                   
                            </div>
                            
                                
                        </div>
                                 <br>
                                <br>
                                <br>
                                
                        @endforeach
                    </div>
                </table>
            </div>
           
        </div>
    </div>

@endsection