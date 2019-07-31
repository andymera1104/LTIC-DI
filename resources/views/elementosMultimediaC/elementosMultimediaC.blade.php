@extends('layout.home')
@section('content')
    <!---->
    <br><br><br><br>
    
            <div class="row text-center">
            <div class="col-12" style="margin:0%;">
            <div class="expandable" style=" margin:0%;padding:0%; width:100%;max-width:100%;"><br><h3><a style="text-decoration: none; color:black;" >CENTROS DE INVESTIGACIÓN</a></h3><hr size="30">
           
            </div>   
            <div class="col-lg-4 col-md-8 col-sm-8 col-xs-12 float-right">
            @include ('elementosMultimediaC/search')
            </div>
              </div>
          </div>
         
          @if (session('alert'))
    <div class="alert alert-danger">
        {{ session('alert') }}
    </div>
    @endif



      <div class="row d-flex justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="row col-lg-12">
                <table class="table  table-condensed table-hover">
                    <thead style=display:none>
                    <tr>
                        
                        <th>centro</th>
                        <th>DESCRIPCION</th>
                        <th>FOTO</th>
                        <th>VIDEO</th>
                       
                    </tr>
                    </thead>
                   
                        @foreach($elementos as $el)
                        <div class="row col-lg-12">
                            <div class="col-3 align-self-center">
                                <b><strong><h3>{{ $el -> centro }}</h3></strong></b>
                            </div>

                            <div class="col-5 align-self-center ">
                              
                                 <div class="col-8 float-center  ">
                                    <img src="{{asset('imagenes/elementosMultimedia/'.$el->FOTO)}}" alt="{{$el->centro}}" height="100px" width="100px" class="img-thumbnail">
                                 </div>
                                
                                 <br>
                            </div>

                            <div class="col-1  align-self-center">
                                <a href="{{ $el -> VIDEO }}">
                                <i class="fa fa-youtube-play" style="font-size:24px;color:red"></i>
                                </a>
                            </div>

                            <div class="col-3 align-self-center text-justify" >
                                    
                                    <br> {{ $el -> DESCRIPCION }} <br>
                                    <br>
                            </div>

                        </div>
                        
                        <br>
                        @endforeach
                    
                </table>
            </div>
            {{$elementos->render()}}
        </div>
    </div>
    <br><br><br>
@endsection