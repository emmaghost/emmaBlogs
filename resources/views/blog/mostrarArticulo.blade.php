@extends('welcome')
@section('content') 
<div class = "container-fluid" > <div class="row"></div> 
<section> <style></style>
    <div class="container">
        <div class="card mb-3">
            <img src="/blogEmma/{{ $ruta }}" class="card-img-top" width="25%">
                <div class="card-body">
                <input type="hidden" name="id_articulo" id="id_articulo"value="{{$datoArticulo->id}}">
                    <h2 class="card-title">{{ $datoArticulo->titulo }} </h2>
                    <p class="card-text">{{$datoArticulo->articulo}}</p>
                    <p class="card-text">
                        <small class="text-muted">Last updated 3 mins ago</small>
                    </p>
                </div>
            </div>
            <div class="card-footer">
                       
                            <a href="" class="btn btn-primary btn-sm">({{ 1 }}) Me gusta</a>
                       
                            <a href="" class="btn btn-primary btn-sm">({{ 2 }}) Te gusta</a>
                       
                            <a href="" class="btn btn-secondary btn-sm">({{ 3 }}) No me gusta</a>
                       
                            <a href="" class="btn btn-secondary btn-sm">({{4 }}) Te disgusta</a>
                       
                    </div>
                    <div class="container-fluid">
                    <div class="row">
                    <div class="col-sm-12 mb-3">
                    <br>
                    <div style="float: right"><button onclick="generaComentario('{{$datoArticulo->id}}')" type='button'class="btn btn-success btn-sm">Nuevo Comentario</button></div>
                    <br><br>
                    <table class="table table-striped- table-bordered table-hover table-checkable"name="listar-comentarios-table" id="listar-comentarios-table">
                                <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Comentario </th>
                                  <!--   <th> Fecha de Captura </th>                                                                                                                                                                                                           -->
                                </tr>
                                </thead>


                            </table>
                    </div>
                    </div>
                </div>
    </div>

</section>

</div>
<script src="{{ URL::asset('js/comentarios.js')}}" type="text/javascript"></script>
@endsection @section('scripts')

@endsection