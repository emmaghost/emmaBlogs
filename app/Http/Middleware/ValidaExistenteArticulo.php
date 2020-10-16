<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Articulo;

class ValidaExistenteArticulo
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $id= $request->id;
        
        if(!is_numeric($id)){ //valido que sea numerico y no string
            abort(404);
        }       
        $validaExistente = Articulo::where('id',$id)->where('estatus',true)->count();//valido que exista y que este activo para poder seguir
        if($validaExistente != 1){
            abort(404);
        }
        else{
            return $next($request);
        }
    }
}
