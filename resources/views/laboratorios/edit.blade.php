@extends ('layouts.plantilla')
@section('contenido')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Editar Laboratorio: {{$laboratorio->NOMBRE}}</h3>
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
            {!!Form::model($laboratorio,['method'=>'PATCH','route'=>['laboratorios.update',$laboratorio->LAB_ID],'files'=>'true'])!!}
            {{Form::token()}}
    <div class="row">
        

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" style="display:none">
            <div  class="input-group ">
                <span style="width: 130px;" class="input-group-addon">ID Laboratorio</span>
                <input type="text" name="LAB_ID" required value="{{$laboratorio->LAB_ID}}" class="form-control">
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                <span style="width: 130px;" class="input-group-addon">Carrera</span>
                <select name="CAR_ID" class="form-control " >
                    @foreach($carreras as $car)
                        @if($car->CAR_ID==$laboratorio->CAR_ID)
                        <option value="{{$car->CAR_ID}}" selected>{{$car->NOMBRE}}</option>
                        @else
                        <option value="{{$car->CAR_ID}}">{{$car->NOMBRE}}</option>    
                        @endif
                    @endforeach
                </select>
            </div>
        </div>



        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div  class="input-group ">
                <span style="width: 130px;" class="input-group-addon">Nombre</span>
                <input type="text" name="NOMBRE" required value="{{$laboratorio->NOMBRE}}" class="form-control">
            </div>
        </div>

        
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                <span style="width: 130px;" class="input-group-addon">Centro</span>
                <select name="CENINV_ID" class="form-control " >
                    @foreach($centros as $cen)
                        @if($cen->CENINV_ID==$laboratorio->CENINV_ID)
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
            <span style="width: 130px;" class="input-group-addon">Descripción </span>
                    <textarea type="text" name="DESCRIPCION" required value="{{$laboratorio->DESCRIPCION}}" class="form-control " >{{$laboratorio->DESCRIPCION}}</textarea>
            </div> 
        </div>


        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="IMAGEN" >Imagen</label>
                <input type="file" name="IMAGEN" class="form-control">
                @if(($laboratorio->IMAGEN)!=" ")
                    <img src="{{asset('imagenes/laboratorios/'.$laboratorio->IMAGEN)}}" alt="">
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