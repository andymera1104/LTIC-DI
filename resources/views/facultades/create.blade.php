@extends ('layouts.plantilla')
@section('contenido')

@if (session('alert'))
    <div class="alert alert-danger">
        {{ session('alert') }}
    </div>
    @endif
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Nueva Facultad </h3>
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
            {!!Form::open(array('url'=>'facultades','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
    <div class="row">
        <div class="col-lg-5 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                <span style="width: 130px;" class="input-group-addon">ID Facultad</span>
                <input type="text" name="FAC_ID" required value="{{old('FAC_ID')}}" class="form-control" placeholder="Nombre Facultad">
            </div>
        </div>

        <div class="col-lg-5 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                <span style="width: 130px;" class="input-group-addon">Nombre</span>
                <input type="text" name="NOMBRE" required value="{{old('NOMBRE')}}" class="form-control" placeholder="Nombre Facultad">
            </div>
        </div>

        <div class="col-lg-5 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                    <span style="width:130px;" class="input-group-addon">Codigo Sede</span>
                    <input type="text" name="CODIGOSEDE" required value="{{old('CODIGOSEDE')}}" class="form-control" placeholder="Código Sede">
            </div>
        </div>

        <div class="col-lg-4 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                    <span style="width:130px;" class="input-group-addon">Decano</span>
                    <input type="text" name="DECANO" required value="{{old('DECANO')}}" class="form-control" placeholder="Ingrese nombre Decano">
            </div>
        </div>

        <div class="col-lg-5 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                    <span style="width:130px;" class="input-group-addon">Subdecano</span>
                    <input type="text" name="SUBDECANO" required value="{{old('SUBDECANO')}}" class="form-control" placeholder="Ingrese nombre Subdecano">
            </div>
        </div>

        <div class="col-lg-5 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                    <span style="width:130px;" class="input-group-addon">Telefono</span>
                    <input type="text" name="TELEFONO" required value="{{old('TELEFONO')}}" class="form-control" placeholder="Ingrese Telefono">
            </div>
        </div>

        <div class="col-lg-5 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                    <span style="width:130px;" class="input-group-addon">Extensión</span>
                    <input type="text" name="EXTENSION" required value="{{old('EXTENSION')}}" class="form-control" placeholder="Ingrese Extensión">
            </div>
        </div>
        <br><br>
        <div class="col-lg-8 col-sm-6 col-md-6 col-xs-12">
        <br>
            <div class="form-group">
               <button class="btn btn-success" type="submit">Guardar</button>
               <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
        </div>
        
    </div>

    {!!Form::close()!!}    
@endsection