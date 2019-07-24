@extends ('layouts.plantilla')
@section('contenido')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Listado Investigadores <a href="investigador/create"><button class="btn btn-secondary"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo</button></a></h3>
            @include ('investigacion/investigador/search')
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
                        <th>Identificación</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Categoria</th>
                        <th>Grupo</th>
                        <th>Url Research</th>
                        <th>Carrera</th>
                        <th>Foto</th>
                        <th>Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($investigador as $inv)
                        <tr>
                            <td>{{ $inv -> INV_ID }}</td>
                            <td>{{ $inv -> NOMBRE }}</td>
                            <td>{{ $inv -> APELLIDO }}</td>
                            <td>{{ $inv -> nivel }}</td>
                            <td>{{ $inv -> grupo }}</td>
                            <td>{{ $inv -> URLRESEARCH }}</td>
                            <td>{{ $inv -> carrera }}</td>
                            <td>
                            <img src="{{asset('imagenes/fotos/'.$inv->FOTO)}}" alt="{{ $inv -> NOMBRE }}" height="100px" width="100px" class="img-thumbnail">
                            </td>
                            <td>
                                <center>
                                <a href="{{URL::action('InvestigadorController@edit',$inv->INV_ID)}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>

                                <a href="" data-target="#modal-delete-{{$inv->INV_ID}}" data-toggle="modal"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </center>
                            </td>
                        </tr>
                        @include('investigacion/investigador/modal')
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{$investigador->render()}}
        </div>
    </div>
@endsection