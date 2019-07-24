@extends ('layouts.plantilla')
@section('contenido')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Listado Laboratorios <a href="laboratorios/create"><button class="btn btn-secondary"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo</button></a></h3>
            @include ('laboratorios/search')
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
                        <th>ID Laboratorio</th>
                        <th>Carrera</th>
                        <th>Centro</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Imagen</th>
                        <th>Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($laboratorios as $lab)
                        <tr>
                            <td>{{ $lab -> LAB_ID }}</td>
                            <td>{{ $lab -> carrera }}</td>
                            <td>{{ $lab -> centro }}</td>
                            <td>{{ $lab -> laboratorio }}</td>
                            <td>{{ $lab -> DESCRIPCION }}</td>
                            <td>
                                <img src="{{asset('imagenes/laboratorios/'.$lab->IMAGEN)}}" alt="{{$lab->laboratorio }}" height="100px" width="100px" class="img-thumbnail">
                            </td>
                            
                            <td>
                                <center>
                                <a href="{{URL::action('LaboratorioController@edit',$lab->LAB_ID)}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>

                                <a href="" data-target="#modal-delete-{{$lab->LAB_ID}}" data-toggle="modal"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </center>
                            </td>
                        </tr>
                        @include('laboratorios/modal')
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{$laboratorios->render()}}
        </div>
    </div>
@endsection