@extends ('layouts.plantilla')
@section('contenido')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Listado Escuelas <a href="escuelas/create"><button class="btn btn-secondary"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo</button></a></h3>
            @include ('escuelas/search')
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
                        <th>Facultad</th>
                        <th>Nombre</th>
                        <th>Director</th>
                        <th>Telefono</th>
                        <th>Extensión</th>
                        <th>Opciones</th>
                    </thead>
                        @foreach($escuelas as $esc)
                        <tr>
                            <td>{{ $esc -> ESC_ID }}</td>
                            <td>{{ $esc-> facultad }}</td>
                            <td>{{ $esc-> NOMBRE }}</td>
                            <td>{{ $esc-> DIRECTOR }}</td>
                            <td>{{ $esc-> TELEFONO }}</td>
                            <td>{{ $esc-> EXTENSION }}</td>
                            <td>
                                <center>
                                <a href="{{URL::action('EscuelaController@edit',$esc->ESC_ID)}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>

                                <a href="" data-target="#modal-delete-{{$esc->ESC_ID}}" data-toggle="modal"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </center>
                            </td>
                        </tr>
                        @include('escuelas/modal')
                        @endforeach
                </table>
            </div>
            {{$escuelas->render()}}
        </div>
    </div>

@endsection