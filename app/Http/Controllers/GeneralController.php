<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;
use DB;

class GeneralController extends Controller
{
    public function home(){
        //mando los datos de carousel 
       $data = Articulo::where('estatus',true)->get();
       // $data = Articulo::getArticulos();
       
        return view('blog.general', compact('data'));
    }
}
