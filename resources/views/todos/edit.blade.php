@extends('base')

@section('content')
    <div class="form-contenaire">
        <div class="card">
            <div class="card-header">
                création d'une nouvelle todo
            </div>
            <div class="card-body">
                <form action="{{ Route('todo.update') }}" method="POST">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <input type="hidden" name="id" value="{{ $todo['id'] }}">
                        <label for="name">Titre</label>
                        <input type="text" name="name" class="form-control" id="name"
                            value="{{ $todo['name'] }}">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ $todo['description'] }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
@endsection
