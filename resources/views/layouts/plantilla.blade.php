<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<!--meta http-equiv="X-UA-Compatible" content="IE=edge"-->
	<title>SISTEMA DI &mdash;PUCE</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Pagina para la direccion de investigacion" />
	<meta name="keywords" content="Desarrollado por LTIC" />
	

	<!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400, 900" rel="stylesheet"> -->

	<!-- Animate.css -->
	<link rel="stylesheet" href="{{asset('css/animate.css')}}">
	<!-- Icomoon Icon Fonts-->
	<!--link rel="stylesheet" href="{{asset('css/icomoon.css')}}"-->
	<!-- Themify Icons-->
	<!--link rel="stylesheet" href="{{asset('css/themify-icons.css')}}"-->
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
	<!-- Magnific Popup -->
	<link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
	<!-- Owl Carousel  -->
	<!-- link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}" -->
	<link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
	<!-- Flexslider -->
	<!--link rel="stylesheet" href="{{asset('css/flexslider.css')}}"-->
	<!-- Theme style  -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">

	<!-- Modernizr JS -->
	<!--script src="{{asset('js/modernizr-2.6.2.min.js')}}"></script-->
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	
	
	</head>
	<body>

	

	<div id="page">
	<nav class="gtco-nav" style="background-color:#4CBFDC;" role="navigation">
		<div class="container" >
			<div class="row">
				<div class="col-sm-2 col-xs-12">
					<div id="gtco-logo"> <img src="{{asset('images/logo2.jpg')}}"></div>
				</div>
				<div class="col-10 text-right menu-1 ">
					<ul style="padding:30px 0">
						<!--data-nav-section="home"-->
						<!--li class=""><a href="">Investigadores</a></li-->
						<!--li><a href="">Facultades</a></li-->
						<!--li><a href="">Grupos</a></li-->
						<!--li><a href="">Escuelas</a></li-->
						<!--li><a href="">Carreras</a></li-->
						<!--li><a href="{{url('investigacion/categoria')}}">Categorias</a></li-->
						
						<!--li><a href="">Dominios</a></li-->
						<!--li><a href="">Lineas</a></li-->
						<!--li><a href="">Proyectos</a></li-->
						<!--li><a href="">Proy Postulados</a></li-->
						<!--li><a href="">Lineas/P.Postulados</a></li-->
						<!--li><a href="">Áreas</a></li-->
						<!--li><a href="">P.No Proyectos</a></li-->
					
						<!--li><a href="">Centros</a></li-->
						<!--li><a href="">Programas</a></li-->
						<!--li><a href="">E. Multimedia</a></li-->
						<!--li><a href="">Laboratorio</a></li-->
						<!--li><a href="">Publicaciones</a></li-->

						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							UNIDAD ACADÉMICA
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a  style="color:#000;" class="dropdown-item" href="{{url('/facultades')}}">Facultades</a>
								<hr>
								<a  style="color:#000;" class="dropdown-item" href="{{url('/escuelas')}}">Escuelas</a>
								<hr>
								<a  style="color:#000;" class="dropdown-item" href="{{url('/carreras')}}">Carreras</a>
								
							</div>
							
						</li>	

						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							INVESTIGADOR
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a  style="color:#000;" class="dropdown-item" href="{{url('investigacion/investigador')}}">Investigadores</a>
								<hr>
								<a  style="color:#000;" class="dropdown-item" href="{{url('investigacion/grupo')}}">Grupos</a>
								<hr>
								<a  style="color:#000;" class="dropdown-item" href="{{url('investigacion/categoria')}}">Categorías</a>
																
							</div>
						</li>

						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							LABORATORIOS
							</a>
							<div class="dropdown-menu" style="padding:20px;" aria-labelledby="navbarDropdown">
								<a  style="color:#000;" class="dropdown-item" href="{{url('/centrosInvestigacion')}}">Centros</a>
								<hr>
								<a  style="color:#000;" class="dropdown-item" href="{{url('/elementosMultimedia')}}">Elementos Multimedia </a>
								<hr>
								<a  style="color:#000;" class="dropdown-item" href="{{url('/laboratorios')}}">Laboratorios</a>
								<hr>
								<a  style="color:#000;" class="dropdown-item" href="{{url('/laboratoriosProyectos')}}">Laboratorios&nbsppor&nbspProyecto</a>
																
							</div>
						</li>	

						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							INVESTIGACIÓN
							</a>
							<div class="dropdown-menu" style="padding:20px;" aria-labelledby="navbarDropdown">
								<a  style="color:#000;" class="dropdown-item" href="{{url('/proyectosInvestigacion/proyectosPostulados')}}">Proyecto&nbspPostulado</a>
								<hr>
								
								<a  style="color:#000;" class="dropdown-item" href="{{url('/proyectosInvestigacion/proyectos')}}">Proyectos&nbspde&nbspInvestigación</a>
								<hr>
								<a  style="color:#000;" class="dropdown-item" href="{{url('/proyectosInvestigacion/lineas_x_pi_postulado')}}">Lineas&nbspdel&nbspProyecto</a>
								<!--
								<hr>
								<a  style="color:#000;" class="dropdown-item" href="{{url('proyectosFacultad')}}">Proyecto&nbsppor&nbspFacultad</a>
								-->
								<hr>
								
								<a  style="color:#000;" class="dropdown-item" href="{{url('investigacionProyectos')}}">Investigador&nbsppor&nbspProyecto</a>
								<hr>
								<a  style="color:#000;" class="dropdown-item" href="{{url('/proyectosInvestigacion/dominiosAcademicos')}}">Dominios&nbspAcadémicos</a>
								<hr>
								<a  style="color:#000;" class="dropdown-item" href="{{url('/proyectosInvestigacion/lineasInvestigacion')}}">Lineas&nbspde&nbspInvestigación</a>
								<hr>
								<a  style="color:#000;" class="dropdown-item" href="{{url('/programas')}}">Programas</a>
								
							</div>
						</li>	

						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
							PUBLICACION
							</a>
							<div class="dropdown-menu" style="padding:20px;" aria-labelledby="navbarDropdown" aria-expanded="true" >
								<a  style="color:#000;" class="dropdown-item" href="{{url('/publicaciones/areasAcademicas')}}">Áreas&nbspConocimiento</a>
								<hr>
								<a  style="color:#000;" class="dropdown-item " href="{{url('/publicaciones/publicacionesProyectos')}}">Proyectos</a>
								<hr>
								<a  style="color:#000;" class="dropdown-item" href="{{url('/publicaciones/publicaciones_noproyectos')}}"> Independientes </a>
								<hr>
								<a  style="color:#000;" class="dropdown-item" href="{{url('invesNoProyecto')}}"> Investigador&nbspPublicaciones&nbspNo&nbspProyecto </a>
								
								
															
							</div>
						</li>	
						
						<li><a href="{{url('/eventos')}}">Eventos</a></li>
						<li><a href="{{url('/noticias')}}">Noticias</a></li>	
						
						<li>
							<a href="{{url('/logout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i>  
							</a>
							<div class="card-body"><font size='2' style="color:#FFf">
							<i class="fa fa-circle" aria-hidden="true" style="color:green"></i> Online: <i class="fa fa-user" aria-hidden="true" style="color:"></i> {{ auth()->user()->name }}</font>
							</div>
						</li>	
						
					</ul>
					
						
				</div>
			</div>

		</div>
	</nav>

	<section id="sistema">
		<div class="container">
			<div class="row ">
				<div class="col-md-12 ">
					
                    @yield('contenido')
					
				</div>
			</div>
   </section>

	<footer id="gtco-footer" role="contentinfo" style="background-color:#fff " >
		<hr class="linea-footer" style="border-width: 2px">
		<div class="container" > 			
			<div class="row copyright">
				<div class="col-md-12">
						<a class="gtco-logo-footer"> <img src="{{asset('images/logo.jpg')}}" class="pull-left" ></a>	
					<p class="">
						<center>
						<small class="block" >Av. 12 de Octubre 1076 y Roca | Apartado postal 17-01-2184 | Quito, Ecuador </small>			
						</center>
					</p>
					<p class="pull-right">
						<small class="block" >&copy;2019 | LTIC</small>
					</p>
				</div>
			</div>

		</div>
	</footer>
	</div>

	

	<!-- jQuery -->
	<script src="{{asset('js/jquery.min.js')}}"></script>
	<!-- jQuery Easing -->
	<script src="{{asset('js/jquery.easing.1.3.js')}}"></script>
	<!-- Bootstrap -->
	<script src="{{asset('js/bootstrap.min.js')}}"></script>
	<!-- Waypoints -->
	<script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
	<!-- Stellar -->
	<script src="{{asset('js/jquery.stellar.min.js')}}"></script>
	<!-- Magnific Popup -->
	<script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
	<script src="{{asset('js/magnific-popup-options.js')}}"></script>
	<!-- Main -->
	<script src="{{asset('js/main.js')}}"></script>


	</body>
</html>
