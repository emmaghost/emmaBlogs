<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;
use App\Models\Comentario;
use DB;
use Yajra\Datatables\Datatables;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
       // instanciamos la clase de articulo
       $articulo = new Articulo;
       //traemos el valor del request
       $articulo->id_propietario = $request->id_propietario;       
       $articulo->titulo = $request->titulo;       
       $articulo->articulo = $request->articulo;       
       $articulo->foto = $request->foto;                 
       $articulo->estatus = true;                 
       $articulo->save();
        
        if(!$articulo){
            return response()->json([
                "message" => "Error al crear el articulo".$articulo->id
              ], 201);
        }else{
            return response()->json([
                "message" => "Se creo correctamente con el id : ".$articulo->id
              ], 201);
        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if($id == "Todos"){
            return Articulo::where('estatus', true)->get();   
        }
        else{
            //traemos los datos con el id solicitado por GET.
            return Articulo::where('id', $id)->get();
        }
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function muestraTodos(Request $request, $id)
    {
        return Articulo::where('estatus', $true)->get();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    /**
     * Calls blade to create the new store
     *
     */

    public function generaNuevo()
    {
        return view('blog.nuevoArticulo');
    }

    /**
     * Store a newly created resource in storage.
     * Guarda el nuevo registro de articulo en la bd 
     *
     * @param  \Illuminate\Http\Request  $request          
     */
    public function saveNewArt(Request $request)
    {
        \Log::info(__METHOD__.' Creacion de nuevo Articulo');   
        try{
            //validamos que no exista el mismo nombre de articulo
            $tituloArticulo = $request->titulo_articulo;
            $validador = Articulo::where('titulo',$tituloArticulo)->count();
            
            if($validador != 0 ){
                return response()->json(['success' => false, 'message' => 'Ya existe el nombre del titulo, verificar que el nombre no exista'],200);    
            }
            $file  =  $request->file('file');         
                 if ($request->hasFile('file')) {
                    $nombre = $file->getClientOriginalName();
                    \Storage::disk('local')->put($nombre,  \File::get($file));
                    $articulo = new Articulo;                    
                    $articulo->id_propietario = 1;       
                    $articulo->titulo = $tituloArticulo;       
                    $articulo->articulo = $request->descripción;       
                    $articulo->foto = $nombre;                 
                    $articulo->estatus = true;                 
                    $articulo->save();
                    return response()->json(['success' => true, 'message' => 'Articulo Guardado Correctamente'],200);    
                 }
        } catch (\Exception $th) {
            \Log::warning(__METHOD__."--->Line:".$th->getLine()."----->".$th->getMessage());
            DB::rollback();
            return response()->json(['success' => false, 'message' => 'Error al guardar el articulo.'],200);            
        }         
     
    }
    public function modal_create(Request $request)
    {
        return view('blog/modals/nuevoArticulo');
     
    }
    public function data_listar_articulos()
    {
        $datos = Articulo::getArticulos();  
             
        return Datatables::of( $datos )->toJson();
     
    }
    public function data_listar_comentarios(Request $request)
    {
        
        $id_articulo =  $request->id_articulo;
        $datos = Comentario::where('id_articulo',$id_articulo)->get();  
             
        return Datatables::of( $datos )->toJson();
     
    }
    public function verArticulo(Request $request)
    {
        $id = $request->route('id');
        $datoArticulo = Articulo::where('id',$id)->first();
        $comentarios = Comentario::where('id_articulo',$id);
        $ruta = "public/storage/".$datoArticulo->foto;
        return view('blog/mostrarArticulo',compact('datoArticulo','comentarios','ruta'));
     
    }
    public function editarArticulo(Request $request)
    {
        $id = $request->route('id');
        $datoArticulo = Articulo::where('id',$id)->first();
        $comentarios = Comentario::where('id_articulo',$id);
        $ruta = "public/storage/".$datoArticulo->foto;
        return view('blog/editarArticulo',compact('datoArticulo','comentarios','ruta'));
     
    }
    public function modal_genera_comentario(Request $request)
    {
        $id = $request->id_articulo;  
        $datoArticulo = Articulo::where('id',$id)->first();       
        return view('blog/modals/generaComentario',compact('datoArticulo'));     
    }
    public function modal_edita_articulo(Request $request)
    {
        $id = $request->route('id');        
        $datoArticulo = Articulo::where('id',$id)->first();               
        return view('blog/modals/editaArticulo',compact('datoArticulo'));     
    }


    public function guardaComentario(Request $request)
    {
        
        \Log::info(__METHOD__.' Creacion de comentario para el articulo --> '.$request->id_articulo);   
        try{                                                       
                    $Comentario = new Comentario;                    
                    $Comentario->id_articulo  = $request->id_articulo;       
                    $Comentario->comentario = $request->comentario;      
                    $Comentario->id_propietario = 1;      

                    $Comentario->estatus = true;                 
                    $Comentario->save();
                    return response()->json(['success' => true, 'message' => 'Comentario Guardado Correctamente'],200);    
                
        } catch (\Exception $th) {
            \Log::warning(__METHOD__."--->Line:".$th->getLine()."----->".$th->getMessage());
            DB::rollback();
            return response()->json(['success' => false, 'message' => 'Error al guardar el Comentario.'],200);            
        }         
     
    }

    
    public function save_edita_articulo(Request $request)
    {
        
        \Log::info(__METHOD__.' Edicion de el articulo');   
        try{
            //validamos que no exista el mismo nombre de articulo
            $tituloArticulo = $request->titulo_articulo;
            $id_articulo = $request->id_articulo;            
            $articulo = Articulo::find($id_articulo);     
            $validador = Articulo::where('titulo',$tituloArticulo)->count();            
            $datosArticulo = Articulo::where('titulo',$tituloArticulo)->first();
            if($datosArticulo->id != $articulo->id && $validador != 0 ){
                return response()->json(['success' => false, 'message' => 'Ya existe el nombre del titulo, verificar que el nombre no exista'],200);    
            }
            
                         
            
                $file = $request->file('file');         
                if ($request->hasFile('file')) { //si tiene archivo esque borrara el anterior y lo sustituira por el nuevo
                    $foto = $articulo->foto;
                    \Storage::delete($foto); //borramos del storage la imagen subida y hacemos e update a ese id
                    $nombre = $file->getClientOriginalName();
                    \Storage::disk('local')->put($nombre,  \File::get($file));
                    $articulo->foto = $nombre;   
                 }
                   
                    $articulo->id_propietario = 1;       
                    $articulo->titulo = $tituloArticulo;       
                    $articulo->articulo = $request->descripción;                                        
                    $articulo->estatus = true;                 
                    $articulo->save();
                     return response()->json(['success' => true, 'message' => 'Articulo Editado Correctamente'],200);    
        } catch (\Exception $th) {
            \Log::warning(__METHOD__."--->Line:".$th->getLine()."----->".$th->getMessage());
            DB::rollback();
            return response()->json(['success' => false, 'message' => 'Error al guardar el articulo.'],200);            
        }         
     
    }

}
