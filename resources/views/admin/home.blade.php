@extends('layouts.dashboard')

@section('content')
    <h1>
        Benvenuto {{$user->name}}
    </h1>
    @if ($user_info)
        <div>
            Cellulare: {{$user_info->phone_number}}
        </div>
        <div>
            Indirizzo: {{$user_info->address}}
        </div>
    @endif
@endsection