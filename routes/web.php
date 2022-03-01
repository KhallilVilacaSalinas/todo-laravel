<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ConfigController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TarefasController;

Route::get('/', [HomeController::class, 'index']);

Route::view('/teste', 'teste');

Route::prefix('/noticias')->group(function() {

    Route::get('/{slug}', function($slug) {
        echo "Titulo: $slug";
    });

    Route::get('/{slug}/comentario/{id}', function($slug, $id) {
        echo "Mostrando o comentario ".$id." da noticia ".$slug;
    });
    
});



Route::prefix('/user')->group(function() {

    Route::get('/user/{name}', function($name) {
        echo "Mostrando usuario de nome ".$name; 
    });

    Route::get('/user/{id}', function($id) {
        echo "Mostrando usuario ".$id; 
    });
});



Route::prefix('/config')->group(function() {

    Route::get('/', [ConfigController::class, 'index']);
    Route::post('/', [ConfigController::class, 'index']);
    Route::get('/user', [ConfigController::class, 'user']);
    
    Route::get('/permissoes', function() {
        echo 'Configurações permissões';
    })->name('permissoes');

});

Route::prefix('/tarefas')->group(function() {

    Route::get('/', [TarefasController::class, 'index'])->name('tarefas.list');

    Route::get('add', [TarefasController::class, 'add'])->name('tarefas.add');
    Route::post('add', [TarefasController::class, 'addAction']);

    Route::get('edit/{id}', [TarefasController::class, 'edit'])->name('tarefas.edit');
    Route::post('edit/{id}', [TarefasController::class, 'editAction']);

    Route::get('delete/{id}', [TarefasController::class, 'del'])->name('tarefas.del');

    Route::get('marcar/{id}', [TarefasController::class, 'done'])->name('tarefas.done');

});


Route::fallback(function() {
    return view('404');
});