@extends('base')

@section('content')
    @foreach ($todos as $key => $todo)
        <pre>
            <span>Name : {{ $todo['name'] }}</span>
            <span>Done : {{ $todo['done'] }}</span>
        </pre>
    @endforeach
@endsection
