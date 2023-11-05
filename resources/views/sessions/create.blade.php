@extends('layouts.default')
@section('title', '登录')

@section('content')

    @include('shared._title', ['title' => '登录', 'subtitle' => '天气晴朗，欢迎回来'])

    <form action="{{ route('login') }}" method="post" class="grid grid-cols-1 gap-6 max-w-lg mx-auto sm:mx-0"> 
        @csrf
        
        <label for="email" class="block">
            <p class="text-sm">邮箱：</p>
            <input value="{{ old('email') }}" type="email" name="email" class="mt-2.5 block w-full rounded-sm border-gray-300 sm:text-sm sm:leading-6 placeholder:text-gray-400 focus:ring-2 focus:ring-inset">
        </label>
        
        <label for="password" class="block">
            <p class="text-sm">密码：<a class="text-blue-500" href="{{ route('password.find') }}">（忘记密码？）</a></p>
            <input type="password" name="password" class="mt-2.5 block w-full rounded-sm border-gray-300 sm:text-sm sm:leading-6 placeholder:text-gray-400 focus:ring-2 focus:ring-inset">
        </label>

        <div class="block">
            <p class="mt-2 flex items-center">
                <input type="checkbox" class="rounded-sm">
                <span class="ml-2.5 text-sm">remember me</span>
            </p>
        </div>

        <button class="block w-full rounded-md bg-blue-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">登录</button>
    </form>

    <div class="block">
        <p class="text-sm leading-8 text-center sm:text-left">没有账号？这就去 <a href="{{ route('users.create') }}" class="text-blue-500">注册账号</a> 加入我们 Join us !</p>
    </div>

@endsection
