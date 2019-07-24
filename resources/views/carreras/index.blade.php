@extends ('layouts.plantilla')
@section('contenido')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Listado Carreras <a href="carreras/create"><button class="btn btn-secondary"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo</button></a></h3>
            @include ('carreras/search')
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
                        <th>Escuela</th>
                        <th>Nombre</th>
                        <th>Coordinador</th>
                        <th>Telefono</th>
                        <th>Extensión</th>
                        <th>Opciones</th>
                    </thead>
                        @foreach($carreras as $car)
                        <tr>
                            <td>{{ $car -> CAR_ID }}</td>
                            <td>{{ $car-> escuela }}</td>
                            <td>{{ $car-> NOMBRE }}</td>
                            <td>{{ $car-> COORDINADOR }}</td>
                            <td>{{ $car-> TELEFONO }}</td>
                            <td>{{ $car-> EXTENSION }}</td>
                            <td>
                                <center>
                                <a href="{{URL::action('CarreraController@edit',$car->CAR_ID)}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>

                                <a href="" data-target="#modal-delete-{{$car->CAR_ID}}" data-toggle="modal"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </center>
                            </td>
                        </tr>
                        @include('carreras/modal')
                        @endforeach
                </table>
            </div>
            {{$carreras->render()}}
        </div>
    </div>

@endsection