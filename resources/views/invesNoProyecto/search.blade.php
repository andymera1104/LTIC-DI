{!!Form::open(array('url'=>'invesNoProyecto','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}
<div class="form-group">
    <div class="input-group">
        <input type="text" class="form-control" name="searchText" placeholder="Buscar..." value="{{$searchText}}">
            <span class="input-group-btn">
                <button type="submit" class="btn btn-info"><i class="fa fa-search" aria-hidden="true"></i> Buscar</button>
            </span>
    </div>
</div>