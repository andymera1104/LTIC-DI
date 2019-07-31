@extends('layout.home')
<!--
@section('menu-navegacion')
  <li class="nav-item mx-0 mx-lg-1 ">            
    <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger text-white " href="#" data-toggle="dropdown">
      Investigación
      <b class="caret"></b>
    </a>
    
  </li>
  <script>                                  
    $(document).ready(function(){
          document.getElementById("temporal").style.display = "none";
          $('.dropdown-toggle').dropdown();                
    });
</script>
@stop
-->
@section('content')
    <!---->
          @if ($errores!==null)
                <div class="col s12">
                  <div class="card">
                    <div class="card-content">
                      <span class="card-title">Error!</span>
                          <span class="helper-text red-text" data-error="wrong" data-success="right">{{$errores}}</span>
                              <br>
                    </div>
                  </div>
                </div>
          @endif
            <div class="row" style="display:none">             
              <div class="col-12">   
                    <br><br><br><br><br>    
                    <table id="myTable" class="table table-bordered table-striped" style="color: black;" @charset "UTF-8";>
                      <thead>
                        <tr>
                          <th colspan="5" class="white-text bg-info"><center>TABLA INVESTIGACIONES</center></th>
                        </tr>
                          <tr class="white-text bg-info">                        
                            <th><center>DOM_ID</center></th>
                            <th><center>NOMBRE</center></th>
                            <th><center>DESCRIPCION</center></th>
                            <th><center>IMAGEN</center></th>
                            <th><center>VIDEO</center></th>
                          </tr>                        
                          </thead>  
                          <tbody>
                              @if($investigacionT->count())  
                              @foreach($investigacionT as $dato)  
                              <tr>               
                                <td><center>{{$dato['DOM_ID']}}</center></td>
                                <td><center>{{$dato['NOMBRE']}}</center></td>
                                <td><center>{{$dato['DESCRIPCION']}}</center></td>
                                <td><center>{{$dato['IMAGEN']}}</center></td>
                                <td><center>{{$dato['VIDEO']}}</center></td>
                              </tr>
                              @endforeach 
                              @else
                              <tr>
                                  <td colspan="5">No hay registro !!</td>
                              </tr>
                              @endif
                          </tbody> 
                          <tfoot>
                          <tr class="white-text bg-info">
                            <td colspan="5">
                                <div class="pagination white-text">{{ $investigacionT->links() }}</div>
                            </td>
                          </tr>
                          </tfoot>        
                  </table>              
              </div>                            
            </div>
            <br>
            <br>
            <br>
            <br>
            <div class="row text-center">             
              <div class="col-12" style="margin:0%;">                 
                    <div class="expandable" style=" margin:0%;padding:0%; width:100%;max-width:100%;"><br><h3><a style="text-decoration: none; color:black;" >DOMINIOS ACADÉMICOS</a></h3><hr size="30"></div>               
                    <div class="row" style="margin:0%;padding:0%; width:100%;max-width:100%;">
                          @foreach($investigacionTT as $dato)                  
                          <div class="col-sm-12 col-md-3 col-lg-4">										
                               
                                  <div class="row" >
                                    <div class="col-12">
                                    <?php
                                          $array=$dato->NOMBRE;
                                    ?>
                                        <a href="lineasC?area=<?php echo $array;?>">
                                        <div class="col-8 float-center zoom"><img src="{{asset('imagenes/dominios/'.$dato->IMAGEN)}}" alt="{{$dato->NOMBRE }}" height="60px" width="60px" class="img-thumbnail"></div>
                                        </a>                                   
                                    </div>
                                    <div class="col-12"><br><hr>
                                      <h3 style="text-align: left;">{{ $dato->NOMBRE }}</h3>
                                    </div>											
                                    <div class="col-12" style="text-align: left;">
                                      {{ $dato->DESCRIPCION }}
                                      <br>
                                      <br>
                                    </div>				
                                    <span class="elementor-divider-separator blue"></span>
                                   
                                  </div>
                            </div>								                                                              
                                                          
                          @endforeach  
                    </div>
              </div>
            </div>                          
    <!----> <br><br>
@endsection
