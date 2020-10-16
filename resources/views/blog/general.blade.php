@extends('welcome') @section('content')

<div class="container-fluid">
<style>.carousel, .carousel-inner > .item > img {
  width: 80%;
}</style>
    <div class="row">

        <div class="container">    
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    @forelse ($data as $r)
    <div class="carousel-item @if($loop->first) active @endif">
    <div class="width: 20px col-sm-5 d-md-inline-block">
        <img src="storage/{{$r->foto}}" class="d-block w-100" alt="{{$r->titulo}}">
      </div>
      </div>
    @empty
    @endforelse
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
   
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
            <section>
                <div class="container-fluid">
                    <div class="row">
                    <div class="col-sm-12 mb-3">
                    <table class="table table-striped- table-bordered table-hover table-checkable"name="listar-articulos-table" id="listar-articulos-table">
                                <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Titulo </th>
                                    <th> Foto </th>                                  
                                    <th> likes </th>                                  
                                    <th> Acciones </th>                                                                                                                                        
                                </tr>
                                </thead>


                            </table>
                    </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<script src="{{ URL::asset('js/blog.js')}}" type="text/javascript"></script>
@endsection @section('scripts')

@endsection