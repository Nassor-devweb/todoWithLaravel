<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function getAllTodos()
    {
        $todos = Todo::paginate(5);
        $totalData = $todos->total();
        return view('todos.todos', ['todos' => $todos, "totalData" => $totalData]);
    }

    public function todosDone()
    {
        $todos = Todo::where('done', 1)->paginate(5);
        $totalData = $todos->total();
        return view('todos.todos', ['todos' => $todos, "totalData" => $totalData]);
    }

    public function todosUndone()
    {
        $todos = Todo::where('done', 0)->paginate(5);
        $totalData = $todos->total();
        return view('todos.todos', ['todos' => $todos, "totalData" => $totalData]);
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(Request $request)
    {
        $data = new Todo();
        $data->name = $request->name;
        $data->description = $request->description;
        $data->save();
        return redirect()->route('accueil');
    }

    public function setDone(Request $request)
    {
        $todo = Todo::where('id', $request->id)->update(['done' => 1]);
        return back();
    }
    public function SetUndone(Request $request)
    {
        Todo::where('id', $request->id)->update(['done' => 0]);
        return back();
    }
    public function deleteTodo(Request $request)
    {
        dd($request->id);
    }
}
