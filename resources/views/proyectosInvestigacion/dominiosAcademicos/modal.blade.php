<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$dom->DOM_ID}}">
    {{Form::Open(array('action'=>array('DominiosAcademicosController@destroy',$dom->DOM_ID),'method'=>'delete'))}}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title">Eliminar Dominio Académico</h4>
            </div>
            <div class="modal-body">
                <p>Seguro desea Eliminar el Dominio Académico<b>{{$dom->NOMBRE}}</b></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success" >Eliminar</button>
            </div>
        </div>
    </div>
    {{Form::Close()}}
</div>