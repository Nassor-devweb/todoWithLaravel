@extends('base')

@section('content')
    <div class="todoContenaire">
        <div class="filterTodo">
            <div class="butn filterTodo__button addTodo">
                <a href="">Ajouter une todo</a>
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
                <div class="todo">

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
                            <div class="butn todo__button__action done">Done</div>
                        @endif
                        <div class="butn todo__button__action edit">Editer</div>
                        <div class="butn todo__button__action effacer">Effacer</div>
                    </div>

                </div>
            @endforeach
            {{ $todos->links() }}

        </div>
    </div>
@endsection
