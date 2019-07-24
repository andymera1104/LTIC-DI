@extends ('layouts.plantilla')
@section('contenido')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Listado Categorias <a href="categoria/create"><button class="btn btn-secondary"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo</button></a></h3>
            @include ('investigacion/categoria/search')
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
                        <th>Nivel</th>
                        <th>Opciones</th>
                    </thead>
                        @foreach($categorias as $cat)
                        <tr>
                            <td>{{$cat -> CATINV_ID}}</td>
                            <td>{{$cat -> NIVEL}}</td>
                            <td>
                                <center>
                                <a href="{{URL::action('CategoriaController@edit',$cat->CATINV_ID)}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                
                                <a data-target="#modal-delete-{{$cat->CATINV_ID}}" data-toggle="modal"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </center>
                            </td>
                        </tr>
                        @include('investigacion/categoria/modal')
                        @endforeach
                </table>
            </div>
            {{$categorias->render()}}
        </div>
    </div>
@endsection