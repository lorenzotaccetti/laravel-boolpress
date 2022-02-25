@extends('layouts.dashboard')

@section('content')
    <div class="category-show">
        <div class="container">
            <div>
                {{$category->name}}
            </div>
            <div>
                @forelse ($posts as $post)
                    <li>
                        <a href="{{ route('admin.posts.show', ['post' => $post->id]) }}">
                            {{$post->title}}
                        </a>
                    </li>
                @empty
                    <div>
                        Nessun post trovato
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection