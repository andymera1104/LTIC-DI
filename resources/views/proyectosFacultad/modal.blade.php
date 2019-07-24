{!!Form::open(array('action'=>array('ProyectosFacultadController@destroy',$pfac->facultad),'method'=>'delete'))!!}
<div class=" modal fade modal-slide-in-right" id="modal-delete-{{$pfac->facultad}}" aria-hidden="true" role="dialog" tabindex="-1" >
    
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title">Eliminar Proyecto/Facultad</h4>
            </div>
            <div class="modal-body">
                <p>Seguro desea Eliminar el Proyecto/Facultad: <b>{{$pfac->facultad}}</b></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success" >Eliminar</button>
            </div>
        </div>
    </div>
</div>
{!!Form::Close()!!}
