@extends ('layouts.plantilla')
@section('contenido')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Listado Noticias <a href="noticias/create"><button class="btn btn-secondary"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo</button></a></h3>
            @include ('noticias/search')
        </div>
    </div>
    @if (Session::has('message'))
                <p class="alert alert-success">{{Session::get('message')}}</p>
    @endif
    @if (session('alert'))
    <div class="alert alert-danger">
        {{ session('alert') }}
    </div>
    @endif

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>Id</th>
                        <th>Titulo</th>
                        <th>Resumen</th>
                        <th>Imagen</th>
                        <th>Noticia</th>
                        <th>Fecha</th>
                        <th>Opciones</th>
                    </thead>
                        @foreach($noticias as $not)
                        <tr>
                            <td>{{ $not -> NOT_ID }}</td>
                            <td>{{ $not-> TITULO }}</td>
                            <td>{{ $not-> RESUMEN }}</td>
                            <td>
                            <img src="{{asset('imagenes/noticias/'.$not->IMAGEN)}}" alt="{{ $not -> TITULO }}" height="100px" width="100px" class="img-thumbnail">
                            </td>
                            <td>{{ $not-> NOTICIA }}</td>
                            <td>{{ $not-> FECHA }}</td>
                            <td>
                                <center>
                                <a href="{{URL::action('NoticiasController@edit',$not->NOT_ID)}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>

                                <a href="" data-target="#modal-delete-{{$not->NOT_ID}}" data-toggle="modal"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </center>
                            </td>
                        </tr>
                        @include('noticias/modal')
                        @endforeach
                </table>
            </div>
            {{$noticias->render()}}
        </div>
    </div>

@endsection