@extends ('layouts.plantilla')
@section('contenido')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Editar Escuela: {{$escuela->NOMBRE}}</h3>
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
            {!!Form::model($escuela,['method'=>'PATCH','route'=>['escuelas.update',$escuela->ESC_ID]])!!}
            {{Form::token()}}
    <div class="row">
        
     
        <div class="col-lg-5 col-sm-6 col-md-6 col-xs-12" style="display:none">
            <div  class="input-group ">
                <span style="width: 130px;" class="input-group-addon">ID Escuela</span>
                <input type="text" name="ESC_ID" required value="{{$escuela->ESC_ID}}" class="form-control">
            </div>
        </div>

        <div class="col-lg-5 col-sm-6 col-md-6 col-xs-12">
            <div  class="input-group ">
                <span style="width: 130px;" class="input-group-addon">Nombre</span>
                <input type="text" name="NOMBRE" required value="{{$escuela->NOMBRE}}" class="form-control">
            </div>
        </div>
    
        <div class="col-lg-5 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group" >
                <span style="width:130px;" class="input-group-addon">Director</span>
                <input type="text" name="DIRECTOR" required value="{{$escuela->DIRECTOR}}" class="form-control ">
            </div>
        </div>
        
        <div class="col-lg-5 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                    <span style="width: 130px;"class="input-group-addon">Teléfono</span>
                    <input type="text" name="TELEFONO" required value="{{$escuela->TELEFONO}}" class="form-control" >
            </div>
        </div>

        <div class="col-lg-5 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                <span style="width: 130px;"class="input-group-addon">Facultad</span>
                <select style="width: 212px;" name="FAC_ID" class="form-control" >
                    @foreach($facultades as $fac)
                        @if($fac->FAC_ID==$escuela->FAC_ID)
                        <option value="{{$fac ->FAC_ID}}" selected>{{$fac ->NOMBRE}}</option>
                        @else
                        <option value="{{$fac ->FAC_ID}}" >{{$fac ->NOMBRE}}</option>    
                        @endif
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-lg-5 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                    <span style="width: 130px;"class="input-group-addon">Extensión</span>
                    <input type="text" name="EXTENSION" required value="{{$escuela->EXTENSION}}" class="form-control" >
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




