@extends('layouts.default')

@section('title', $title)

@section('content')
    @include('shared._title')
    <div class="grid grid-cols-8 mt-10">
        @foreach ($users as $user)
            <div class="text-center mb-10"><a href="{{ route('users.show', $user) }}">
                <div class="w-32 mx-auto"><img class="w-full" src="{{ $user->gravatar() }}" alt="{{ $user->name }}"></div>
                <p class="text-slate-700 text-sm mt-2">{{ $user->name }}</p>
                <p class="text-slate-600 font-light text-xs mt-1">{{ $user->pivot->updated_at}}</p>
            </a></div>
        @endforeach
    </div>

    <div class="mt-10">
        {!! $users->render(); !!}
    </div>

@endsection
