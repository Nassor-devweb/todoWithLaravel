@extends('base')

@section('content')
    <div class="todoContenaire">
        <div class="filterTodo">
            <div class="butn filterTodo__button addTodo">
                <a href="{{ Route('todo.create') }}">Ajouter une todo</a>
            </div>
            @if (Route::currentRouteName() == 'accueil')
                <div class="butn filterTodo__button undoneTodo">
                    <a href="{{ route('todos.undone') }}">Voir les todos ouvertes</a>
                </div>
                <div class="butn filterTodo__button terminateTodo">
                    <a href="{{ route('todos.done') }}">Voir les todos terminées</a>
                </div>
            @elseif (Route::currentRouteName() == 'todos.undone')
                <div class="butn filterTodo__button allTodos">
                    <a href="{{ route('accueil') }}">Voir Toutes les todos</a>
                </div>
                <div class="butn filterTodo__button terminateTodo">
                    <a href="{{ route('todos.done') }}">Voir les todos terminées</a>
                </div>
            @elseif (Route::currentRouteName() == 'todos.done')
                <div class="butn filterTodo__button allTodos">
                    <a href="{{ route('accueil') }}">Voir Toutes les todos</a>
                </div>
                <div class="butn filterTodo__button undoneTodo">
                    <a href="{{ route('todos.undone') }}">Voir les todos ouvertes</a>
                </div>
            @endif

        </div>
        <h2 class="filter-heading">Toutes les todos({{ $totalData }})</h2>
        <div class="todoContent">
            @foreach ($todos as $key => $todo)
                <div class="todo {{ $todo->done ? 'todo-done' : 'todo-undone' }}">

                    <div class="todo__info">
                        <p><span class="id-todo">#{{ $todo['id'] }}</span> créé le {{ $todo['created_at'] }} </p>
                        <p class="todo-name"><i class="fa-solid fa-caret-right"></i>{{ $todo['name'] }}
                            @if ($todo['done'])
                                <span class="tacheDone">done</span>
                            @endif
                        </p>
                        <p class="description"> {{ $todo['description'] }} </p>
                    </div>

                    <div class="todo__button">
                        @if (!$todo['done'])
                            <form action="{{ route('todo.setDone') }}" method="post">
                                @csrf
                                @method('patch')
                                <button type="submit" class="butn todo__button__action done" name="id"
                                    value="{{ $todo['id'] }}">Done</button>
                            </form>
                        @else
                            <form action="{{ route('todo.SetUndone') }}" method="post">
                                @csrf
                                @method('patch')
                                <button type="submit" class="butn todo__button__action undone" name="id"
                                    value="{{ $todo['id'] }}">Undone</button>
                            </form>
                        @endif

                        <div class="butn todo__button__action edit"><a href="">Editer</a></div>

                        <form action="{{ route('todo.delete') }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="butn todo__button__action effacer" name="id"
                                value="{{ $todo['id'] }}">Effacer</button>
                        </form>

                    </div>

                </div>
            @endforeach
            {{ $todos->links() }}

        </div>
    </div>
@endsection
