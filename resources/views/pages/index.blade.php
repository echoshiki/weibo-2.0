@extends('layouts.default')
@section('title', '首页')

@section('content')
    @if (Auth::check())   
    <div class="flex justify-center items-start py-4 sm:space-x-10">
        <div class="hidden sm:flex flex-col items-center">
            <div class="">
                <img class="border-4 border-slate-200 rounded-full" src="{{ Auth::user()->gravatar('100') }}" alt="">
            </div>
            <div class="text-center">
                <h2 class="font-bold text-2xl mt-2">{{ Auth::user()->name }}</h2>
                <p class="font-thin text-md text-slate-400">{{ Auth::user()->email }}</p>
            </div> 
        </div>
        <div class="w-full sm:max-w-2xl sm:text-right">
            <form action="{{ route('posts.store') }}" method="post">
                <textarea class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="content" rows="4"></textarea>
                <button type="submit" class="bg-blue-700 text-white py-2 w-full mt-4 rounded-sm text-sm shadow-sky-300 shadow-sm hover:bg-blue-600 duration-300 relative right-0">发布</button>
            </form>
        </div> 
    </div>
    @endif
    
    
@endsection

