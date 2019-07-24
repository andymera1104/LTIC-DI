@extends ('layouts.plantilla')
@section('contenido')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Listado Dominios Académicos <a href="dominiosAcademicos/create"><button class="btn btn-secondary"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo</button></a></h3>
            @include ('proyectosInvestigacion/dominiosAcademicos/search')
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
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Imagen</th>
                        <th>Video</th>
                        <th>Opciones</th>
                    </thead>
                        @foreach($dominios as $dom)
                        <tr>
                            <td>{{ $dom -> DOM_ID }}</td>
                            <td>{{ $dom-> NOMBRE }}</td>
                            <td>{{ $dom-> DESCRIPCION }}</td>
                            <td>
                            <img src="{{asset('imagenes/dominios/'.$dom->IMAGEN)}}" alt="{{ $dom -> NOMBRE }}" height="100px" width="100px" class="img-thumbnail">
                            </td>
                            <td>{{ $dom-> VIDEO }}</td>
                            <td>
                                <center>
                                <a href="{{URL::action('DominiosAcademicosController@edit',$dom->DOM_ID)}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>

                                <a href="" data-target="#modal-delete-{{$dom->DOM_ID}}" data-toggle="modal"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </center>
                            </td>
                        </tr>
                        @include('proyectosInvestigacion/dominiosAcademicos/modal')
                        @endforeach
                </table>
            </div>
            {{$dominios->render()}}
        </div>
    </div>

@endsection