@extends ('layouts.plantilla')
@section('contenido')

    @if (session('alert'))
    <div class="alert alert-danger">
        {{ session('alert') }}
    </div>
    @endif
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Nuevo Evento</h3>
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
            {!!Form::open(array('url'=>'eventos','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}

    <div class="row">
       
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                <span style="width: 130px;" class="input-group-addon">ID Evento</span>
                <input type="text" name="EVENT_ID" required value="{{old('EVENT_ID')}}" class="form-control" placeholder="ID Evento">
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                <span style="width: 130px;" class="input-group-addon">Título</span>
                <input type="text" name="TITULO" required value="{{old('TITULO')}}" class="form-control" placeholder="Título Evento">
            </div>
        </div>


        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
            <span style="width: 130px;" class="input-group-addon">Fecha Inicio </span>
                    <input style="width: 212px;"  type="date" name="FECHA_INICIO" required value="{{old('FECHA_INICIO')}}" class="form-control" placeholder="Ingrese Fecha Inicio">
            </div> 
        </div>
        
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
            <span style="width: 130px;" class="input-group-addon">Lugar </span>
                    <input type="text" name="LUGAR" required value="{{old('LUGAR')}}" class="form-control" placeholder="Ingrese Lugar">
            </div> 
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
            <span style="width: 130px;" class="input-group-addon">Fecha Fin </span>
                    <input style="width: 212px;" type="date" name="FECHA_FIN" required value="{{old('FECHA_FIN')}}" class="form-control" placeholder="Ingrese Fecha Fin">
            </div> 
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                    <span style="width:130px;" class="input-group-addon">Descripción</span>
                    <textarea style="width: 212px;" type="text" name="DESCRIPCION" required value="{{old('DESCRIPCION')}}" class="form-control" placeholder="Descripcion del Evento"></textarea>
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