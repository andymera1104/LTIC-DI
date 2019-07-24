<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Dirección de Investigación &mdash;PUCE</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Pagina para la direccion de investigacion" />
	<meta name="keywords" content="Desarrollado por LTIC" />
	<meta name="author" content="FreeHTML5.co" />


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

	</head>
	<body>

	<div class="gtco-loader"></div>

	<div id="page">
	<nav class="gtco-nav" style="background-color:#4CBFDC;" role="navigation">
		<div class="container" >
			<div class="row">
				<div class="col-sm-2 col-xs-12">
					<div id="gtco-logo"><a href="index.html"> <img src="{{asset('images/logo2.jpg')}}"></a></div>
				</div>
				<div class="col-xs-10 text-right menu-1 ">
					<ul>
						<!--data-nav-section="home"-->
						<li class=""><a href="{{url('investigacion/investigador')}}">Investigadores</a></li>
						<li><a href="{{url('/facultades')}}">Facultades</a></li>
						<li><a href="{{url('investigacion/grupo')}}">Grupos</a></li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Generales
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								
								<a  style="color:#000;" class="dropdown-item" href="{{url('investigacion/categoria')}}">Categorias</a>
								
								<a  style="color:#000;" class="dropdown-item" href="{{url('/escuelas')}}">Escuelas</a>
							</div>
						</li>
					</ul>
						
						
				</div>
			</div>

		</div>
	</nav>

	<section id="gtco-about">
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
				<div class="col-md-20">
						<a class="gtco-logo-footer"  href="index.html"> <img src="{{asset('images/logo.jpg')}}" class="pull-left" ></a>	
					<p class="">
						<center>
						<small class="block" >Av. 12 de Octubre 1076 y Roca | Apartado postal 17-01-2184 | Quito, Ecuador </small>			
						</center>
					</p>
					<p class="pull-right">
						<small class="block" >&copy;2019 | LTIC</small>
					</p>
					<p>
						<center>
							<ul class="gtco-social-icons">
								<li><a href="#"><i class="icon-twitter"></i></a></li>
								<li><a href="#"><i class="icon-facebook"></i></a></li>
								<li><a href="#"><i class="icon-linkedin"></i></a></li>
								<li><a href="#"><i class="icon-dribbble"></i></a></li>
							</ul>
						</center>
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
