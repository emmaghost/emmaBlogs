<?php

namespace App\Models;
use DB;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $table = 'articulo';
    protected $primaryKey = 'id';    


    public static function getArticulos(){
        $datos = DB::table('articulo')
        ->select('id', 'titulo','foto','likes')         
        ->where('estatus',true)       
        ->get();
        
        return $datos;
    }
}