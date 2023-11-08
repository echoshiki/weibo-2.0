@extends('layouts.default')
@section('title', '首页')

@section('content')
 
    <div class="">
        @if (Auth::check()) 
        <div class="flex flex-col sm:flex-row sm:items-start py-10 mt-10 sm:space-x-10">
            @include('shared._user_info', ['user' => Auth::user()])
            <div class="w-full mt-5 px-4 sm:px-0 sm:mt-0 sm:max-w-3xl sm:text-right">
                <form action="{{ route('posts.store') }}" method="post">
                    @csrf
                    <textarea class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="content" rows="6"></textarea>
                    <button type="submit" class="bg-blue-700 text-white py-4 w-full mt-4 rounded-md text-sm shadow-sky-300 shadow-sm hover:bg-blue-600 duration-300 relative right-0">发布动态</button>
                </form>
            </div> 
        </div> 
        @else
        <div class="bg-slate-200 p-10 my-10 rounded-md">
            <div>
                <h1 class="text-slate-700 text-4xl font-serif mb-4">欢迎来到 <span class="font-mono">weibo 2.0</span></h1>
                <p class="text-slate-500 text-sm font-sans font-light">如果你有一个神奇的点子，或者一些与众不同的想法，</p>
                <p class="text-slate-500 text-sm font-sans font-light">这里很适合你的畅所欲言</p>
            </div>
            <div class="mt-4">
                <a href="{{ route('users.create') }}" class="inline-block w-32 rounded-md bg-blue-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">加入我们</a> <span class="text-slate-500 text-sm font-light ml-6">已经有账户？<a href="{{ route('login') }}" class="text-blue-500">点击这里进行登录</a>！</span>
            </div>
        </div>  


        @endif
        @include('shared._title', ['title' => '用户动态', 'subtitle' => '这里展示了您的关注用户的所有动态'])
        <div class="w-full">
            @include('shared._feed')
        </div>      
    </div>
   

    
    
@endsection

