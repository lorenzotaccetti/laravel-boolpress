@extends('layouts.dashboard')

@section('content')
    <div class="main-show container">
        <div class="post-title">
            {{$post->title}}
        </div>
        <div class="post-slug">
            {{$post->slug}}
        </div>
        <div class="post-category">
            Categoria: {{$post->category ? $post->category->name : 'nessuna'}}
        </div>
        <div class="post-description">
            {{$post->description}}
        </div>
        <div class="edit-button">
            <a href="{{route ('admin.posts.edit', ['post' => $post->id])}}">
                Modifica il post
            </a>
        </div>
        <div class="delete-button">
            <form action="{{route('admin.posts.destroy', ['post' => $post->id])}}" method="post">
                @csrf
                @method('DELETE')

                <button class="btn btn-danger">
                    Elimina post
                </button>
            </form>
        </div>
    </div>
@endsection