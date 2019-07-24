@extends('layout.home')

@section('content')
<center>
			<div class="container" style="width:100%;max-width:100%;">
				<div id="row1" class="row"style="width:100%;max-width:100%;">	
					<div class="col-md-12">	

					<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner">
						<div class="carousel-item active">
						<img class="d-block w-100" src="https://cdnuploads.aa.com.tr/uploads/Contents/2018/09/24/thumbs_b_c_0970f11a6d81d650d9c47ea21f10a751.jpg?v=231325" alt="Imagen1">
						</div>
						<div class="carousel-item">
						<img class="d-block w-100" src="http://www.cesa.edu.co/wp-content/uploads/2018/06/Interna-investigacion.jpg"  alt="Imagen2" >
						</div>
						<div class="carousel-item">
						<img class="d-block w-100" src="http://www.cetem.es/rs/2955/c166665a-817b-467a-b298-d92c11417c34/1ca/filename/madera.jpg"  alt="Imagen3
						" >
						</div>
					</div>
						</div>

								<div class="img-hover-zoom img-hover-zoom--slowmo" style="width:100%;max-width:100%;">
										<div class="centered" style="padding: 1%;" style="color:#000;">
										<strong> CONOCIMIENTO QUE TRANSFORMA </strong>
										</div>
								</div>
						</div>
				</div>								
				<div id="row2" class="row text-center" style="width:100%;max-width:100%;">
					<div class="col-sm-12 col-md-12 col-lg-12">
						<center>
						<div class="container"style="width:100%;max-width:100%;">
							<div class="expandable"><br><h2><a  id="subrayado" style="text-decoration: none; color:black;" href="{{ route('publicacionC.index') }}">PUBLICACIONES</a></h2></div>							
							<span class="elementor-divider-separator"></span>
							<div class="row col-12"style="width:100%;max-width:100%;">		
							@foreach($elementos as $ele)
								<div class=" col-lg-4 align-center text-justify">
										<div class=" col-10 text-justify">
											
											<h3>{{$ele->TITULO}}</h3>
												<br>
												{{$ele->ABSTRACT}}

										</div>							
								</div>
							@endforeach
						</div>
						</center><br>
					</div>								
				</div>
				<?php 
				
				$datos=\DB::table('pi_postulados')
				->join('proyectoinvestigacion','proyectoinvestigacion.POST_ID','=','pi_postulados.POST_ID')
				->select('pi_postulados.NOMBRE','proyectoinvestigacion.IMAGEN')
				->get();
				?>
				
				<div col-12 style="width:100%;max-width:100%;">
										
						<div class="expandable"><br><h2><a  id="subrayado" style="text-decoration: none; color:black;" href="#publicaciones">PROYECTOS</a></h3></div>
							
						<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner" role="listbox">
						@foreach( $datos as $photo )
							<div class="carousel-item {{ $loop->first ? 'active' : '' }}">
								<img class="d-block img-fluid" src="{{asset('imagenes/proyectos/'.$photo->IMAGEN)}}" alt="{{ $photo->NOMBRE }}">
									<div class="carousel-caption d-none d-md-block">
										<h3>{{ $photo->NOMBRE }}</h3>
									</div>
							</div>
						@endforeach
						</div>
						<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
						</a>
						</div>
	
					
				</div>
					<div class="row text-center" style="width:100%;max-width:100%;">
						<div class="col-md-12">
							<center>
						
							</center><br>
						</div>	
													
					</div>


					<!-- Contadores de registros  -->
					<?php 
					$investigador=\DB::table('investigador')
					->get();
					$publicaciones=\DB::table('publicaciones')
					->get();
					$pubnp=\DB::table('publc_no_prycts')
					->get();
					$proyectos=\DB::table('pi_postulados')
					->get();
					$investigador = count($investigador);
					$publicaciones = count($publicaciones);
					$pubnp=count($pubnp);
					$pubtotal=$pubnp+$publicaciones;
					$proyectos=count($proyectos);
					?>
					<!-- Contadores   -->


					<div class="row text-center" style="width:100%;max-width:100%;">
							<div class="col-md-12">
								<center>
								<div id="contador" class="row text-center" style="width:100%;max-width:100%;background-color:#4CBFDC;">
									<div class="col-4">
											<div class="counter">																					
											<span class="count-title count-number count">{{ $investigador}}</span>
											<p class="count-text ">Investigadores</p>
										</div>
									</div>
									<div class="col-4">
										<div class="counter">										
												<span class="count-title count-number count">{{ $pubtotal}}</span>
											<p class="count-text ">Publicaciones</p>
										</div>
									</div>
									<div class="col-4">
										<div class="counter">										
												<span class="count-title count-number count">{{ $proyectos}}</span>
											<p class="count-text ">Proyectos de Investigación</p>
										</div>
									</div>						
								</div>
							</center>
							</div>
					</div>	


					<div class="row text-center" style="width:100%;max-width:100%;">
							<div class="col-md-12">		
								<!---->
									<br>
									<div class="row" style="margin:0%;padding:0%;">
											<figure class="col-sm-4" style="margin:0%;padding:0%;">
												
														<img src="https://unsplash.it/600.jpg?image=251" class="img-fluid">
												
												<figcaption id="hovi">Imagen Prueba 1</figcaption>
											</figure>	
											<figure class="col-sm-4" style="margin:0%;padding:0%;">
												
														<img src="https://unsplash.it/600.jpg?image=252" class="img-fluid">
												
												<figcaption class="text-center" id="hovi">Imagen Prueba 2</figcaption>
											</figure>	
											<figure class="col-sm-4" style="margin:0%;padding:0%;">
														<img src="https://unsplash.it/600.jpg?image=253" class="img-fluid">														
												
												<figcaption class="text-center" id="hovi">Imagen Prueba 3</figcaption>												
											</figure>															
									</div>
									<!--<br>-->
									<div class="row" style="margin:0%;padding:0%;">
											<figure class="col-sm-4" style="margin:0%;padding:0%;">
												
														<img src="https://unsplash.it/600.jpg?image=254" class="img-fluid">												
																									
												<figcaption id="hovi">Imagen Prueba 4</figcaption>
											</figure>	
											<figure class="col-sm-4" style="margin:0%;padding:0%;">
														<img src="https://unsplash.it/600.jpg?image=255" class="img-fluid">
												<figcaption id="hovi">Imagen Prueba 5</figcaption>
											</figure>	
											<figure class="col-sm-4" style="margin:0%;padding:0%;">
														<img src="https://unsplash.it/600.jpg?image=256"class="img-fluid">
												<figcaption id="hovi">Imagen Prueba 6</figcaption>
											</figure>	
											
						
									</div>										
								<!---->
							</div>
					</div>					
			</div>	
			
			
		</center>
@endsection
