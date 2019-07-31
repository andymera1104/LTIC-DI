@extends ('layouts.plantilla')
@section('contenido')
@if (session('alert'))
    <div class="alert alert-danger">
        {{ session('alert') }}
    </div>
    @endif
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Nueva Área Académica</h3>
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
            {!!Form::open(array('url'=>'publicaciones/areasAcademicas','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
            {{Form::token()}}

    <div class="row">
       
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                <span style="width: 130px;" class="input-group-addon">ID Área</span>
                <input type="text" name="AREA_ID" required value="{{old('AREA_ID')}}" class="form-control" placeholder="ID Área Académica">
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                    <span style="width:130px;" class="input-group-addon">Descripción</span>
                    <textarea type="text" name="DESCRIPCION" required value="{{old('DESCRIPCION')}}" class="form-control" placeholder="Descripción del Área"></textarea>
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                <span style="width: 130px;" class="input-group-addon">Nombre</span>
                <input type="text" name="NOMBRE" required value="{{old('NOMBRE')}}" class="form-control" placeholder="Nombre Area Académica">
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="IMAGEN" >IMAGEN | 
                Resolución maxima 1080 x 567
                </label>
                <input style="width: 330px;" type="file" name="IMAGEN" class="form-control">
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
            <span style="width: 130px;" class="input-group-addon">Video </span>
                    <input type="text" name="VIDEO" value="{{old('VIDEO')}}" class="form-control" placeholder="Ingrese URL Video">
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