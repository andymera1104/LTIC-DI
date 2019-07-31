@extends('layout.home')
@section('content')
    <!---->
    <br><br><br><br>
            <div class="row text-center">
            <div class="col-12" style="margin:0%;">
            <div class="expandable" style=" margin:0%;padding:0%; width:100%;max-width:100%;"><br><h3><a style="text-decoration: none; color:black;" >NOTICIAS</a></h3><hr size="30">
           
            </div>   
            <div class="col-lg-4 col-md-8 col-sm-8 col-xs-12 float-right">
            @include ('noticiasC/search')
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
                        @foreach($noticias as $not)
                        <div class="row col-12">
                            <!--
                            <div class="col-4 align-self-center text-center">
                            
                            </div>
                            -->
                            <div class="col-6">
                                
                                 <div class="col-8 float-center zoom">
                                    <img src="{{asset('imagenes/noticias/'.$not->IMAGEN)}}" alt="{{$not->TITULO }}" height="100px" width="100px" class="img-thumbnail">
                                   
                                 </div>
                            </div>
                            <div class="col-6 align-self-center text-justify" >
                                    <b><strong><h3>{{ $not -> TITULO }}</h3></strong></b>
                                    <br> {{ $not -> FECHA }} <br>
                                    <br>
                                {{ $not -> RESUMEN }}
                                
                            </div>
            
                        </div>
                        <br>
                        <br>
                        <br>
                        @endforeach
                    </div>
                </table>
            </div>
            
            {{$noticias->render()}}
            
        </div>
    </div>
    <br><br><br>
@endsection