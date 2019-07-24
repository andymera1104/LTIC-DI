@extends ('layouts.plantilla')
@section('contenido')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Editar Evento: {{$evento->TITULO}}</h3>
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
            {!!Form::model($evento,['method'=>'PATCH','route'=>['eventos.update',$evento->EVENT_ID]])!!}
            {{Form::token()}}
    <div class="row">
        
         <div class="col-lg-5 col-sm-6 col-md-6 col-xs-12" style="display:none">
            <div  class="input-group ">
                <span style="width: 130px;" class="input-group-addon">ID Evento</span>
                <input type="text" name="EVENT_ID" required value="{{$evento->EVENT_ID}}" class="form-control">
            </div>
        </div>

        <div class="col-lg-5 col-sm-6 col-md-6 col-xs-12">
            <div  class="input-group ">
                <span style="width: 130px;" class="input-group-addon">Título</span>
                <input type="text" name="TITULO" required value="{{$evento->TITULO}}" class="form-control">
            </div>
        </div>

        <div class="col-lg-5 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                    <span style="width: 130px;"class="input-group-addon">Fecha Inicio</span>
                    <input type="date" name="FECHA_INICIO"  value="{{$evento->FECHA_INICIO}}" class="form-control" >
            </div>
        </div>
    
        <div class="col-lg-5 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                    <span style="width: 130px;"class="input-group-addon"> Lugar</span>
                    <input type="text" name="LUGAR"  value="{{$evento->LUGAR}}" class="form-control" >
            </div>
        </div>

        <div class="col-lg-5 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                    <span style="width: 130px;"class="input-group-addon">Fecha Fin</span>
                    <input type="date" name="FECHA_FIN"  value="{{$evento->FECHA_FIN}}" class="form-control" >
            </div>
        </div>

        <div class="col-lg-5 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group" >
                <span style="width:130px;" class="input-group-addon">Descripción</span>
                <textarea style="width: 212px;" type="text" name="DESCRIPCION" required value="{{$evento->DESCRIPCION}}" class="form-control ">{{$evento->DESCRIPCION}}</textarea>
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




