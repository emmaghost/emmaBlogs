@extends('welcome')@section('content')
 <div class = "container-fluid" > <div class="row"></div>
<section>
<style>

</style>
    <div class="container">
    <form role="form" name="frm_nuevo_articulo" id="frm_nuevo_articulo" method="POST" enctype="multipart/form-data" action="{{ url('articulo/guardaNuevoArticulo') }}">
            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <label for="validationDefault01">Titulo del Articulo</label>
                    
                    <input
                        type="text"
                        class="form-control"
                        id="validationDefault01"
                        placeholder="First name"                        
                        required="required">
                </div>
            </div>
            <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <div class="mb-12">
                            <label for="validationTextarea">Textarea</label>
                            <textarea
                                class="form-control"
                                id="validationTextarea"
                                placeholder="Required example textarea"
                                required="required"></textarea>
                            <div class="invalid-feedback">
                                Please enter a message in the textarea.
                            </div>
                        </div>
                    </div>
            </div>
            <div class="form-row">        
                    <div class="col-md-8 mb-3">
                        <label for="validationDefaultUsername">Agregar Foto</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="fotoArticulo" lang="es" required>
                                <label class="custom-file-label" for="fotoArticulo">Seleccionar Archivo</label>
                            </div>                         
                        
                        <div class="col-md-12 mb-3">
                        <img id="imgSalida" width="80%" height="80%" />
                        </div>
                    <div class="col-md-12 mb-3">
                    <button class="btn btn-primary" onclick="generarNuevoArticulo()">Generar Nuevo Articulo</button>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                    <div class="col-md-6">
                <input type="file" class="form-control" name="file" >
              </div>
                    </div>
                    
            </div>
                    </form>
                </div>
            </section>

        </div>

        @endsection @section('scripts')

@endsection