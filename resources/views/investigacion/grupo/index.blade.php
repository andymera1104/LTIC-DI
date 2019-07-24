@extends ('layouts.plantilla')
@section('contenido')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Listado Grupos <a href="grupo/create"><button class="btn btn-secondary"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo</button></a></h3>
            @include ('investigacion/grupo/search')
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
        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover table-sm">
                    <thead>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Opciones</th>
                    </thead>
                        @foreach($grupos as $gru)
                        <tr>
                            <td>{{$gru -> GRUP_ID}}</td>
                            <td>{{$gru -> NOMBRE}}</td>
                            <td>{{$gru -> DESCRIPCION}}</td>
                            <td>
                                <center>
                                <a href="{{URL::action('GrupoController@edit',$gru->GRUP_ID)}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                
                                <a data-target="#modal-delete-{{$gru->GRUP_ID}}" data-toggle="modal"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </center>
                            </td>
                        </tr>
                        @include('investigacion/grupo/modal')
                        @endforeach
                </table>
            </div>
            {{$grupos->render()}}
        </div>
    </div>
@endsection