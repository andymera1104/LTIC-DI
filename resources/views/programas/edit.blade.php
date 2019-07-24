@extends ('layouts.plantilla')
@section('contenido')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Editar Programa: {{$programa->PROG_ID}}</h3>
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
            {!!Form::model($programa,['method'=>'PATCH','route'=>['programas.update',$programa->PROG_ID]])!!}
            {{Form::token()}}
    <div class="row">
        
         <div class="col-lg-5 col-sm-6 col-md-6 col-xs-12" style="display:none">
            <div  class="input-group ">
                <span style="width: 130px;" class="input-group-addon">ID Programa</span>
                <input type="text" name="PROG_ID" required value="{{$programa->PROG_ID}}" class="form-control">
            </div>
        </div>
    
        <div class="col-lg-5 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group" >
                <span style="width:130px;" class="input-group-addon">Descripción</span>
                <textarea type="text" name="DESCRIPCION" required value="{{$programa->DESCRIPCION}}" class="form-control ">{{$programa->DESCRIPCION}}</textarea>
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




