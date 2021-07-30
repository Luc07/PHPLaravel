<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Usuario as ModelsUsuario;
use Illuminate\Http\Request;

class Usuario extends Controller
{
    public function salvar(Request $request){
        if(ModelsUsuario::cadastrar($request)){
            return response("Criado", 201);
        }else {
            return response("erro", 409); 
        }
    }

    public function editar(Request $request){
        if(ModelsUsuario::editar($request)){
            return response("Editado", 200);
        }else{
            return response("erro", 409);
        }
    }
}
