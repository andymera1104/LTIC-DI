{!!Form::open(array('url'=>'elementosMultimediaC','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}
<div class="form-group float-right">
    <div class="input-group">
        <input type="text" class="form-control" name="searchText" placeholder="Buscar..." value="{{$searchText}}">
        @if(isset($searchText) )
        <span class="input-group-btn" style="display:none">
                <button type="submit" class="btn btn-info"><i class="fa fa-search" aria-hidden="true" ></i> Buscar</button>
            </span>
     
        @endif  
    </div>
</div>