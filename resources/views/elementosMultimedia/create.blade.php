@extends ('layouts.plantilla')
@section('contenido')

    @if (session('alert'))
    <div class="alert alert-danger">
        {{ session('alert') }}
    </div>
    @endif
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Nuevo Elemento Multimedia</h3>
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
            {!!Form::open(array('url'=>'elementosMultimedia','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
            {{Form::token()}}


    <div class="row">
         <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                <span style="width: 130px;" class="input-group-addon">ID Elemento</span>
                <input type="text" name="ELEMMULT_ID" required value="{{old('ELEMMULT_ID')}}" class="form-control" placeholder="Id Elemento Multimedia">
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
            <span style="width: 130px;"class="input-group-addon">Centros</span>
                <select style="width: 260px;" name="CENINV_ID" class="form-control" >
                    @foreach($centros as $cen)
                        <option value="{{$cen ->CENINV_ID}}">{{$cen ->NOMBRE}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
            <span style="width: 130px;" class="input-group-addon">Video </span>
                    <textarea style="width: 212px;" type="text" name="VIDEO" required value="{{old('VIDEO')}}" class="form-control" placeholder="Ingrese URL Video"></textarea>
            </div> 
        </div>
        
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="FOTO" >Foto| Resolución maxima 1080 x 567</label>
                <input style="width: 390px;" type="file" name="FOTO" class="form-control">
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