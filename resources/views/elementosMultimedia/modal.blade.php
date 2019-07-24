{!!Form::open(array('action'=>array('ElementosMultimediaController@destroy',$elem->ELEMMULT_ID), 'method'=>'delete'))!!}
<div class=" modal fade modal-slide-in-right" id="modal-delete-{{$elem->ELEMMULT_ID}}" aria-hidden="true" role="dialog" tabindex="-1" >
    
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title">Eliminar Elemento Multimedia</h4>
            </div>
            <div class="modal-body">
                <p>Seguro desea Eliminar el Elemento Multimedia <b>{{$elem->ELEMMULT_ID}}</b></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success" >Eliminar</button>
            </div>
        </div>
    </div>
</div>
{!!Form::Close()!!}
