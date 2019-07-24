@extends ('layouts.plantilla')
@section('contenido')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Lista Laboratorio/Proyecto <a href="laboratoriosProyectos/create"><button class="btn btn-secondary"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo</button></a></h3>
            @include ('laboratoriosProyectos/search')
        </div>
    </div>
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
                       
                        <th>Proyecto</th>
                        <th>Laboratorio</th>
                        <th>Opciones</th>
                    </thead>
                        @foreach($labproinv as $lpi)
                        <tr>
                           
                            <td>{{ $lpi-> proyecto }}</td>
                            <td>{{ $lpi-> laboratorio }}</td>
                            <td>
                                <center>
                                <a href="" data-target="#modal-delete-{{$lpi->laboratorio}}" data-toggle="modal"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </center>
                            </td>
                        </tr>
                        @include('laboratoriosProyectos/modal')
                        @endforeach
                </table>
            </div>
            {{$labproinv->render()}}
        </div>
    </div>

@endsection