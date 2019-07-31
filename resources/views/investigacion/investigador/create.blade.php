@extends ('layouts.plantilla')
@section('contenido')



@if (session('alert'))
    <div class="alert alert-danger">
        {{ session('alert') }}
    </div>
    @endif
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Nuevo Investigador</h3>
            @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

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
            {!!Form::open(array('url'=>'investigacion/investigador','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
            {{Form::token()}}
    <div class="row">

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                <span style="width: 130px;" class="input-group-addon">Tipo</span>
                <!--
                <input type="text" name="TIPO" required value="{{old('TIPO')}}" class="form-control" placeholder="Tipo 1:Cédula 0:Pasaporte" min:1 max:2>-->
                <select style="width: 212px;" name="TIPO" class="form-control" value="{{old('TIPO')}}">
                    <option value="1">Cédula</option>
                    <option value="0">Pasaporte</option>
                </select>
            </div>
        </div>

         <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                <span style="width: 130px;" class="input-group-addon">Identificación</span>
                <input type="text" maxlength="10" name="INV_ID" id="INV_ID" required value="{{old('INV_ID')}}" class="form-control" placeholder="Identificación Investigador" onKeyUp="validar()">
                <div id="salida"></div>
            </div>
        </div>


        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                <span style="width: 130px;" class="input-group-addon">Nombre</span>
                <input type="text" name="NOMBRE" required value="{{old('NOMBRE')}}" class="form-control" placeholder="Nombre Investigador">
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                    <span style="width:130px;" class="input-group-addon">Apellido</span>
                    <input type="text" name="APELLIDO" required value="{{old('APELLIDO')}}" class="form-control" placeholder="Apellido Investigador">
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
                    <span style="width: 130px;"class="input-group-addon">Correo</span>
                    <input type="text" name="CORREOINST" required value="{{old('CORREOINST')}}" class="form-control" placeholder="Correo Investigador">
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
            <span style="width: 130px;" class="input-group-addon">Research </span>
                    <input type="text" name="URLRESEARCH" required value="{{old('URLRESEARCH')}}" class="form-control" placeholder="Url Research Investigador">
            </div>     
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
            <span style="width: 130px;" class="input-group-addon">Linkedin</span>
                    <input type="text" name="URLLINKEDIN" required value="{{old('URLLINKEDIN')}}" class="form-control" placeholder="Url LinkedIn Investigador">
            </div> 
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
            <span style="width: 130px;" class="input-group-addon">Biografia</span>
                    <textarea style="width: 212px;" type="text" name="BIOGRAFIA" required value="{{old('BIOGRAFIA')}}" class="form-control" placeholder="Biografia Investigador"></textarea>
            </div> 
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" style="display">
            <div class="input-group">
            <span style="width: 130px;" class="input-group-addon">Video </span>
                    <textarea style="width: 212px;" type="text" name="VIDEO"  value="{{old('VIDEO')}}" class="form-control" placeholder="Ingrese URL Video"></textarea>
            </div> 
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
            <span style="width: 130px;"class="input-group-addon">Categoría</span>
                <select style="width: 212px;" name="CATINV_ID" class="form-control" >
                    @foreach($categorias as $cat)
                        <option value="{{$cat ->CATINV_ID}}">{{$cat ->NIVEL}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
            <span style="width: 130px;" class="input-group-addon">Grupos</span>
                <select style="width: 212px;" name="GRUP_ID" class="form-control" >
                    @foreach($grupos as $gru)
                        <option value="{{$gru->GRUP_ID}}">{{$gru->NOMBRE}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="input-group">
            <span style="width: 130px;"class="input-group-addon">Carrera</span>
                <select style="width: 212px;"name="CAR_ID" class="form-control" >
                    @foreach($carreras as $car)
                        <option value="{{$car->CAR_ID}}">{{$car->NOMBRE}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="FOTO" >Foto | Resolución maxima 1080 x 567 </label>
                <input style="width: 340px;" type="file" name="FOTO" class="form-control">
            </div>
        </div>
        
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
               <button class="btn btn-success" type="submit">Guardar</button>
               <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
        </div>

    </div>


    {!!Form::close()!!}  

	<script type="text/javascript">
      function validar() {
        var cad = document.getElementById("INV_ID").value.trim();
        var total = 0;
        var longitud = cad.length;
        var longcheck = longitud - 1;

        if (cad !== "" && longitud === 10){
          for(i = 0; i < longcheck; i++){
            if (i%2 === 0) {
              var aux = cad.charAt(i) * 2;
              if (aux > 9) aux -= 9;
              total += aux;
            } else {
              total += parseInt(cad.charAt(i)); // parseInt o concatenará en lugar de sumar
            }
          }

          total = total % 10 ? 10 - total % 10 : 0;

          if (cad.charAt(longitud-1) == total) {
            document.getElementById("salida").innerHTML = ("Cedula Válida");
          }else{
            document.getElementById("salida").innerHTML = ("Cedula Inválida");
          }
        }
      }
    </script>

    
   
@endsection