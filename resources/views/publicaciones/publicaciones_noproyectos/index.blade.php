@extends ('layouts.plantilla')
@section('contenido')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Listado Publicaciones NO-Proyectos <a href="publicaciones_noproyectos/create"><button class="btn btn-secondary"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo</button></a></h3>
            @include ('publicaciones/publicaciones_noproyectos/search')
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
                        <th>Título</th>
                        <th>Abstract</th>
                        <th>Fecha</th>
                        <th>Revista</th>
                        <th>Tipo</th>
                        <th>Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($noproyectos as $nop)
                        <tr>
                            <td>{{ $nop -> PUBLNOPROY_ID }}</td>
                            <td>{{ $nop -> area }}</td>
                            <td>{{ $nop -> TITULO }}</td>
                            <td>{{ $nop -> ABSTRACT }}</td>
                            <td>{{ $nop -> FECHAPUB }}</td>
                            <td>{{ $nop -> REVISTA }}</td>
                            <td>{{ $nop -> TIPO }}</td>
                            <td>
                                <center>
                                <a href="{{URL::action('PublicacionesNoProyectoController@edit',$nop->PUBLNOPROY_ID)}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>

                                <a href="" data-target="#modal-delete-{{$nop->PUBLNOPROY_ID}}" data-toggle="modal"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </center>
                            </td>
                        </tr>
                        @include('publicaciones/publicaciones_noproyectos/modal')
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{$noproyectos->render()}}
        </div>
    </div>
@endsection