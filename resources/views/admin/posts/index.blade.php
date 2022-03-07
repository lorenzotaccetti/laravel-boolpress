@extends('layouts.dashboard')

@section('content')
    <div class="main-index container">
        <h2>
            Lista dei post
        </h2>

        <div class="posts">
            @foreach ($posts as $post)
                <div class="single-post">
                    <div class="post-title">
                        {{$post->title}}
                    </div>
                    <div class="post-description">
                        {{$post->description}}
                    </div>
                    @if ($post->cover)
                    <div class="post-cover">
                        <img src="{{asset('storage/' . $post->cover)}}" alt="{{$post->title}}">
                    </div>
                    @endif
                    <div class="post-link">
                        <a href="{{ route('admin.posts.show', ['post' => $post->id])}}">
                            Leggi il post
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection