@extends('base')

@section('content')
    <div class="contenaire-accueil">
        <div class="content">
            <h2 class="title">Your todolist with Laravel</h2>
            <span>A very simple todolist application to learn Laravel</span>
            <p class="first-p">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nam excepturi provident cumque
                facilis
                rem possimus
                molestias officiis modi veniam placeat repudiandae, itaque sunt odio necessitatibus ipsa officia qui aperiam
                aliquid?Quisquam officiis est excepturi laudantium nostrum suscipit, voluptatem libero fuga dolores itaque
                nobis
                aspernatur minus repudiandae corrupti non, sint accusantium minima quo cumque ducimus alias harum!
                Repudiandae
                enim quis asperiores!</p>
            <div class="content-yellow-paragraphe">
                <p class="second-p"><span>New</span> Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident
                    consequatur ipsa rem ut
                    quos ratione. Nulla exercitationem vel odit autem, eveniet consequuntur quidem corporis accusantium
                    doloribus unde cupiditate, voluptatibus repudiandae.
                </p>
            </div>
        </div>
        <div class="">
            Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
        </div>
    </div>
@endsection
