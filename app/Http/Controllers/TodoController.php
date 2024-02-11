<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\todoAffected;

class TodoController extends Controller
{
    public $users;


    function __construct()
    {
        $this->users = User::getAllUser();
    }

    public function getAllTodos()
    {
        $todos = Todo::where('affectedTo', Auth::user()->id)
            ->orderBy('created_at', 'desc')
            ->paginate(5);
        $totalData = $todos->total();
        return view('todos.todos', ['todos' => $todos, "totalData" => $totalData, 'users' => $this->users]);
    }

    public function todosDone()
    {
        $todos = Todo::where('done', 1)
            ->orderBy('created_at', 'desc')
            ->where('affectedTo', Auth::user()->id)
            ->paginate(5);
        $totalData = $todos->total();
        return view('todos.todos', ['todos' => $todos, "totalData" => $totalData, 'users' => $this->users]);
    }

    public function todosUndone()
    {
        $todos = Todo::where('done', 0)
            ->orderBy('created_at', 'desc')
            ->where('affectedTo', Auth::user()->id)
            ->paginate(5);
        $totalData = $todos->total();
        return view('todos.todos', ['todos' => $todos, "totalData" => $totalData, 'users' => $this->users]);
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
        $data->user_id = Auth::user()->id;
        $data->affectedTo = 0;
        $data->affectedBy = Auth::user()->id;
        $data->save();
        toastr()
            ->positionClass('toast-top-center')
            ->preventDuplicates(true)
            ->progressBar(false)
            ->escapeHtml(true)
            ->addSuccess("La todo vient d'être créée avec succès");
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
        $todo = Todo::find($request->id);
        $todo->delete();
        return back();
    }

    public function editGetTodo($idTodo)
    {
        $todo = Todo::find($idTodo);
        return view('todos.edit', ['todo' => $todo]);
    }

    public function updateTodo(Request $request)
    {
        $todo = Todo::find($request->id);
        $todo->name = $request->name;
        $todo->description = $request->description;
        $todo->save();
        return redirect()->route('accueil');
    }

    public function confirmDelete($id)
    {
        return view('todos.confirmDelete');
    }

    public function affectedTo(Todo $todo, User $user)
    {
        $todo->affectedTo = $user->id;
        $todo->affectedBy = Auth::user()->id;
        $todo->update();
        $user->notify(new todoAffected($todo));
        toastr()
            ->positionClass('toast-top-center')
            ->preventDuplicates(true)
            ->progressBar(false)
            ->escapeHtml(true)
            ->addSuccess("La todo a été mise à jour avec succès");
        return back();
    }
}
