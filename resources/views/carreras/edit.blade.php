@extends ('layouts.plantilla')
@section('contenido')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Editar Carrera: {{$carrera->NOMBRE}}</h3>
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
            {!!Form::model($carrera,['method'=>'PATCH','route'=>['carreras.update',$carrera->CAR_ID]])!!}
            {{Form::token()}}
    <div class="row">
        
        <div class="col-lg-5 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                <span style="width: 130px;"class="input-group-addon">Escuela</span>
                <select style="width: 212px;" name="ESC_ID" class="form-control" >
                    @foreach($escuelas as $esc)
                        @if($esc->ESC_ID==$carrera->ESC_ID)
                        <option value="{{$esc ->ESC_ID}}" selected>{{$esc ->NOMBRE}}</option>
                        @else
                        <option value="{{$esc ->ESC_ID}}" >{{$esc ->NOMBRE}}</option>    
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        
        <div class="col-lg-5 col-sm-6 col-md-6 col-xs-12" style="display:none">
            <div  class="input-group ">
                <span style="width: 130px;" class="input-group-addon">ID Carrera</span>
                <input type="text" name="CAR_ID" required value="{{$carrera->CAR_ID}}" class="form-control">
            </div>
        </div>

        <div class="col-lg-5 col-sm-6 col-md-6 col-xs-12">
            <div  class="input-group ">
                <span style="width: 130px;" class="input-group-addon">Nombre</span>
                <input type="text" name="NOMBRE" required value="{{$carrera->NOMBRE}}" class="form-control">
            </div>
        </div>
    
        <div class="col-lg-5 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group" >
                <span style="width:130px;" class="input-group-addon">Coordinador</span>
                <input type="text" name="COORDINADOR" required value="{{$carrera->COORDINADOR}}" class="form-control ">
            </div>
        </div>
        
        <div class="col-lg-5 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                    <span style="width: 130px;"class="input-group-addon">Teléfono</span>
                    <input type="text" name="TELEFONO" required value="{{$carrera->TELEFONO}}" class="form-control" >
            </div>
        </div>

        <div class="col-lg-5 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                    <span style="width: 130px;"class="input-group-addon">Extensión</span>
                    <input type="text" name="EXTENSION" required value="{{$carrera->EXTENSION}}" class="form-control" >
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




