@extends('layouts.dashboard')

@section('content')
    <div class="main-edit">
        <h2>
            Modifica il post
        </h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.posts.update', ['post' => $post->id])}}" method="post">
            @csrf
            @method('PUT')

            <label for="title">
                Aggiorna il titolo
            </label>
            <input type="text" name="title" id="title" value="{{old('title', $post->title)}}">

            <label for="description">
                Aggiorna la descrizione
            </label>
            <textarea name="description" id="description" cols="30" rows="10">{{old('description', $post->description)}}</textarea>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection