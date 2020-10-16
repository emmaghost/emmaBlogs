<div
    class="modal fade"
    id="mod_edit_articulo"
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
                    <h5 class="kt-portlet__head-title">Editar el Artículo:
                        <small></small>
                    </h5>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form
                    role="form"
                    name="frm_edita_articulo"
                    id="frm_edita_articulo"
                    method="POST">
                    <div class="form-group">
                    <input type="hidden" name="id_articulo" id="id_articulo"value="{{$datoArticulo->id}}">
                        <label >* Titulo del Artículo:</label>
                        <input type="text" class="form-control" name="titulo_articulo" id="titulo_articulo" required value="{{$datoArticulo->titulo}}"></div>
                        <div class="form-group">
                            <label >* Descripción del Artículo</label>
                           
                                <textarea
                                    required
                                    class="form-control"
                                    name="descripción"
                                    id="descripción"
                                    >{{$datoArticulo->articulo}}</textarea>
                         
                        </div>
                        <div class="form-group">
                            <label class="control-label">Ingresar una Foto del tema</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="la la-calendar"></i>
                                    </span>
                                </div>
                                <input type="file" class="form-control" name="file">
                            </div>
                        </div>
                            
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button
                            type="button"
                            class="btn btn-primary"
                            id="usr_js_fn_04"
                            onclick="edit_articulo();">Agregar</button>
                    </div>
            </div>
        </form>
    </div>
</div>