@extends ('layouts.plantilla')
@section('contenido')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Listado Eventos <a href="eventos/create"><button class="btn btn-secondary"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo</button></a></h3>
            @include ('eventos/search')
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
                        <th>Descripción</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Fin</th>
                        <th>Lugar</th>
                        <th>Opciones</th>
                    </thead>
                        @foreach($eventos as $even)
                        <tr>
                            <td>{{ $even -> EVENT_ID }}</td>
                            <td>{{ $even-> TITULO }}</td>
                            <td>{{ $even-> DESCRIPCION }}</td>
                            <td>{{ $even-> FECHA_INICIO }}</td>
                            <td>{{ $even-> FECHA_FIN }}</td>
                            <td>{{ $even-> LUGAR }}</td>
                            <td>
                                <center>
                                <a href="{{URL::action('EventosController@edit',$even->EVENT_ID)}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>

                                <a href="" data-target="#modal-delete-{{$even->EVENT_ID}}" data-toggle="modal"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </center>
                            </td>
                        </tr>
                        @include('eventos/modal')
                        @endforeach
                </table>
            </div>
            {{$eventos->render()}}
        </div>
    </div>

@endsection