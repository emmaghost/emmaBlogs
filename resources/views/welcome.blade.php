<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Blog Emma</title> 
        @include('layouts/css/css')
    </head>
    <body>
     @include('layouts/scripts/scripts')
        <div class="flex-center position-ref full-height">    
        @include('layouts/navbar/navbar')      
            <div class="container-fluid">
               
                <div class="kt-content" id="kt_content">
                    <div class="kt-container  kt-container--fluid">   
                    <br>                                         
                        @yield('content')
                    </div>                    
                 
                </div>
            </div>
        </div>
            @include('layouts/footer/footer')
    </body>
    @yield('styles')
    @yield('scripts')
    <script src="{{ URL::asset('js/articulos.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
            // var global URL
            var url = '{!! URL::asset('') !!}';
            </script>
</html>
