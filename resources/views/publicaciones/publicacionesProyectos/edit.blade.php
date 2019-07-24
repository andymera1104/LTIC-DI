@extends ('layouts.plantilla')
@section('contenido')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Editar Publicación Proyecto: {{$publicacion->TITULO}}</h3>
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
            {!!Form::model($publicacion,['method'=>'PATCH','route'=>['publicacionesProyectos.update',$publicacion->PUBL_ID]])!!}
            {!!Form::token()!!}
    <div class="row">
      
      
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group" >
                <span style="width:130px;" class="input-group-addon">Título</span>
                <input type="text" name="TITULO" required value="{{$publicacion->TITULO}}" class="form-control ">
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" style="display:none">
            <div  class="input-group ">
                <span style="width: 130px;" class="input-group-addon">ID Publicación</span>
                <input type="text" name="PUBL_ID" required value="{{$publicacion->PUBL_ID}}" class="form-control">
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                <span style="width: 130px;" class="input-group-addon">Áreas</span>
                <select style="width: 250px;" name="AREA_ID" class="form-control " >
                    @foreach($areas as $area)
                        @if($area->AREA_ID==$publicacion->AREA_ID)
                        <option value="{{$area->AREA_ID}}" seleceted>{{$area->NOMBRE}}</option>
                        @else
                        <option value="{{$area->AREA_ID}}">{{$area->NOMBRE}}</option>    
                        @endif
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                    <span style="width: 130px;" class="input-group-addon">Nivel </span>
                    <input type="text" name="NIVEL" required value="{{$publicacion->NIVEL}}" class="form-control ">
            </div>     
        </div>


        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                <span style="width: 130px;" class="input-group-addon">Facultad</span>
                <select style="width: 250px;" name="FAC_ID" class="form-control " >
                    @foreach($facultades as $fac)
                        @if($fac->FAC_ID==$publicacion->FAC_ID)
                        <option value="{{$fac->FAC_ID}}" selected>{{$fac->FAC_ID}}</option>
                        @else
                        <option value="{{$fac->FAC_ID}}">{{$fac->FAC_ID}}</option>    
                        @endif
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                    <span style="width: 130px;" class="input-group-addon">Revista </span>
                    <input type="text" name="REVISTA" required value="{{$publicacion->REVISTA}}" class="form-control ">
            </div>     
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                <span style="width: 130px;" class="input-group-addon">Proyecto</span>
                <select style="width: 250px;" name="POST_ID" class="form-control " >
                    @foreach($proyectos as $pro)
                        @if($pro->POST_ID==$publicacion->POST_ID)
                        <option value="{{$pro->POST_ID}}" seleceted>{{$pro->POST_ID}}</option>
                        @else
                        <option value="{{$pro->POST_ID}}">{{$pro->POST_ID}}</option>    
                        @endif
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                    <span style="width: 130px;" class="input-group-addon">Tipo </span>
                    <input type="text" name="TIPO" required value="{{$publicacion->TIPO}}" class="form-control ">
            </div>     
        </div>
        
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                    <span style="width: 130px;" class="input-group-addon">Fecha</span>
                    <input style="width: 250px;" type="date" name="FECHAPUB" required value="{{$publicacion->FECHAPUB}}" class="form-control ">
            </div> 
        </div>
        
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                    <span style="width: 130px;"class="input-group-addon">Abstract</span>
                    <textarea style="width: 212px;" type="text" name="ABSTRACT" required value="{{$publicacion->ABSTRACT}}" class="form-control" >{{$publicacion->ABSTRACT}}</textarea>
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


