@extends ('layouts.plantilla')
@section('contenido')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Listado Programas <a href="programas/create"><button class="btn btn-secondary"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo</button></a></h3>
            @include ('programas/search')
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
                        
                        <th>Descripción</th>
                        <th>Opciones</th>
                    </thead>
                        @foreach($programas as $pro)
                        <tr>
                            <td>{{ $pro -> PROG_ID }}</td>
                          
                            <td>{{ $pro-> DESCRIPCION }}</td>
                           
                            <td>
                                <center>
                                <a href="{{URL::action('ProgramasController@edit',$pro->PROG_ID)}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>

                                <a href="" data-target="#modal-delete-{{$pro->PROG_ID}}" data-toggle="modal"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </center>
                            </td>
                        </tr>
                        @include('programas/modal')
                        @endforeach
                </table>
            </div>
            {{$programas->render()}}
        </div>
    </div>

@endsection