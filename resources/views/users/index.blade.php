@extends('layouts.default')

@section('content')
    @include('shared._title', [
        'title' => '用户列表',
        'subtitle' => '本站点所有的注册用户'
    ])
    
    <div>
        <table class="rounded-md w-full bg-white text-sm shadow-sm overflow-hidden font-mono table-fixed">
            <thead class="bg-slate-100">
                <tr class="h-16 text-left">
                    <th class="w-1/4 sm:w-32"></th>
                    <th class="w-1/2 sm:w-auto">USER</th>
                    <th class="hidden sm:table-cell">EMAIL</th>
                    <th class="hidden sm:table-cell">DATE</th>
                    <th class="w-1/4 sm:w-auto"></th>
                </tr>    
            </thead>
            <tbody>
                @foreach ($users as $k => $user)
                <tr class="h-36 sm:h-16 text-left @if ($k%2 == 1) bg-slate-50 @endif text-slate-600">
                    <td class="text-center"><img class='inline' src="{{ $user->gravatar(50); }}"></td>
                    <td class="overflow-hidden text-ellipsis break-all">
                        <a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a>
                        @if ($user->is_admin)[管理员]@endif 
                        <div class="sm:hidden">
                            <p>{{ $user->email }}</p>
                        </div>
                    </td>
                    <td class="hidden sm:table-cell">{{ $user->email }}</td>
                    <td class="hidden sm:table-cell">{{ $user->created_at }}</td>
                    <td class="text-center sm:text-left">
                        <a href="{{ route('users.show', $user->id) }}" class="bg-blue-600 hover:bg-blue-800 inline-block text-white rounded-sm px-2 py-2 w-16 text-center duration-500">详情</a>
                        @can('update', $user)
                        <a href="{{ route('users.edit', $user->id) }}" class="bg-green-600 hover:bg-green-800 inline-block text-white rounded-sm px-2 py-2 w-16 text-center duration-500">修改</a>
                        @endcan                        
                        @can('destroy', $user)
                        <a href="#" onclick=" if (confirm('确认删除么？')) { document.getElementById('delete_user_form_{{$user->id}}').submit(); return false; }" class="bg-red-600 hover:bg-red-800 inline-block text-white rounded-sm px-2 py-2 w-16 text-center duration-500">删除</a> 
                        <form action="{{ route('users.destroy', $user->id) }}" method="post" class="hidden" id="delete_user_form_{{$user->id}}">
                            @csrf
                            @method('DELETE')
                        </form>
                        @endcan         
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">{!! $users->render(); !!}</div>
    </div>



@endsection