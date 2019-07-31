@extends ('layouts.plantilla')
@section('contenido')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Editar Proyecto Investigación: {{$proinv->NOMBRE}}</h3>
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
            {!!Form::model($proinv,['method'=>'PATCH','route'=>['proyectos.update',$proinv->POST_ID],'files'=>'true'])!!}
            {{Form::token()}}
    <div class="row">
        
         <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" style="display:none">
            <div class="input-group">
                <span style="width: 130px;" class="input-group-addon">ID Proyecto</span>
                <select name="POST_ID" class="form-control " >
                    @foreach($pipo as $pip)
                        @if($pip->POST_ID==$proinv->POST_ID)
                        <option value="{{$pip ->POST_ID}}"selected >{{$pip ->POST_ID}}</option>
                        @else
                        <option value="{{$pip ->POST_ID}}" >{{$pip ->POST_ID}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
    
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group" >
                <span style="width:130px;" class="input-group-addon">Descripción</span>
                <textarea style="width: 250px;" type="text" name="DESCRIPCION" required value="{{$proinv->DESCRIPCION}}" class="form-control ">{{$proinv->DESCRIPCION}}</textarea>
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                <span style="width: 130px;" class="input-group-addon">Programa</span>
                <select style="width: 212px;" name="PROG_ID" class="form-control " >
                    @foreach($programa as $prog)
                        @if($prog->PROG_ID==$proinv->PROG_ID)
                        <option value="{{$prog ->PROG_ID}}"selected >{{$prog ->PROG_ID}}</option>
                        @else
                        <option value="{{$prog ->PROG_ID}}" >{{$prog ->PROG_ID}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
          
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
            <span style="width: 130px;" class="input-group-addon">Video </span>
                    <textarea style="width: 212px;" type="text" name="VIDEO" required value="{{$proinv->VIDEO}}" class="form-control " >{{$proinv->VIDEO}}</textarea>
            </div> 
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" >
            <div class="input-group">
            <span style="width: 130px;"class="input-group-addon">Director</span>
                <select  style="width:212px;" name="DIRECTOR" class="form-control" >
                    @foreach($inves as $inv)
                        @if($inv->INV_ID==$proinv->DIRECTOR)
                        <option value="{{$inv ->INV_ID}}" selected>{{$inv ->NOMBRE}} {{$inv ->APELLIDO}}</option>
                        @else
                        <option value="{{$inv ->INV_ID}}" >{{$inv ->NOMBRE}} {{$inv ->APELLIDO}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
       

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="IMAGEN" >Imagen | Resolución maxima 1080 x 567</label>
                <input style="width: 380px;" type="file" name="IMAGEN" class="form-control">
                <br>
                @if(($proinv->IMAGEN)!=" ")
                    <img src="{{asset('imagenes/proyectos/'.$proinv->IMAGEN)}}" alt="">
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