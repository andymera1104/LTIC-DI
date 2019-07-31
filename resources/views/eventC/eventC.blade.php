@extends('layout.home')

@section('content')
    <!---->
    <br><br><br><br>
    
            <div class="row text-center">
            <div class="col-12" style="margin:0%;">
            <div class="expandable" style=" margin:0%;padding:0%; width:100%;max-width:100%;"><br><h3><a style="text-decoration: none; color:black;" >EVENTOS</a></h3><hr size="30">

@foreach($eventos as $el)
                        <div class="row col-lg-12">
                            <div class="col-4 align-self-center">
                                <b><strong><h3>{{ $el -> TITULO }}</h3></strong></b>
                            </div>

                            <div class="col-3 align-self-center text-justify">
                             Inicio:    
                            <b>{{ $el -> FECHA_INICIO }}</b>
                            <br>
                            Fin: 
                            <b>{{ $el -> FECHA_FIN }}</b>
                            <br>
                            Donde: 
                            <b>{{ $el -> LUGAR }}</b>
                              
                            </div>
                            <div class="col-5 align-self-center text-justify" >
                                    
                                    <br> {{ $el -> DESCRIPCION }} <br>
                                    <br>
                            </div>

                        </div>
                        
                        <br>
                        @endforeach
@endsection
