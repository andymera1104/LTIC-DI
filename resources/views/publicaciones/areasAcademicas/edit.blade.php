@extends ('layouts.plantilla')
@section('contenido')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Editar Área Académica: {{$area->NOMBRE}}</h3>
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
            {!!Form::model($area,['method'=>'PATCH','route'=>['areasAcademicas.update',$area->AREA_ID],'files'=>'true'])!!}
            {{Form::token()}}
    <div class="row">
        
         <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" style="display:none" >
            <div  class="input-group ">
                <span style="width: 130px;" class="input-group-addon">ID Área</span>
                <input type="text" name="AREA_ID" required value="{{$area->AREA_ID}}" class="form-control">
            </div>
        </div>
        
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div  class="input-group ">
                <span style="width: 130px;" class="input-group-addon">Nombre</span>
                <input type="text" name="NOMBRE" required value="{{$area->NOMBRE}}" class="form-control">
            </div>
        </div>

        
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                    <span style="width: 130px;"class="input-group-addon">Video</span>
                    <input type="text" name="VIDEO"  value="{{$area->VIDEO}}" class="form-control" >
            </div>
        </div>
    
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group" >
                <span style="width:130px;" class="input-group-addon">Descripción</span>
                <textarea style="width: 212px;" type="text" name="DESCRIPCION" required value="{{$area->DESCRIPCION}}" class="form-control ">{{$area->DESCRIPCION}}</textarea>
            </div>
        </div>


        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="IMAGEN" >Imagen | Resolución maxima 1080 x 567</label>
                <input style="width: 340px;" type="file" name="IMAGEN" class="form-control">
                <br>
                @if(($area->IMAGEN)!=" ")
                    <img src="{{asset('imagenes/areas/'.$area->IMAGEN)}}" alt="Imagen Área">
                @endif
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




