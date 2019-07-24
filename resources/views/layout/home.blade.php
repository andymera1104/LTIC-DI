<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html;">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->	
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	  <!-- Font Awesome -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
		<!-- Bootstrap core CSS -->
		<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
		<!-- Jose CSS -->
		<link rel="stylesheet" type="text/css" href="{{asset('css/stylez.css')}}" media="screen" />
		<!-- Glyphicon CSS -->
		<link rel="stylesheet" type="text/css" href="{{asset('css/glyphicon.css')}}" media="screen" />
		<!-- Material Design Bootstrap -->
		<link href="{{asset('css/mdb.min.css')}}" rel="stylesheet">
		<!-- Ekko -->
		<link href="{{asset('css/ekko-lightbox.css')}}" rel="stylesheet">		
    <!-- Datatables -->
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <script src="{{asset('js/scripts.js')}}"></script>     
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>PUCE INVESTIGA</title>
  </head>
  <body id="exit2" style="width:100%;max-width:100%;margin: 0%; padding:0%">
  <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" style="background-color: #4CBFDC!important;" role="navigation">
      <a class="navbar-brand js-scroll-trigger" style="width: 15%; margin-left: 75px;" href="https://www.puce.edu.ec/"><img src="{{asset('imagenes/logo-puce-header-150dpi-blank.png')}}" style="width: 100%; padding:10px" /></a>
			<div class="container">
				
				<button id="exit" style="background-color: #4CBFDC!important;" class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				Menu
				<i class="fas fa-bars"></i>
				</button>
				<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					
					<li class="nav-item mx-0 mx-lg-1">
						<a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger text-white" href="{{ route('publicacionC.index') }}">Publicaciones</a>
					</li>
          
					<li  class="nav-item mx-0 mx-lg-1">
						<a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger text-white" href="{{ route('investigacionC.index') }}">Investigación</a>              
          </li>
					<li class="nav-item mx-0 mx-lg-1">
						 <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger text-white" href="{{url('proyectosC')}}">Proyectos</a>
					</li>
          <li class="nav-item mx-0 mx-lg-1">
             <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger text-white" href="{{url('eventC')}}" >Eventos</a>
          </li>
          <li  class="nav-item mx-0 mx-lg-1">
             <a  class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger text-white" href="{{url('noticiasC')}}" >Noticias</a>
          </li>
          <li  class="nav-item mx-0 mx-lg-1">
             <a  class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger text-white" href="{{url('elementosMultimediaC')}}">Centros</a>
          </li>
          <li  class="nav-item mx-0 mx-lg-1">
             <a  class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger text-white" href="{{url('labotC')}}">Laboratorios</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
						<a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger text-white" href="{{ url('/') }}"><i class="fa fa-home" aria-hidden="true"></i></a>
					</li>
				</ul>
				</div>
			</div>      
		</nav>
    <section class="text-center" style="width:100%;max-width:100%;">
      <!--Inicio del Contenido del Cuerpo-->
      @yield('content')
      <!--Fin del Contenido del Cuerpo-->
      <!-- Footer -->
      <footer class="page-footer font-small white" style="border-top: solid rgba(172, 171, 171, 0.507) 4px;width:100%;max-width:100%;padding-top: 0%;">

      <!-- Footer Elements -->
      <div class="container" style="width:100%;max-width:100%;padding: 0%;">
        <center>
        <!-- Grid row-->			
        <div class="row text-center" style="width:100%;max-width:100%;">
            <div class="col-md-2 text-center">
                <div class="mb-5 flex-center">
                    <div class="img-hover-zoom1 img-hover-zoom--slowmo1" style="width:100%;max-width:100%;transform: scale(1.1);">
                        <img class="center-block"src="{{asset('imagenes/logo-puce.jpg')}} " style="width: 100%;"/>											
                      </div>								
                </div>
            </div>
          <!-- Grid column -->
          <div class="col-md-4">
            <div class="mb-5 flex-center">
                <table class="table">
                    <tbody>
                      <tr>
                        <th>
                            <div class="col-12" style="color:black;">
                                <h6 style="padding:none;margin:none;">Av. 12 de Octubre 1076 y Roca| Apartado postal 17-01-2184| Quito, Ecuador</h6>	
                                <h6 style="padding:none;margin:none;"> Teléfonos: (593) 02 2991 700</h6>														
                            </div>	
                        </th>
                      </tr>
                      <tr>
                        <th>
                            <div class="col-12" style="color:black;">
                              <a id="subrayado" href="{{url('investigacionC/investigadoresC')}}"><u style="text-decoration-color: #4CBFDC!important;"><font size='3'>Investigadores</font></u></a>
                              <a id="subrayado" href="{{url('contacto')}}"><u style="text-decoration-color: #4CBFDC!important;"><font size='3'>Contáctanos</font></u></a>
                            </div>
                        </th>
                      </tr>
                      <tr>
                      <th>
                            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
                            <div class="col-12">
                                <!-- Facebook -->
                                <a class="fb-ic"  href="https://www.facebook.com/pontificiauniversidadcatolicadelecuador/">
                                    <i class="fab fa-facebook-f fa-lg light-blue-text mr-md-3 mr-1 fa-2x"> </i>
                                  </a>
                                  <!-- Twitter -->
                                  <a class="tw-ic" href="https://twitter.com/PUCE_Ecuador">
                                    <i class="fab fa-twitter fa-lg light-blue-text mr-md-3 mr-1 fa-2x"> </i>
                                  </a>
                                  <!--Linkedin -->
                                  <a class="li-ic" href="https://www.linkedin.com/school/pontificia-universidad-cat-lica-del-ecuador">
                                    <i class="fab fa-linkedin-in fa-lg light-blue-text mr-md-3 mr-1 fa-2x"> </i>
                                  </a>
                                  <!--Instagram-->
                                  <a class="ins-ic" href="https://www.instagram.com/puce_ecuador"> 
                                    <i class="fab fa-instagram fa-lg light-blue-text mr-md-3 mr-1 fa-2x"> </i>
                                  </a>
                                  
                                  
                          </div>
                        </th>
                      </tr>
                    </tbody>
                  </table>
            
            </div>
          </div>
            <div class="col-md-2">
              <div class="mb-5 flex-center" style="text-align: left;">
                <div class="col-12">					
                    <div class="vl flex-center">
                        <ul style="color:white; text-align: left;">
                            <li><a  id="subrayado" href="{{url('eventC')}}" style="color:black;text-align: left;"><font size='3'>Eventos</font></a></li>
                            <li><a  id="subrayado" href="{{url('noticiasC')}}"style="color:black;text-align: left;"><font size='3'>Noticias</font></a></li>
                          </ul>
                    </div>											
                </div>
              </div>
            </div>
            <div class="col-md-2">
                <div class="mb-5 flex-center" style="text-align: left;">									
                    <div class="col-12">					
                        <div class="vl flex-center" >
                            <ul style="color:white; text-align: left;">
                                <li><a  id="subrayado" href="{{url('elementosMultimediaC')}}" style="color:black;text-align: left;"> <font size='3'>Centros de Investigación </font></a></li>
                                <li><a  id="subrayado" href="{{url('labotC')}}" style="color:black;text-align: left;"> <font size='3'>Laboratorios</font></a></li>
                            </ul>
                        </div>											
                    </div>
                </div>
              </div>
              <div class="col-md-2 text-center">
                  <div class="mb-5 flex-center">
                      <table class="table2">
                          <tbody>
                            <tr>
                              <th>
                              © Laboratorio de Tecnologías de la Información y Comunicación LTIC- PUCE
                              </th>
                            </tr>
                          </tbody>
                        </table>
                        
                  </div>
                </div>
        </div>
        <!-- Grid row-->

      </div>
      <!-- Footer Elements -->

      <!-- Copyright -->
      <div class="footer-copyright text-center py-3" style="color:black;">2019​ ®Todos los derechos reservados 
        <a href="https://www.puce.edu.ec/" style="color:black;"> LTIC</a>
      </div>
      <!-- Copyright -->

      </footer>
      <!-- Footer -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
      <script src="{{asset('js/jquery.min.js')}}"></script>
      <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
      <!-- Bootstrap tooltips -->
      <script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
      <!-- Bootstrap core JavaScript -->
      <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>		
      <!-- MDB core JavaScript -->
      <script type="text/javascript" src="{{asset('js/mdb.min.js')}}"></script>
      <!-- MDB Lightbox JavaScript -->
      <script type="text/javascript" src="{{asset('js/ekko-lightbox.js')}}"></script>
      <!-- MDB Lightbox Map JavaScript -->
      <script type="text/javascript/map" src="{{asset('js/ekko-lightbox.js.map')}}"></script>
      <!--Datatables js-->
      <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
      <!--script>       

        $(document).ready(function(){
          //document.getElementById("temporal").style.visibility = "hidden";
          //document.getElementById(id).style.visibility = "visible";                                  
          $( window ).on( "scroll", readyFn );		
          $('#myTable').DataTable({
            "paging": false,                  
            "info": true,
            "autoWidth": true,
            "searching": true, // Search box and search function will be actived
            "dom": '<"top"f>rt<"bottom"ilp><"clear">',
            // "serverSide": true,
            "language": {
            "zeroRecords": "No existe registros",
            "infoEmpty": "No se econtró ningún registro",
            "sSearch": "Buscar:   "
                }
          });
          $(document).on('click', '[data-toggle="lightbox"]', function(event) {
              event.preventDefault();
              $(this).ekkoLightbox();
              $(".navbar-collapse").collapse('hide');
          });		

          $("#exit2").click(function (event) {    
          var toggle = $("#navbarResponsive").is(":visible");		
          if (toggle) {
              $(".navbar-collapse").collapse('hide');
            }
          });
          //document.getElementById("contador").onclick = function() {readyFn()};
          //document.getElementById("contador").onmouseover = function() {readyFn()};
          document.addEventListener('DOMContentLoaded', function() {
              M.AutoInit();
            });
          });  
      </script-->
         
    </section>
	</body>
</html>
