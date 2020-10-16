<div
    class="modal fade"
    id="mod_add_articulo"
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
                    <h5 class="kt-portlet__head-title">Añadir nuevo Artículo:
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
                    name="frm_nuevo_articulo"
                    id="frm_nuevo_articulo"
                    method="POST">
                    <div class="form-group">
                        <label >* Titulo del Artículo:</label>
                        <input type="text" class="form-control" name="titulo_articulo" id="titulo_articulo" required></div>
                        <div class="form-group">
                            <label >* Descripción del Artículo</label>
                           
                                <textarea
                                    required
                                    class="form-control"
                                    name="descripción"
                                    id="descripción"
                                 ></textarea>
                         
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
                            onclick="save_articulo();">Agregar</button>
                    </div>
            </div>
        </form>
    </div>
</div>