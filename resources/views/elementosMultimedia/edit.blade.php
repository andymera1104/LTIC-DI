@extends ('layouts.plantilla')
@section('contenido')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Editar Elemento Multimedia: {{$elemento->ELEMMULT_ID}}</h3>
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
            {!!Form::model($elemento,['method'=>'PATCH','route'=>['elementosMultimedia.update',$elemento->ELEMMULT_ID],'files'=>'true'])!!}
            {{Form::token()}}
    <div class="row">
        
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" style="display:none">
            <div  class="input-group ">
                <span style="width: 130px;" class="input-group-addon">ID Elemento Multimedia</span>
                <input type="text" name="ELEMMULT_ID" required value="{{$elemento->ELEMMULT_ID}}" class="form-control">
            </div>
        </div>

         <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                <span style="width: 130px;" class="input-group-addon">Centros</span>
                <select style="width: 350px;" name="CENINV_ID" class="form-control " >
                    @foreach($centros as $cen)
                        @if($cen->CENINV_ID==$elemento->CENINV_ID)
                        <option value="{{$cen->CENINV_ID}}" selected>{{$cen->NOMBRE}}</option>
                        @else
                        <option value="{{$cen->CENINV_ID}}">{{$cen->NOMBRE}}</option>    
                        @endif
                    @endforeach
                </select>
            </div>
        </div>


        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
            <span style="width: 130px;" class="input-group-addon">Video </span>
                    <textarea type="text" name="VIDEO" required value="{{$elemento->VIDEO}}" class="form-control " >{{$elemento->VIDEO}}</textarea>
            </div> 
        </div>
        
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="FOTO" >Foto | Resolución maxima 1080 x 567</label>
                <input style="width: 480px;" type="file" name="FOTO" class="form-control">
                <br>
                @if(($elemento->FOTO)!=" ")
                    <img src="{{asset('imagenes/elementosMultimedia/'.$elemento->FOTO)}}" alt="Imagen Elemento Multimedia">
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