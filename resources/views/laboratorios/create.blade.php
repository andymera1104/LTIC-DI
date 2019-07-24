@extends ('layouts.plantilla')
@section('contenido')

@if (session('alert'))
    <div class="alert alert-danger">
        {{ session('alert') }}
    </div>
    @endif
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Nuevo Laboratorio</h3>
            @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

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
            {!!Form::open(array('url'=>'laboratorios','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
            {{Form::token()}}
    <div class="row">

         <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                <span style="width: 130px;" class="input-group-addon">ID Laboratorio</span>
                <input type="text" name="LAB_ID" required value="{{old('LAB_ID')}}" class="form-control" placeholder="Identificación Laboratorio">
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
            <span style="width: 130px;"class="input-group-addon">Carrera</span>
                <select style="width: 350px;" name="CAR_ID" class="form-control" >
                    @foreach($carreras as $car)
                        <option value="{{$car ->CAR_ID}}">{{$car ->NOMBRE}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                <span style="width: 130px;" class="input-group-addon">Nombre</span>
                <input type="text" name="NOMBRE" required value="{{old('NOMBRE')}}" class="form-control" placeholder="Nombre Laboratorio">
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
            <span style="width: 130px;"class="input-group-addon">Centro</span>
                <select  style="width: 350px;"  name="CENINV_ID" class="form-control" >
                    @foreach($centros as $cen)
                        <option value="{{$cen ->CENINV_ID}}">{{$cen ->NOMBRE}}</option>
                    @endforeach
                </select>
            </div>
        </div>


        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                <span style="width: 130px;" class="input-group-addon">Descripción</span>
                <textarea type="text" name="DESCRIPCION" required value="{{old('DESCRIPCION')}}" class="form-control" placeholder="Descripción Laboratorio"></textarea>
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
            <br>
                <label for="IMAGEN" >Imagen | Resolución maxima 1080 x 567 </label>
                <input style="width: 480px;" type="file" name="IMAGEN" class="form-control">
            </div>
        </div>
        
        <div class="col-lg-10 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
               <button class="btn btn-success" type="submit">Guardar</button>
               <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
        </div>

    </div>

    {!!Form::close()!!}    
@endsection