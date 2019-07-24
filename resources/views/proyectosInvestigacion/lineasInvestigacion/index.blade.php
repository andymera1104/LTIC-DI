@extends ('layouts.plantilla')
@section('contenido')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Listado Lineas Investigación <a href="lineasInvestigacion/create"><button class="btn btn-secondary"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo</button></a></h3>
            @include ('proyectosInvestigacion/lineasInvestigacion/search')
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
                        <th>Dominio</th>
                        <th>Nombre Linea</th>
                        <th>Descripción</th>
                        <th>Imagen</th>
                        <th>Video</th>
                        <th>Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($lineas as $lin)
                        <tr>
                            <td>{{ $lin -> LININV_ID }}</td>
                            <td>{{ $lin -> dominio }}</td>
                            <td>{{ $lin -> NOMBRE }}</td>
                            <td>{{ $lin -> DESCRIPCION }}</td>
                            <td>
                                <img src="{{asset('imagenes/lineasInvestigacion/'.$lin->IMAGEN)}}" alt="{{ $lin -> NOMBRE }}" height="100px" width="100px" class="img-thumbnail">
                            </td>
                            <td>{{ $lin -> VIDEO }}</td>
                            <td>
                                <center>
                                <a href="{{URL::action('LineasInvestigacionController@edit',$lin->LININV_ID)}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>

                                <a href="" data-target="#modal-delete-{{$lin->LININV_ID}}" data-toggle="modal"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </center>
                            </td>
                        </tr>
                        @include('proyectosInvestigacion/lineasInvestigacion/modal')
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{$lineas->render()}}
        </div>
    </div>
@endsection