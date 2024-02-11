@extends('base')

@section('title')
    Accueil
@endsection

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
                        <p>
                            <span class="id-todo">#{{ $todo['id'] }}</span> créée {{ $todo['created_at']->from() }} par
                            {{ $todo->user_id == Auth::user()->id ? 'moi' : $todo->user->name }}
                            @if ($todo->affectedTo != Auth::user()->id || $todo->affectedBy != Auth::user()->id)
                                affectée à @if ($todo->affectedTo && $todo->affectedTo == Auth::user()->id)
                                    moi
                                @else
                                    {{ $todo->todoAffectedTo->name }}
                                @endif
                                par @if ($todo->affectedby == Auth::user()->id)
                                    moi
                                @else
                                    {{ $todo->todoAffectedBy->name }}
                                @endif
                            @endif
                        </p>
                        @if ($todo->done)
                            <p>Terminé {{ $todo->updated_at->from() }} et terminée en
                                {{ $todo->updated_at->diffForHumans($todo->created_at, 1) }}</p>
                        @endif
                        <p class="todo-name"><i class="fa-solid fa-caret-right"></i>{{ $todo['name'] }}
                            @if ($todo['done'])
                                <span class="tacheDone">done</span>
                            @endif
                        </p>
                        <p class="description"> {{ $todo['description'] }} </p>
                    </div>

                    <div class="todo__button">
                        @if (!$todo->done)
                            <div class="affectedContenaire">
                                <div class="butn todo__button__action affected">
                                    <span>Affecté à <i class="fa-solid fa-caret-down"></i></span>
                                </div>
                                <ul class="listUserAffected">
                                    @foreach ($users as $user)
                                        @if ($user->id != Auth::user()->id)
                                            <li><a
                                                    href="{{ route('todo.affectedTo', [$todo->id, $user->id]) }}">{{ $user->name }}</a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        @endif

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

                        <div class="butn todo__button__action edit">

                            <button type="button" @if ($todo['done']) disabled @endif
                                onclick="window.location='{{ route('todo.getEdit', $todo['id']) }}'">Editer</button>
                        </div>

                        <form action="{{ route('todo.delete') }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="button" class="butn todo__button__action effacer btnDelete"
                                data-deleteId="{{ $todo['id'] }}">Supprimer</button>
                        </form>

                    </div>

                </div>
            @endforeach
            {{ $todos->links() }}

        </div>
    </div>
@endsection
