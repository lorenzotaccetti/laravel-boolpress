@extends('layouts.dashboard')

@section('content')
    <div class="main-create container">
        <h2>
            Crea un nuovo post
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

        <form action="{{ route('admin.posts.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')

            <label for="title">
                Titolo del post
            </label>
            <input type="text" name="title" id="title" value="{{old('title')}}">

            <label for="category_id">Categoria</label>
            <select name="category_id" id="category_id">
                <option value="">Nessuna</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}" {{ old('category_id') == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                @endforeach
            </select>

            <div class="tags">
                Tags
            </div>
            <div class="tags-area">
                @foreach ($tags as $tag)
                    <input
                    {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}
                    class="check" 
                    type="checkbox" 
                    name="tags[]"
                    value="{{$tag->id}}" 
                    id="tag-{{$tag->id}}">
                    <label class="check" for="tag-{{$tag->id}}">
                        {{$tag->name}}
                    </label>
                @endforeach
            </div>

            <label for="description">
                Descrizione del post
            </label>
            <textarea name="description" id="description" cols="30" rows="10">{{old('description')}}</textarea>

            <label for="cover">Inserisci un'immagine per il tuo post</label>
            <input type="file" name="cover" id="cover">

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection