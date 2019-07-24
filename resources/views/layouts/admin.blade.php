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

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400, 900" rel="stylesheet"> -->

	<!-- Animate.css -->
	<link rel="stylesheet" href="{{asset('css/animate.css')}}">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="{{asset('css/icomoon.css')}}">
	<!-- Themify Icons-->
	<link rel="stylesheet" href="{{asset('css/themify-icons.css')}}">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
	<!-- Magnific Popup -->
	<link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
	<!-- Flexslider -->
	<link rel="stylesheet" href="{{asset('css/flexslider.css')}}">
	<!-- Theme style  -->
	<link rel="stylesheet" href="{{asset('css/style.css')}}">

	<!-- Modernizr JS -->
	<script src="{{asset('js/modernizr-2.6.2.min.js')}}"></script>
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
					<div id="gtco-logo"><a href="index.html"> <img src="images/logo2.jpg"></a></div>
				</div>
				<div class="col-xs-10 text-right menu-1 main-nav">
					<ul>
						<!--data-nav-section="home"-->
						<li class="active"><a href="#">Inicio</a></li>
						<li><a href="#">Publicacion</a></li>
						<li><a href="#">Investigación</a></li>
						<li><a href="#">Quienes Somos</a></li>
						<!--li class="btn-cta"><a href="#" data-nav-section="contact"><span>Contactanos</span></a></li-->
						<!-- For external page link -->
						<!-- <li><a href="http://freehtml5.co/" class="external">External</a></li> -->
					</ul>
				</div>
			</div>

		</div>
	</nav>

	<section id="gtco-hero" class="gtco-cover" style="background-image: url(images/img_bg_4.jpg);"  data-section="home"  data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-center">
					<div class="display-t">
						<div class="display-tc">
							<h1 class="animate-box" data-animate-effect="fadeIn">Dirección de Investigación</h1>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="gtco-about" data-section="about">
		<div class="container">
			<div class="row row-pb-md">
				<div class="col-md-8 col-md-offset-2 heading animate-box" data-animate-effect="fadeIn">
					<h1><a href="#">PUBLICACIONES</h1>
                    <p class="sub">Seccion para publicaciones</p>
                    @yield('contenido')
					<!--p class="subtle-text animate-box" data-animate-effect="fadeIn">Publi</p-->
				</div>
			</div>
			<!--div class="row">
					<div class="col-md-6 col-md-pull-1 animate-box" data-animate-effect="fadeInLeft">
					<div class="img-shadow">
						<img src="images/img_1.jpg" class="img-responsive" alt="" style= "border-radius:15px">
					</div>
					</div>
					<div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
						<h2 class="heading-colored">PUBLICACION 1</h2>
						<p>Texto de las publicaciones</p>
						<p><a href="#" class="read-more">Leer más <i class="icon-chevron-right"></i></a></p>
					</div>
			 </div>
     </div-->
   </section>

	<section id="gtco-practice-areas" data-section="practice-areas">
		<div class="container">
			<div class="row row-pb-md">
				<div class="col-md-8 col-md-offset-2 heading animate-box" data-animate-effect="fadeIn">
					<h1><a href="#">PROYECTOS</h1>
					<p class="sub">Area para proyectos</p>
				</div>
			</div>
	<!-- Area de publicaciones
			<div class="row">
				<div class="col-md-6">
					<div class="gtco-practice-area-item animate-box">
						<div class="gtco-icon">
							<img src="images/scale.png" alt="Free HTML5 Bootstrap Template by FreeHTML5.co">
						</div>
						<div class="gtco-copy">
							<h3>Criminal Law</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sed scelerisque sapien. Sed sodales, libero non faucibus rutrum, purus tellus finibus diam, eget ornare tortor leo eget erat. </p>
						</div>
					</div>

					<div class="gtco-practice-area-item animate-box">
						<div class="gtco-icon">
							<img src="images/scale.png" alt="Free HTML5 Bootstrap Template by FreeHTML5.co">
						</div>
						<div class="gtco-copy">
							<h3>Industrial Law</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sed scelerisque sapien. Sed sodales, libero non faucibus rutrum, purus tellus finibus diam, eget ornare tortor leo eget erat. </p>
						</div>
					</div>

					<div class="gtco-practice-area-item animate-box">
						<div class="gtco-icon">
							<img src="images/scale.png" alt="Free HTML5 Bootstrap Template by FreeHTML5.co">
						</div>
						<div class="gtco-copy">
							<h3>Financial Law</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sed scelerisque sapien. Sed sodales, libero non faucibus rutrum, purus tellus finibus diam, eget ornare tortor leo eget erat. </p>
						</div>
					</div>

				</div>
				<div class="col-md-6">

					<div class="gtco-practice-area-item animate-box">
						<div class="gtco-icon">
							<img src="images/scale.png" alt="Free HTML5 Bootstrap Template by FreeHTML5.co">
						</div>
						<div class="gtco-copy">
							<h3>Divorce Law</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sed scelerisque sapien. Sed sodales, libero non faucibus rutrum, purus tellus finibus diam, eget ornare tortor leo eget erat. </p>
						</div>
					</div>

					<div class="gtco-practice-area-item animate-box">
						<div class="gtco-icon">
							<img src="images/scale.png" alt="Free HTML5 Bootstrap Template by FreeHTML5.co">
						</div>
						<div class="gtco-copy">
							<h3>Corporate Law</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sed scelerisque sapien. Sed sodales, libero non faucibus rutrum, purus tellus finibus diam, eget ornare tortor leo eget erat. </p>
						</div>
					</div>

					<div class="gtco-practice-area-item animate-box">
						<div class="gtco-icon">
							<img src="images/scale.png" alt="Free HTML5 Bootstrap Template by FreeHTML5.co">
						</div>
						<div class="gtco-copy">
							<h3>Accident Law</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sed scelerisque sapien. Sed sodales, libero non faucibus rutrum, purus tellus finibus diam, eget ornare tortor leo eget erat. </p>
						</div>
					</div>

				</div>
			</div>
-->
		</div>
	</section>

	<section id="gtco-our-team" data-section="our-team">
		<div class="container">
			<div class="row row-pb-md">
				<div class="col-md-8 col-md-offset-2 heading animate-box" data-animate-effect="fadeIn">
					<h1><a href="#">NOTICIAS</h1>
					<p class="sub">Informacion de las Noticias</p>
				</div>
			</div>


		</div>
	</section>

	<section id="gtco-our-team" data-section="our-team">
		<div class="container">
			<div class="row row-pb-md">
				<div class="col-md-8 col-md-offset-2 heading animate-box" data-animate-effect="fadeIn">
					<h1><a href="#">GALERIA</h1>
					<p class="sub">Imagenes de la Galeria</p>
				</div>
			</div>


		</div>
	</section>


	<footer id="gtco-footer" role="contentinfo" style="background-color:#fff " >
		<hr class="linea-footer" style="border-width: 2px">
		<div class="container" > 			
			<div class="row copyright">
				<div class="col-md-20">
						<a class="gtco-logo-footer"  href="index.html"> <img src="images/logo.jpg" class="pull-left" ></a>	
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

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
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
