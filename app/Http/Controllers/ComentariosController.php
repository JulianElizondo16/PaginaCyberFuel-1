<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//ESTO ES IMPORTANTE//ESTO ES IMPORTANTE
//Ocupamos crear un modelo para utilizar ese 'NEW Comentario' 
use App\Models\Comentario;


class ComentariosController extends Controller
{
    //Para definir un metodo seria:
    //METODO PARA MOSTRAR DONDE VAN TODOS LOS COMENTARIOS.
    public function index(){
        //Aca estamos llamando a la vista
        $comentarios = Comentario::orderBy('id', 'desc')->paginate(10);

        return view('coment', compact('comentarios'));
    }
    

    //METODO PARA GUARDAR LOS DATOS EN BASE DE DATOS.
    public function GenerarComentario(Request $request){

     $comentario = new Comentario();

     $comentario->name = $request->name;
     $comentario->email = $request->email;
     $comentario->motivo = $request->motivo;
     $comentario->descripcion = $request->descripcion;

     $comentario->save();

     return redirect()->route('comentarios.home');
    }

    }

    //METODO PARA MOSTRAR LOS DATOS GUARDADOS EN LA BASE DE DATOS.


