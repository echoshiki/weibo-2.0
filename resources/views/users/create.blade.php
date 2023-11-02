@extends('layouts._default')
@section('title', '注册用户')

@section('content')

    <div class="py-15 border-b border-gray-200">
        <h1 class="text-2xl leading-loose">注册</h1>
    </div>

    @include('shared._errors')

    <form action="{{ route('users.store') }}" method="post" class="grid grid-cols-1 gap-6 my-8 max-w-lg">    
        @csrf
        <label for="name" class="block">
            <p class="text-sm">昵称：</p>
            <input type="text" name="name" class="mt-1 block w-full rounded-sm border-gray-300">
        </label>

        <label for="email" class="block">
            <p class="text-sm">邮箱：</p>
            <input type="email" name="email" class="mt-1 block w-full rounded-sm border-gray-300">
        </label>
        
        <label for="password" class="block">
            <p class="text-sm">密码：</p>
            <input type="password" name="password" class="mt-1 block w-full rounded-sm border-gray-300">
        </label>

        <label for="password_confirmation" class="block">
            <p class="text-sm">确认密码：</p>
            <input type="password" name="password_confirmation" class="mt-1 block w-full rounded-sm border-gray-300">
        </label>

        <button class="bg-blue-500 hover:bg-blue-700 text-white py-3 px-4 rounded-sm w-full ease-in duration-300 mt-3">提交注册</button>
    </form>


    

@endsection