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

        <form action="{{ route('admin.posts.store') }}" method="post">
            @csrf
            @method('POST')

            <label for="title">
                Titolo del post
            </label>
            <input type="text" name="title" id="title" value="{{old('title')}}">

            <label for="description">
                Descrizione del post
            </label>
            <textarea name="description" id="description" cols="30" rows="10">{{old('description')}}</textarea>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection