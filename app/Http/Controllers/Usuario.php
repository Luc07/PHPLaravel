<?php

namespace App\Http\Controllers;

use App\Models\Usuario as ModelsUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Usuario extends Controller 
{
    public function cadastrar(){
        return view('usuario.cadastro');
    }

    public function salvar(Request $request){
        $request->validate([
            "nome" => "required",
            "email" => "required|email|unique:usuario,email",
            "senha" => "required|min:5"
        ]);
        
        if(ModelsUsuario::cadastrar($request)){
            return view('usuario.sucesso', [
                "fulano" => $request->input('nome')
            ]);
        }else{
            echo "Falhou no cadastro";
        }
    }
    public function editar(){
        return view('usuario.editar');
    }

    public function editarSucesso(Request $request){
        if(ModelsUsuario::editar($request)){
            return "Oi";
        }else{
            dd($request->all());
        }
    }

    public function logar(){
        return view('usuario.login');
    }

    public function logarSucesso(Request $request){
        $dados = $request->validate([
            'email' => "required|email",
            'senha' => "required|min:5"
        ]);
        DB::enableQueryLog();
        if(Auth::attempt(['email' => $request->input('email'), 'senha' => Hash::make($request->input('senha'))])){
            dd(DB::getQueryLog());
            echo ("Logou");
        }else{
            echo ("Não logou");
            dd(DB::getQueryLog());
        }
    }
}
