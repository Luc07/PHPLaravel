<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Usuario extends Model
{
    use HasFactory;
    protected $connection = 'sqlite';
    protected $table = 'usuario';

    public static function listar(int $limite){
        $sql = self::select([
            "id",
            "nome",
            "email",
            "senha",
            "data_cadastro"
        ])
        ->limit($limite)
        ->get();

        return $sql;
    }

    public static function cadastrar(Request $request){
        return self::insert([
            "nome" => $request->input('nome'),
            "email" => $request->input('email'),
            "senha" => Hash::make($request->input('senha')),
            "data_cadastro" => new Carbon()
        ]);
    }

    public static function editar(Request $request){
        DB::enableQueryLog();
        return DB::table('usuario')->where(['id' => $request->input('id')])->update(['nome' => $request->input('nome')]);
        dd(DB::getQueryLog());
    }
}
