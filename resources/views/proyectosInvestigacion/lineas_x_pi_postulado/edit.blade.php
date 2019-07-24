
@extends ('layouts.plantilla')
@section('contenido')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Editar Proyecto Investigación: {{$lp->POST_ID}}</h3>
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
            {!!Form::model($lp,['method'=>'PATCH','route'=>['lineas_x_pi_postulado.update',$lp->POST_ID]])!!}
            {{Form::token()}}
    <div class="row">
        
         <div class="col-lg-4 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                <span style="width: 130px;" class="input-group-addon">ID Proyecto</span>
                <select name="POST_ID" class="form-control " >
                    @foreach($pipost as $pip)
                        @if($pip->POST_ID==$lp->POST_ID)
                        <option value="{{$pip ->POST_ID}}"selected >{{$pip ->POST_ID}}</option>
                        @else
                        <option value="{{$pip ->POST_ID}}" >{{$pip ->POST_ID}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                <span style="width: 130px;" class="input-group-addon">Lineas</span>
                <select name="LININV_ID" class="form-control " >
                    @foreach($lineas as $lin)
                        @if($lin->LININV_ID==$lp->LININV_ID)
                        <option value="{{$lin ->LININV_ID}}"selected >{{$lin ->NOMBRE}}</option>
                        @else
                        <option value="{{$lin ->LININV_ID}}" >{{$lin ->NOMBRE}}</option>
                        @endif
                    @endforeach
                </select>
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
