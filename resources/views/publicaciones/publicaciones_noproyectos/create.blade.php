@extends ('layouts.plantilla')
@section('contenido')
@if (session('alert'))
    <div class="alert alert-danger">
        {{ session('alert') }}
    </div>
    @endif
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Nueva Publicación NO-Proyecto</h3>
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
            {!!Form::open(array('url'=>'publicaciones/publicaciones_noproyectos','method'=>'POST','autocomplete'=>'off'))!!}
            {!!Form::token()!!}
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                <span style="width: 130px;" class="input-group-addon">ID Publicación</span>
                <input type="text" name="PUBLNOPROY_ID" required value="{{old('PUBLNOPROY_ID')}}" class="form-control" placeholder="ID Publicación NO-Proyecto">
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
            <span style="width: 130px;"class="input-group-addon">Áreas</span>
                <select style="width: 350px;" name="AREA_ID" class="form-control" >
                    @foreach($areas as $area)
                        <option value="{{$area ->AREA_ID}}">{{$area ->NOMBRE}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                    <span style="width:130px;" class="input-group-addon">Título </span>
                    <input type="text" name="TITULO" required value="{{old('TITULO')}}" class="form-control" placeholder="Título Publicación NO-Proyecto">
            </div>
        </div>


        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
            <span style="width: 130px;" class="input-group-addon">Tipo </span>
                    <input style="width: 350px;" type="text" name="TIPO" required value="{{old('TIPO')}}" class="form-control" placeholder="Tipo">
            </div> 
        </div>



        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
            <span style="width: 130px;" class="input-group-addon">Revista</span>
                    <input type="text" name="REVISTA" required value="{{old('REVISTA')}}" class="form-control" placeholder="Revista">
            </div> 
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
            <span style="width: 130px;" class="input-group-addon">Fecha </span>
                    <input style="width: 350px;" type="date" name="FECHAPUB" required value="{{old('FECHAPUB')}}" class="form-control" placeholder="Fecha">
            </div>     
        </div>



        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
            <span style="width: 130px;" class="input-group-addon">Nivel </span>
                    <input type="text" name="NIVEL" required value="{{old('NIVEL')}}" class="form-control" placeholder="Ingrese Nivel ejemplo: Q1">
            </div> 
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                    <span style="width: 130px;"class="input-group-addon">Abstract</span>
                    <textarea style="width: 350px;" type="text" name="ABSTRACT" required value="{{old('ABSTRACT')}}" class="form-control" placeholder="Abstract"> </textarea>
            </div>
        </div>


        <div class="col-lg-10 col-sm-6 col-md-6 col-xs-12">
        <br>
            <div class="form-group">
               <button class="btn btn-success" type="submit">Guardar</button>
               <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
        </div>

    </div>

    {!!Form::close()!!}    
@endsection