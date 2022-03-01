<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function index(Request $request) {
        $nome = $request->input('nome');
        $idade = $request->input('idade');
        $estado = $request->input('estado');

        $list = [
            'farinha',
            'ovos',
            'leite',
            'açucar',
            'chocolate'
        ];

        $data = [
            'nome' => $nome,
            'idade' => $idade,
            'estado' => $estado,
            'list' => $list
        ];

        return view('admin.config', $data);
    }

    public function user() {
        echo "Pagina de config do usuario";
    }


}
