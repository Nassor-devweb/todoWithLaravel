<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function getAllTodos()
    {
        $todos = Todo::all();
        return view('todos.todos', ['todos' => $todos]);
    }
}
