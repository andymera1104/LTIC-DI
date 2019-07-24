@extends ('layouts.plantilla')
@section('contenido')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Listado Facultades <a href="facultades/create"><button class="btn btn-secondary"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo</button></a></h3>
            @include ('facultades/search')
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
                        <th>Codigo Sede</th>
                        <th>Decano</th>
                        <th>Subdecano</th>
                        <th>Telefono</th>
                        <th>Extensión</th>
                        <th>Opciones</th>
                    </thead>
                        @foreach($facultades as $fac)
                        <tr>
                            <td>{{ $fac -> FAC_ID }}</td>
                            <td>{{ $fac -> NOMBRE }}</td>
                            <td>{{ $fac -> CODIGOSEDE }}</td>
                            <td>{{ $fac -> DECANO }}</td>
                            <td>{{ $fac -> SUBDECANO }}</td>
                            <td>{{ $fac -> TELEFONO }}</td>
                            <td>{{ $fac -> EXTENSION }}</td>
                            <td>
                                <center>
                                <a href="{{URL::action('FacultadController@edit',$fac->FAC_ID)}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>

                                <a href="" data-target="#modal-delete-{{$fac->FAC_ID}}" data-toggle="modal"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </center>
                            </td>
                        </tr>
                        @include('facultades/modal')
                        @endforeach
                </table>
            </div>
            {{$facultades->render()}}
        </div>
    </div>

@endsection