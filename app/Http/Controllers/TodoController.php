<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function getAllTodos()
    {
        $todos = Todo::paginate(4);
        $totalData = $todos->total();
        return view('todos.todos', ['todos' => $todos, "totalData" => $totalData]);
    }

    public function todosDone()
    {
        $todos = Todo::where('done', 1)->paginate(4);
        $totalData = $todos->total();
        return view('todos.todos', ['todos' => $todos, "totalData" => $totalData]);
    }

    public function todosUndone()
    {
        $todos = Todo::where('done', 0)->paginate(4);
        $totalData = $todos->total();
        return view('todos.todos', ['todos' => $todos, "totalData" => $totalData]);
    }
}
