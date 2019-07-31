@extends ('layouts.plantilla')
@section('contenido')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Editar Investigador: {{$investigador->nombre}}</h3>
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
            {!!Form::model($investigador,['method'=>'PATCH','route'=>['investigador.update',$investigador->INV_ID],'files'=>'true'])!!}
            {{Form::token()}}
    <div class="row">
        <div class="col-lg-4 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="FOTO" >Foto</label>
                <input type="file" name="FOTO" class="form-control">
                @if(($investigador->FOTO)!=" ")
                    <img src="{{asset('imagenes/fotos/'.$investigador->FOTO)}}" alt="">
                @endif
            </div>
        </div>

        <div class="col-lg-4 col-sm-6 col-md-6 col-xs-12">
            <div  class="input-group ">
                <span style="width: 130px;" class="input-group-addon">Identificacion</span>
                <input type="text" name="INV_ID" required value="{{$investigador->INV_ID}}" class="form-control">
            </div>
        </div>

        <div class="col-lg-4 col-sm-6 col-md-6 col-xs-12">
            <div  class="input-group ">
                <span style="width: 130px;" class="input-group-addon">Tipo</span>
                <!--<input type="text" name="TIPO" required value="{{$investigador->TIPO}}" class="form-control">-->
                <select style="width: 212px;" name="TIPO" class="form-control" value="{{$investigador->TIPO}}">
                   
                    <option value="1" selected>Cédula</option>
                
                    <option value="0">Pasaporte</option>
                
                </select>
            </div>
        </div>

        <div class="col-lg-4 col-sm-6 col-md-6 col-xs-12">
            <div  class="input-group ">
                <span style="width: 130px;" class="input-group-addon">Nombre</span>
                <input type="text" name="NOMBRE" required value="{{$investigador->NOMBRE}}" class="form-control">
            </div>
        </div>
    
        <div class="col-lg-4 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group" >
                <span style="width:130px;" class="input-group-addon">Apellido</span>
                <input type="text" name="APELLIDO" required value="{{$investigador->APELLIDO}}" class="form-control ">
            </div>
        </div>
        
        <div class="col-lg-4 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                    <span style="width: 130px;"class="input-group-addon">Correo</span>
                    <input type="text" name="CORREOINST" required value="{{$investigador->CORREOINST}}" class="form-control" >
            </div>
        </div>
        
        <div class="col-lg-4 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                <span style="width: 130px;" class="input-group-addon">Grupos</span>
                <select style="width: 212px;" name="GRUP_ID" class="form-control " >
                    @foreach($grupos as $gru)
                        @if($gru->GRUP_ID==$investigador->GRUP_ID)
                        <option value="{{$gru->GRUP_ID}}" selected>{{$gru->NOMBRE}}</option>
                        @else
                        <option value="{{$gru->GRUP_ID}}">{{$gru->NOMBRE}}</option>    
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
 
        <div class="col-lg-4 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                    <span style="width: 130px;" class="input-group-addon">Linkedin</span>
                    <input type="text" name="URLLINKEDIN" required value="{{$investigador->URLLINKEDIN}}" class="form-control ">
            </div> 
        </div>

        <div class="col-lg-4 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                <span style="width: 130px;"class="input-group-addon">Categoría</span>
                <select style="width: 212px;" name="CATINV_ID" class="form-control" >
                    @foreach($categorias as $cat)
                        @if($cat->CATINV_ID==$investigador->CATINV_ID)
                        <option value="{{$cat ->CATINV_ID}}" selected>{{$cat ->NIVEL}}</option>
                        @else
                        <option value="{{$cat ->CATINV_ID}}" >{{$cat ->NIVEL}}</option>    
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        

        <div class="col-lg-4 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                    <span style="width: 130px;" class="input-group-addon">Research </span>
                    <input type="text" name="URLRESEARCH" required value="{{$investigador->URLRESEARCH}}" class="form-control ">
            </div>     
        </div>
        
        <div class="col-lg-4 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                <span style="width: 130px;"class="input-group-addon">Carrera</span>
                <select style="width: 212px;" name="CAR_ID" class="form-control " >
                    @foreach($carreras as $car)
                        @if($car->CAR_ID==$investigador->CAR_ID)
                        <option value="{{$car->CAR_ID}}" selected>{{$car->NOMBRE}}</option>
                        @else
                        <option value="{{$car->CAR_ID}}">{{$car->NOMBRE}}</option>   
                        @endif    
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-lg-4 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
            <span style="width: 130px;" class="input-group-addon">Biografia&nbsp </span>
                    <textarea style="width: 212px;" type="text" name="BIOGRAFIA" required value="{{$investigador->BIOGRAFIA}}" class="form-control " >{{$investigador->BIOGRAFIA}}</textarea>
            </div> 
        </div>
        
        <div class="col-lg-4 col-sm-6 col-md-6 col-xs-12" style="display:none">
            <div class="input-group">
            <span style="width: 130px;" class="input-group-addon">Video </span>
                    <textarea type="text" name="VIDEO"  value="{{$investigador->VIDEO}}" class="form-control " >{{$investigador->VIDEO}}</textarea>
            </div> 
        </div>
        <div class="col-lg-10 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
            <br>
               <button class="btn btn-success" type="submit">Guardar</button>
               <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
        </div>
    </div>
  

    {!!Form::close()!!}    
@endsection