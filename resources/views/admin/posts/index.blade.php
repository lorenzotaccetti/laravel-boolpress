@extends('layouts.dashboard')

@section('content')
    <div class="main-index container">
        <h2>
            Lista dei post
        </h2>

        <p>
            Clicca un post per visualizzarlo
        </p>

        <div class="posts">
            @foreach ($posts as $post)
                <div class="single-post">
                    <a href="{{ route('admin.posts.show', ['post' => $post->id])}}">
                        <div class="post-title">
                            {{$post->title}}
                        </div>
                        <div class="post-description">
                            {{$post->description}}
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection