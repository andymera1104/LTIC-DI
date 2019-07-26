@extends ('layouts.plantilla')
@section('contenido')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Listado Proyectos Investigación <a href="proyectos/create"><button class="btn btn-secondary"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo</button></a></h3>
            @include ('proyectosInvestigacion/proyectos/search')
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
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Programa</th>
                        <th>Director</th>
                        <th>Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($proyectos as $pro)
                        <tr>
                            <td>{{ $pro -> POST_ID }}</td>
                            <td>{{ $pro -> nombre }}</td>
                            <td>{{ $pro -> DESCRIPCION }}</td>
                            <td>{{ $pro -> programa }}</td>
                            <td>{{ $pro -> DIRECTOR }}</td>
                            <td>
                                <center>
                                <a href="{{URL::action('ProyectoInvestigacionController@edit',$pro->POST_ID)}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>

                                <a href="" data-target="#modal-delete-{{$pro->POST_ID}}" data-toggle="modal"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </center>
                            </td>
                        </tr>
                        @include('proyectosInvestigacion/proyectos/modal')
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{$proyectos->render()}}
        </div>
    </div>
@endsection