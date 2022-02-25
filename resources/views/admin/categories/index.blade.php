@extends('layouts.dashboard')

@section('content')
    <div class="category-index">
        <div class="container">
            @foreach ($categories as $category)
                <li>
                    <a href="{{ route('admin.category.show', ['slug' => $category->slug]) }}">
                        {{$category->name}}
                    </a>
                </li>
            @endforeach
        </div>
    </div>
@endsection