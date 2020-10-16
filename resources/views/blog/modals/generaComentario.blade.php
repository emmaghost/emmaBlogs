<div
    class="modal fade"
    id="mod_add_comentario"
    tabindex="-1"
    aria-hidden="true"
    data-backdrop="static"
    data-keyboard="false">
    <div class="modal-dialog modal-xl" role="document">
        <style>
            input:invalid {
                border: 1px dashed red;
            }

            input:invalid:required {
                background-image: linear-gradient(red);
            }
        </style>
        <div class="modal-content">
            <div class="modal-header">
                <div class="kt-portlet__head-label">
                    <h5 class="kt-portlet__head-title">Añadir nuevo Comentario al Artículo de :  <strong>{{$datoArticulo->titulo}}</strong> 
                    
                    </h5>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form
                    role="form"
                    name="frm_comentario"
                    id="frm_comentario"
                   >    
                    <input type="hidden" name="id_articulo" id="id_articulo"value="{{$datoArticulo->id}}">               
                        <div class="form-group">
                            <label >* Comentario</label>
                           
                                <textarea
                                    required
                                    class="form-control"
                                    name="comentario"
                                    id="comentario"
                                 ></textarea>
                         
                        </div>
                        
                            
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button
                            type="button"
                            class="btn btn-primary"
                            
                            onclick="save_comentario();">Agregar</button>
                    </div>
            </div>
        </form>
    </div>
</div>