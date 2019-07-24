@extends ('layouts.plantilla')
@section('contenido')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Editar Linea Investigación: {{$lineas->NOMBRE}}</h3>
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
            {!!Form::model($lineas,['method'=>'PATCH','route'=>['lineasInvestigacion.update',$lineas->LININV_ID],'files'=>'true'])!!}
            {{Form::token()}}
    <div class="row">
        
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" style="display:none">
            <div  class="input-group ">
                <span style="width: 130px;" class="input-group-addon">ID Linea</span>
                <input type="text" name="LININV_ID" required value="{{$lineas->LININV_ID}}" class="form-control">
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div  class="input-group ">
                <span style="width: 130px;" class="input-group-addon">Nombre</span>
                <input type="text" name="NOMBRE" required value="{{$lineas->NOMBRE}}" class="form-control">
            </div>
        </div>

    
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group" >
                <span style="width:130px;" class="input-group-addon">Descripción</span>
                <textarea style="width: 425px;" type="text" name="DESCRIPCION" required value="{{$lineas->DESCRIPCION}}" class="form-control ">{{$lineas->DESCRIPCION}}</textarea>
                
            </div>
            <br>
        </div>
          
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
            <span style="width: 130px;" class="input-group-addon">Video </span>
                    <textarea style="width: 212px;" type="text" name="VIDEO" required value="{{$lineas->VIDEO}}" class="form-control " >{{$lineas->VIDEO}}</textarea>
            </div> 
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                <span style="width: 130px;" class="input-group-addon">Dominios</span>
                <select name="DOM_ID" class="form-control " >
                    @foreach($dominios as $dom)
                        @if($dom->DOM_ID==$lineas->DOM_ID)
                        <option value="{{$dom->DOM_ID}}" selected>{{$dom->NOMBRE}}</option>
                        @else
                        <option value="{{$dom->DOM_ID}}">{{$dom->NOMBRE}}</option>    
                        @endif
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="IMAGEN" >Imagen</label>
                <input type="file" name="IMAGEN" class="form-control">
                @if(($lineas->IMAGEN)!=" ")
                    <img src="{{asset('imagenes/lineasInvestigacion/'.$lineas->IMAGEN)}}" alt="Imagen Lineas Investigación">
                @endif
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