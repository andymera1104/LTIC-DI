{!!Form::open(array('action'=>array('LineasInvestigacionController@destroy',$lin->LININV_ID), 'method'=>'delete'))!!}
<div class=" modal fade modal-slide-in-right" id="modal-delete-{{$lin->LININV_ID}}" aria-hidden="true" role="dialog" tabindex="-1" >
    
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title">Eliminar Linea Investigación</h4>
            </div>
            <div class="modal-body">
                <p>Seguro desea Eliminar la Linea de Investigación <b>{{$lin->NOMBRE}}</b></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success" >Eliminar</button>
            </div>
        </div>
    </div>
</div>
{!!Form::Close()!!}
