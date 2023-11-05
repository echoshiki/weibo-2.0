@extends('layouts.default')

@section('title', '找回密码')

@section('content')
    @include('shared._title', ['title'=>'找回密码', 'subtitle'=>'请输入您注册时的邮箱'])
    <form action="{{ route('password.email') }}" method="post" class="grid grid-cols-1 gap-6 max-w-lg mx-auto sm:mx-0"> 
        @csrf
        <label for="email" class="block">
            <p class="text-sm">邮箱：</p>
            <input value="{{ old('email') }}" type="email" name="email" class="mt-2.5 block w-full rounded-sm border-gray-300 sm:text-sm sm:leading-6 placeholder:text-gray-400 focus:ring-2 focus:ring-inset">
        </label>
        
        <button class="flex justify-center items-center w-full rounded-md bg-blue-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
          </svg>&nbsp;&nbsp;发送重置邮件</button>
    </form>

@endsection