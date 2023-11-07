@extends('layouts.default')
@section('title', '首页')

@section('content')

    @if (Auth::check())  
    @include('shared._message') 
    @include('shared._errors') 
    <div class="">

        <div class="flex items-start py-10 mt-10 sm:space-x-10">
            @include('shared._user_info', ['user' => Auth::user()])
            <div class="w-full sm:max-w-3xl sm:text-right">
                <form action="{{ route('posts.store') }}" method="post">
                    @csrf
                    <textarea class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="content" rows="4"></textarea>
                    <button type="submit" class="bg-blue-700 text-white py-4 w-full mt-4 rounded-sm text-sm shadow-sky-300 shadow-sm hover:bg-blue-600 duration-300 relative right-0">发布</button>
                </form>
            </div> 
        </div> 

        @include('shared._title', ['title' => '用户动态', 'subtitle' => '这里展示了您的关注用户的所有动态'])

        <div class="w-full">
            @include('shared._feed')
        </div>
        
        
    </div>
    @endif
    
    
@endsection

