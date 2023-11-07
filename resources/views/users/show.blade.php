@extends('layouts.default')
@section('title' ,'个人中心')

@section('content')
    @include('shared._title', ['title' => '个人中心', 'subtitle' => '这里显示的是您的基本信息'])
   
    {{-- 个人信息 --}}
    @include('shared._user_info')

    @include('shared._title', ['title' => '个人动态', 'subtitle' => ''])

    {{-- 动态列表 --}}
    @include('shared._feed')
    
@stop
