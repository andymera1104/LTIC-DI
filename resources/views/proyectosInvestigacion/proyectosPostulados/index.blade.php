@extends ('layouts.plantilla')
@section('contenido')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Listado Proyectos Postulados<a href="proyectosPostulados/create"><button class="btn btn-secondary"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo</button></a></h3>
            @include ('proyectosInvestigacion/proyectosPostulados/search')
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
                        <th>Estado</th>
                        <th>Opciones</th>
                    </thead>
                        @foreach($postulados as $pos)
                        <tr>
                            <td>{{ $pos -> POST_ID }}</td>
                            <td>{{ $pos-> NOMBRE }}</td>
                            <td>{{ $pos-> ESTADO }}</td>
                            <td>
                                <center>
                                <a href="{{URL::action('PI_PostuladosController@edit',$pos->POST_ID)}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>

                                <a href="" data-target="#modal-delete-{{$pos->POST_ID}}" data-toggle="modal"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </center>
                            </td>
                        </tr>
                        @include('proyectosInvestigacion/proyectosPostulados/modal')
                        @endforeach
                </table>
            </div>
            {{$postulados->render()}}
        </div>
    </div>

@endsection