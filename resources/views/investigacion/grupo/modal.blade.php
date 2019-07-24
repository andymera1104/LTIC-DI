<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$gru->GRUP_ID}}">
    {{Form::Open(array('action'=>array('GrupoController@destroy',$gru->GRUP_ID), 'method'=>'delete'))}}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title">Eliminar Grupo</h4>
            </div>
            <div class="modal-body">
                <p>Seguro desea Eliminar el Grupo <b>{{$gru->NOMBRE}}</b></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success" >Eliminar</button>
            </div>
        </div>
    </div>
    {{Form::close()}}
</div>