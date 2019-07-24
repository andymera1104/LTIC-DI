@extends('layout.home')
@section('content')
    <!---->
    <br><br><br>
    
            <div class="row text-center">
            <div class="col-12" style="margin:0%;">
            <div class="expandable" style=" margin:0%;padding:0%; width:100%;max-width:100%;"><br><h3><a style="text-decoration: none; color:black;" href="#publicaciones">LABORATORIOS</a></h3><hr size="30">
           
            </div>   
            <div class="col-lg-4 col-md-8 col-sm-8 col-xs-12 float-right">
            @include ('laboratoriosC/search')
            </div>
              </div>
          </div>

      <div class="row d-flex justify-content-center">
        <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive float-center">
                <table class="table  table-condensed table-hover">
                    <thead style=display:none>
                    <tr>
                        
                        <th>carrera</th>
                        <th>centro</th>
                        <th>laboratorio</th>
                        <th>DESCRIPCION</th>
                        <th>IMAGEN</th>
                       
                    </tr>
                    </thead>
                    <div class="row col-12 ">
                        @foreach($laboratorios as $labo)
                            
                            <div class="row col-6 ">
                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <div class="col-lg-6 float-center zoom "><img src="{{asset('imagenes/laboratorios/'.$labo->IMAGEN)}}" alt="{{$labo->laboratorio }}" width="304" height="236" class="img-thumbnail"> 
                                        <br> <br> 
                                            {{ $labo -> laboratorio }} <br> {{ $labo -> centro }} <br>{{ $labo -> carrera }} <br>{{ $labo -> DESCRIPCION }}</p>  <br><br>
                                        </div>
                            </div>
                            </div>

                     
                        @endforeach
                    </div>
                </table>
            </div>
            {{$laboratorios->render()}}
        </div>
    </div>
    <br><br><br>
@endsection