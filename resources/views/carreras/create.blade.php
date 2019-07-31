@extends ('layouts.plantilla')
@section('contenido')

    @if (session('alert'))
    <div class="alert alert-danger">
        {{ session('alert') }}
    </div>
    @endif

    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Nueva Carrera</h3>
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
            {!!Form::open(array('url'=>'carreras','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}

    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
            <span style="width: 130px;"class="input-group-addon">Escuela</span>
                <select style="width: 212px;" name="ESC_ID" class="form-control" >
                    @foreach($escuelas as $esc)
                        <option value="{{$esc->ESC_ID}}">{{$esc->NOMBRE}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                <span style="width: 130px;" class="input-group-addon">ID Carrera</span>
                <input type="text" name="CAR_ID" required value="{{old('CAR_ID')}}" class="form-control" placeholder="ID Carrera">
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                <span style="width: 130px;" class="input-group-addon">Nombre</span>
                <input type="text" name="NOMBRE" required value="{{old('NOMBRE')}}" class="form-control" placeholder="Nombre Carrera">
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                    <span style="width:130px;" class="input-group-addon">Coordinador</span>
                    <input type="text" name="COORDINADOR" required value="{{old('COORDINADOR')}}" class="form-control" placeholder="Nombre Coordinador">
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                    <span style="width: 130px;"class="input-group-addon">Teléfono</span>
                    <input type="text" name="TELEFONO" required value="{{old('TELEFONO')}}" class="form-control" placeholder="Ingrese teléfono carrera">
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
            <span style="width: 130px;" class="input-group-addon">Extensión </span>
                    <input type="text" name="EXTENSION" required value="{{old('EXTENSION')}}" class="form-control" placeholder="Ingrese Extensión">
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