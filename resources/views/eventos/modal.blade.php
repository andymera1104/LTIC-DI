<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$even->EVENT_ID}}">
    {{Form::Open(array('action'=>array('EventosController@destroy',$even->EVENT_ID),'method'=>'delete'))}}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title">Eliminar Evento</h4>
            </div>
            <div class="modal-body">
                <p>Seguro desea Eliminar Evento: <b>{{$even->TITULO}}</b></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success" >Eliminar</button>
            </div>
        </div>
    </div>
    {{Form::Close()}}
</div>