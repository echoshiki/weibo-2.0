@extends('layouts.default')

@section('content')
    @include('shared._title',[
        'title' => '修改信息',
        'subtitle' => '这里可以修改您的常用信息'
    ])

    <form action="{{ route('users.update', $user->id) }}" method="post" class="grid grid-cols-1 gap-6 max-w-lg mx-auto sm:mx-0"> 
        @csrf
        @method('PUT')
        <label for="name" class="block">
            <p class="text-sm">昵称：</p>
            <input value="{{ $user->name }}" type="text" name="name" class="mt-2.5 block w-full rounded-sm border-gray-300 sm:text-sm sm:leading-6 placeholder:text-gray-400 focus:ring-2 focus:ring-inset">
        </label>

        <label for="email" class="block">
            <p class="text-sm">邮箱：</p>
            <input disabled value="{{ $user->email }}" type="email" name="email" class="bg-slate-100 mt-2.5 block w-full rounded-sm border-gray-300 sm:text-sm sm:leading-6 placeholder:text-gray-400 focus:ring-2 focus:ring-inset">
        </label>
        
        <label for="password" class="block">
            <p class="text-sm">密码：</p>
            <input type="password" name="password" class="mt-2.5 block w-full rounded-sm border-gray-300 sm:text-sm sm:leading-6 placeholder:text-gray-400 focus:ring-2 focus:ring-inset">
        </label>

        <label for="password_confirmation" class="block">
            <p class="text-sm">确认密码：</p>
            <input type="password" name="password_confirmation" class="mt-2.5 block w-full rounded-sm border-gray-300 sm:text-sm sm:leading-6 placeholder:text-gray-400 focus:ring-2 focus:ring-inset">
        </label>

        <button class="block w-full rounded-md bg-blue-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">修改</button>
        
    </form>

@endsection