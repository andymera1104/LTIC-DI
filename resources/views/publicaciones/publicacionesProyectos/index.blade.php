@extends ('layouts.plantilla')
@section('contenido')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Listado Publicaciones Proyectos <a href="publicacionesProyectos/create"><button class="btn btn-secondary"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo</button></a></h3>
            @include ('publicaciones/publicacionesProyectos/search')
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
                    <tr>
                        <th>Id</th>
                        <th>Área</th>
                        <th>Proyecto</th>
                        <th>Facultad</th>
                        <th>Título</th>
                        <th>Abstract</th>
                        <th>Fecha</th>
                        <th>Revista</th>
                        <th>Tipo</th>
                        <th>Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($publicaciones as $pub)
                        <tr>
                            <td>{{ $pub -> PUBL_ID }}</td>
                            <td>{{ $pub -> area }}</td>
                            <td>{{ $pub -> proyecto }}</td>
                            <td>{{ $pub -> facultad }}</td>
                            <td>{{ $pub -> TITULO }}</td>
                            <td>{{ $pub -> ABSTRACT }}</td>
                            <td>{{ $pub -> FECHAPUB }}</td>
                            <td>{{ $pub -> REVISTA }}</td>
                            <td>{{ $pub -> TIPO }}</td>
                            <td>
                                <center>
                                <a href="{{URL::action('PublicacionesProyectosController@edit',$pub->PUBL_ID)}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>

                                <a href="" data-target="#modal-delete-{{$pub->PUBL_ID}}" data-toggle="modal"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </center>
                            </td>
                        </tr>
                        @include('publicaciones/publicacionesProyectos/modal')
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{$publicaciones->render()}}
        </div>
    </div>
@endsection