@extends ('layouts.plantilla')
@section('contenido')

    <div class="row">

    @if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    @if (session('alert'))
    <div class="alert alert-danger">
        {{ session('alert') }}
    </div>
    @endif

        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Listado Proyectos por Lineas de Investigación <a href="lineas_x_pi_postulado/create"><button class="btn btn-secondary"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo</button></a></h3>
            @include ('proyectosInvestigacion/lineas_x_pi_postulado/search')
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                       
                        <th>Proyecto</th>
                        <th>Linea</th>
                        <th>Opciones</th>
                    </thead>
                        @foreach($linproy as $linp)
                        <tr>
                            
                            <td>{{ $linp -> proyecto }}</td>
                            <td>{{ $linp-> linea }}</td>
                            <td>
                                <center>
                                <a href="" data-target="#modal-delete-{{$linp->proyecto}}" data-toggle="modal"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </center>
                            </td>
                        </tr>
                        @include('proyectosInvestigacion/lineas_x_pi_postulado/modal')
                        @endforeach
                </table>
            </div>
            {{$linproy->render()}}
        </div>
    </div>

@endsection