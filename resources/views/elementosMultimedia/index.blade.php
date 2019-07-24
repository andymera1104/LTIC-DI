@extends ('layouts.plantilla')
@section('contenido')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Lista Elementos Multimedia <a href="elementosMultimedia/create"><button class="btn btn-secondary"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo</button></a></h3>
            @include ('elementosMultimedia/search')
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
                        <th>ID Elemento Multimedia</th>
                        <th>Centros</th>
                        <th>Foto</th>
                        <th>Video</th>
                        <th>Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($elementos as $elem)
                        <tr>
                            <td>{{ $elem -> ELEMMULT_ID }}</td>
                            <td>{{ $elem -> centro }}</td>
                            <td>
                                <img src="{{asset('imagenes/elementosMultimedia/'.$elem->FOTO)}}" alt="{{ $elem -> ELEMMULT_ID }}" height="100px" width="100px" class="img-thumbnail">
                            </td>
                            <td><a href="{{ $elem -> VIDEO }}">{{ $elem -> VIDEO }}</td></a>
                            <td>
                                <center>
                                <a href="{{URL::action('ElementosMultimediaController@edit',$elem->ELEMMULT_ID)}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>

                                <a href="" data-target="#modal-delete-{{$elem->ELEMMULT_ID}}" data-toggle="modal"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </center>
                            </td>
                        </tr>
                        @include('elementosMultimedia/modal')
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{$elementos->render()}}
        </div>
    </div>
@endsection