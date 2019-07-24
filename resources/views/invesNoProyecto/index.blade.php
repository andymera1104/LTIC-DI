@extends ('layouts.plantilla')
@section('contenido')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Lista Investigador/Publicación NO-Proyecto <a href="invesNoProyecto/create"><button class="btn btn-secondary"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo</button></a></h3>
            @include ('invesNoProyecto/search')
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                       
                        <th>Proyecto</th>
                        <th>Investigador</th>
                        <th>Opciones</th>
                    </thead>
                        @foreach($noproy as $np)
                        <tr>
                           
                            <td>{{ $np -> proyecto }}</td>
                            <td>{{ $np-> investigador }}</td>
                            <td>
                                <center>
                                <a href="" data-target="#modal-delete-{{$np->proyecto}}" data-toggle="modal"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </center>
                            </td>
                        </tr>
                        @include('invesNoProyecto/modal')
                        @endforeach
                </table>
            </div>
            {{$noproy->render()}}
        </div>
    </div>

@endsection