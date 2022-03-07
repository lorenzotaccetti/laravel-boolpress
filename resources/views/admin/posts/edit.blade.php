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

        <form action="{{ route('admin.posts.update', ['post' => $post->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label for="title">
                Aggiorna il titolo
            </label>
            <input type="text" name="title" id="title" value="{{old('title', $post->title)}}">

            <label for="category_id">Aggiorna la categoria</label>
            <select name="category_id" id="category_id">
                <option value="">Nessuna</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                        {{$category->name}}
                    </option>
                @endforeach
            </select>

            <div class="tags">
                Tags
            </div>
            <div class="tags-area">
                @foreach($tags as $tag)

                    @if ($errors->any())
                        <input
                        {{in_array($tag->id, old('tags', [])) ? 'checked' : ''}} 
                        class="check"
                        type="checkbox" 
                        name="tags[]" 
                        value="{{$tag->id}}" 
                        id="tag-{{$tag->id}}">
                        <label class="check" for="tag-{{$tag->id}}">
                            {{$tag->name}}
                        </label>
                    @else
                        <input
                        {{$post->tags->contains($tag) ? 'checked' : ''}} 
                        class="check"
                        type="checkbox" 
                        name="tags[]" 
                        value="{{$tag->id}}" 
                        id="tag-{{$tag->id}}">
                        <label class="check" for="tag-{{$tag->id}}">
                            {{$tag->name}}
                        </label>
                    @endif
                    
                @endforeach
            </div>

            <label for="description">
                Aggiorna la descrizione
            </label>
            <textarea name="description" id="description" cols="30" rows="10">{{old('description', $post->description)}}</textarea>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection