<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarefa;

class HomeController extends Controller
{
    public function index() {
        $list = Tarefa::all();

        foreach ($list as $item) {
            echo $item->titulo."<br>";
        }
    }
}
