@extends ('layouts.plantilla')
@section('contenido')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Editar Noticia: {{$noticia->TITULO}}</h3>
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
            {!!Form::model($noticia,['method'=>'PATCH','route'=>['noticias.update',$noticia->NOT_ID],'files'=>'true'])!!}
            {{Form::token()}}
    <div class="row">
        
         <div class="col-lg-5 col-sm-6 col-md-6 col-xs-12" style="display:none">
            <div  class="input-group ">
                <span style="width: 130px;" class="input-group-addon">ID Noticia</span>
                <input type="text" name="NOT_ID" required value="{{$noticia->NOT_ID}}" class="form-control">
            </div>
        </div>

        
        <div class="col-lg-5 col-sm-6 col-md-6 col-xs-12">
            <div  class="input-group ">
                <span style="width: 130px;" class="input-group-addon">Título</span>
                <input type="text" name="TITULO" required value="{{$noticia->TITULO}}" class="form-control">
            </div>
        </div>
            
        <div class="col-lg-5 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group" >
                <span style="width:130px;" class="input-group-addon">Resumen</span>
                <textarea type="text" name="RESUMEN" required value="{{$noticia->RESUMEN}}" class="form-control ">{{$noticia->RESUMEN}}</textarea>
            </div>
        </div>

        <div class="col-lg-5 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                    <span style="width: 130px;"class="input-group-addon">Fecha</span>
                    <input type="date" name="FECHA"  value="{{$noticia->FECHA}}" class="form-control" >
            </div>
        </div>
        
        <div class="col-lg-4 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="IMAGEN" >Imagen</label>
                <input type="file" name="IMAGEN" class="form-control">
                @if(($noticia->IMAGEN)!=" ")
                    <img src="{{asset('imagenes/noticias/'.$noticia->IMAGEN)}}" alt="Imagen Notica">
                @endif
            </div>
        </div>

        <div class="col-lg-5 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group" >
                <span style="width:130px;" class="input-group-addon">Noticia</span>
                <textarea type="text" name="NOTICIA" required value="{{$noticia->NOTICIA}}" class="form-control ">{{$noticia->NOTICIA}}</textarea>
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




