@extends('layouts.default')

@section('title', '动态广场')

@section('content')

    @include('shared._title', [
        'title' => '动态广场',
        'subtitle' => '这里展示了平台所有最新要闻动态！'
    ])

    @include('shared._feed')
    
@endsection