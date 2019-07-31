@extends ('layouts.plantilla')
@section('contenido')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Lista Facultad/Proyecto <a href="proyectosFacultad/create"><button class="btn btn-secondary"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo</button></a></h3>
            @include ('proyectosFacultad/search')
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
                        <th>ID Facultad</th>
                        <th>Facultad</th>
                        <th>Opciones</th>
                    </thead>
                        @foreach($profac as $pfac)
                        <tr>
                           
                            <td>{{ $pfac-> proyecto }}</td>
                            <td>{{ $pfac-> facultad }}</td>
                            <td>{{ $pfac-> nomfacu }}</td>
                            <td>
                                <center>
                                <a href="" data-target="#modal-delete-{{$pfac->facultad}}" data-toggle="modal"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </center>
                            </td>
                        </tr>
                        @include('proyectosFacultad/modal')
                        @endforeach
                </table>
            </div>
            {{$profac->render()}}
        </div>
    </div>

@endsection