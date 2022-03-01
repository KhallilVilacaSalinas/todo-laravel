<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TarefasController extends Controller
{
    public function index()
    {
        $list = DB::select('SELECT * FROM tarefas');
        $data = [
            'list' => $list
        ];
        return view('tarefas.index', $data);
    }

    public function add()
    {
        return view('tarefas.add');
    }

    public function addAction(Request $request)
    {
        if ($request->filled('title')) {
            $titulo = $request->input('title');

            DB::table('tarefas')->insert(
                ['titulo' => $titulo]
            );

            return redirect()->route('tarefas.list');
        } else {

            return redirect()
                ->route('tarefas.add')
                ->with('alert', 'Você não digitou nenhum titulo');
        }
    }

    public function edit($id)
    {
        $data = DB::table('tarefas')->where('id', $id)->first();

        if ($data) {
            return view('tarefas.edit', [
                'data' => $data
            ]);
        } else {
            return redirect()->route('tarefas.list');
        }
    }

    public function editAction(Request $request, $id)
    {
        if ($request->filled('title')) {
            $titulo = $request->input('title');

            $data = DB::table('tarefas')->where('id', $id)->first();
            
            if ($data) {
                DB::table('tarefas')
                    ->where('id', $id)
                    ->update(['titulo' => $titulo]);
            }

            return redirect()->route('tarefas.list');
        } else {

            return redirect()
                ->route('tarefas.edit', ['id'=>$id])
                ->with('alert', 'Você não digitou nenhum titulo');
        }
    }

    public function del($id)
    {
        $data = DB::table('tarefas')->where('id', $id)->first();
        if ($data) {
            DB::table('tarefas')
            ->where('id', $id)
            ->delete();
        }
        return redirect()->route('tarefas.list');
    }

    public function done($id)
    {
        DB::update('UPDATE tarefas SET resolvido = 1 - resolvido WHERE id = :id', [
            'id'=>$id
        ]);
        return redirect()->route('tarefas.list');
    }
}
