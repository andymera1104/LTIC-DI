@extends ('layouts.plantilla')
@section('contenido')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Lista Investigador/Proyecto <a href="investigacionProyectos/create"><button class="btn btn-secondary"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo</button></a></h3>
            @include ('investigacionProyectos/search')
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
                        <th>Investigador</th>
                        <th>Opciones</th>
                    </thead>
                        @foreach($invpro as $invspro)
                        <tr>
                           
                            <td>{{ $invspro -> proyecto }}</td>
                            <td>{{ $invspro-> investigador }}</td>
                            <td>
                                <center>
                                <a href="" data-target="#modal-delete-{{$invspro->investigador}}" data-toggle="modal"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </center>
                            </td>
                        </tr>
                        @include('investigacionProyectos/modal')
                        @endforeach
                </table>
            </div>
            {{$invpro->render()}}
        </div>
    </div>

@endsection