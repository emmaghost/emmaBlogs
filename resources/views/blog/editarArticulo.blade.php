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
                        <small class="text-muted">Ultima actualización : {{$diasDiferencia}} días</small>
                    </p>
                </div>
            </div>
            <div style="float: right"><button onclick="editarArticulo('{{$datoArticulo->id}}')" type='button'class="btn btn-warning btn-lg">Editar</button></div>
    </div>

</section>

</div>
<script src="{{ URL::asset('js/articulos.js')}}" type="text/javascript"></script>
@endsection @section('scripts')

@endsection