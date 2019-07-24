@extends ('layouts.plantilla')
@section('contenido')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Editar Publicación NO-Proyecto: {{$noproy->TITULO}}</h3>
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
            {!!Form::model($noproy,['method'=>'PATCH','route'=>['publicaciones_noproyectos.update',$noproy->PUBLNOPROY_ID]])!!}
            {!!Form::token()!!}
    <div class="row">
      
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" style="display:none">
            <div  class="input-group ">
                <span style="width: 130px;" class="input-group-addon">ID Publicación</span>
                <input type="text" name="PUBLNOPROY_ID" required value="{{$noproy->PUBLNOPROY_ID}}" class="form-control">
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                <span style="width: 130px;" class="input-group-addon">Áreas</span>
                <select style="width: 250px;" name="AREA_ID" class="form-control " >
                    @foreach($areas as $area)
                        @if($area->AREA_ID==$noproy->AREA_ID)
                        <option value="{{$area->AREA_ID}}" selected>{{$area->NOMBRE}}</option>
                        @else
                        <option value="{{$area->AREA_ID}}">{{$area->NOMBRE}}</option>    
                        @endif
                    @endforeach
                </select>
            </div>
        </div>


        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                    <span style="width: 130px;" class="input-group-addon">Tipo </span>
                    <input type="text" name="TIPO" required value="{{$noproy->TIPO}}" class="form-control ">
            </div>     
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group" >
                <span style="width:130px;" class="input-group-addon">Título</span>
                <input style="width: 250px;" type="text" name="TITULO" required value="{{$noproy->TITULO}}" class="form-control ">
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                    <span style="width: 130px;" class="input-group-addon">Fecha</span>
                    <input style="width: 212px;" type="date" name="FECHAPUB" required value="{{$noproy->FECHAPUB}}" class="form-control ">
            </div> 
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                    <span style="width: 130px;" class="input-group-addon">Revista </span>
                    <input style="width: 250px;" type="text" name="REVISTA" required value="{{$noproy->REVISTA}}" class="form-control ">
            </div>     
        </div>

        
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                    <span style="width: 130px;"class="input-group-addon">Abstract</span>
                    <textarea style="width: 212px;" type="text" name="ABSTRACT" required value="{{$noproy->ABSTRACT}}" class="form-control" >{{$noproy->ABSTRACT}}</textarea>
            </div>
        </div>


        
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                    <span style="width: 130px;" class="input-group-addon">Nivel </span>
                    <input style="width: 250px;" type="text" name="NIVEL" required value="{{$noproy->NIVEL}}" class="form-control ">
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