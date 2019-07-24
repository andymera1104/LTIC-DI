@extends ('layouts.plantilla')
@section('contenido')
@if (session('alert'))
    <div class="alert alert-danger">
        {{ session('alert') }}
    </div>
    @endif
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Nuevo Laboratorio/Proyecto</h3>
            @if(count ($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    </div>
            {!!Form::open(array('url'=>'laboratoriosProyectos','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}


    <div class="row">
       

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" >
            <div class="input-group">
            <span style="width: 130px;"class="input-group-addon">ID Proyecto</span>
                <select name="POST_ID" class="form-control" >
                    @foreach($proinves as $proin)
                        <option value="{{$proin ->POST_ID}}">{{$proin ->POST_ID}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" >
            <div class="input-group">
            <span style="width: 130px;"class="input-group-addon">Laboratorio</span>
                <select name="LAB_ID" class="form-control" >
                    @foreach($laboratorio as $lab)
                        <option value="{{$lab ->LAB_ID}}">{{$lab ->NOMBRE}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <br>
            <div class="form-group">
               <button class="btn btn-success" type="submit">Guardar</button>
               <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
        </div>

    </div>

    {!!Form::close()!!}    
@endsection