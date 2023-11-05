@extends('layouts.default')
@section('title', '注册用户')

@section('content')

    @include('shared._title', ['title' => '注册', 'subtitle' => '欢迎加入这里成为我们的一员 :)'])

    <form action="{{ route('users.store') }}" method="post" class="grid grid-cols-1 gap-6 max-w-lg mx-auto sm:mx-0">  
        @csrf
        <label for="name" class="block">
            <p class="text-sm">昵称：</p>
            <input value="{{ old('name') }}" type="text" name="name" class="mt-2.5 block w-full rounded-sm border-gray-300 sm:text-sm sm:leading-6 placeholder:text-gray-400 focus:ring-2 focus:ring-inset">
        </label>

        <label for="email" class="block">
            <p class="text-sm">邮箱：</p>
            <input value="{{ old('email') }}" type="email" name="email" class="mt-2.5 block w-full rounded-sm border-gray-300 sm:text-sm sm:leading-6 placeholder:text-gray-400 focus:ring-2 focus:ring-inset">
        </label>
        
        <label for="password" class="block">
            <p class="text-sm">密码：</p>
            <input type="password" name="password" class="mt-2.5 block w-full rounded-sm border-gray-300 sm:text-sm sm:leading-6 placeholder:text-gray-400 focus:ring-2 focus:ring-inset">
        </label>

        <label for="password_confirmation" class="block">
            <p class="text-sm">确认密码：</p>
            <input type="password" name="password_confirmation" class="mt-2.5 block w-full rounded-sm border-gray-300 sm:text-sm sm:leading-6 placeholder:text-gray-400 focus:ring-2 focus:ring-inset">
        </label>

        <button class="block w-full rounded-md bg-blue-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">提交注册</button>
        
    </form>

    <div class="block">
        <p class="text-sm leading-8 text-center sm:text-left">已经有账号？这就去 <a href="{{ route('login') }}" class="text-blue-500">登录</a> !</p>
    </div>


@endsection