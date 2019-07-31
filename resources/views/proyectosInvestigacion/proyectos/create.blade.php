@extends ('layouts.plantilla')
@section('contenido')
@if (session('alert'))
    <div class="alert alert-danger">
        {{ session('alert') }}
    </div>
    @endif
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Nuevo Proyecto Investigación</h3>
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
            {!!Form::open(array('url'=>'proyectosInvestigacion/proyectos','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
            {{Form::token()}}


    <div class="row">
       

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" >
            <div class="input-group">
            <span style="width: 130px;"class="input-group-addon">Proyecto</span>
                <select  style="width:212px;" name="POST_ID" class="form-control" >
                    @foreach($pipo as $pip)
                        <option value="{{$pip ->POST_ID}}">{{$pip ->NOMBRE}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                    <span style="width:130px;" class="input-group-addon">Descripción</span>
                    <textarea style="width:212px;"  type="text" name="DESCRIPCION"  required value="{{old('DESCRIPCION')}}" class="form-control" placeholder="Descripción deL Proyecto"> {{old('DESCRIPCION')}}</textarea>
            </div>
        </div>
        
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" >
            <div class="input-group">
            <span style="width: 130px;"class="input-group-addon">Programa</span>
                <select  style="width:212px;" name="PROG_ID" class="form-control" >
                    @foreach($programa as $prog)
                        <option value="{{$prog ->PROG_ID}}">{{$prog ->DESCRIPCION}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" >
            <div class="input-group">
            <span style="width: 130px;"class="input-group-addon">Director</span>
                <select  style="width:212px;" name="DIRECTOR" class="form-control" >
                    @foreach($inves as $inv)
                        <option value="{{$inv ->INV_ID}}">{{$inv ->NOMBRE}} {{$inv ->APELLIDO}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
            <span style="width: 130px;" class="input-group-addon">Video </span>
                    <input type="text" name="VIDEO"  value="{{old('VIDEO')}}" class="form-control" placeholder="Ingrese URL Video">
            </div> 
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="IMAGEN" >Imagen | Resolución maxima 1080 x 567</label>
                <input type="file" name="IMAGEN" class="form-control" style="width:260px;">
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