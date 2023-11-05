<div class="bg-gray-800">
    <div class="2xl:max-w-screen-2xl xl:max-w-screen-xl mx-auto h-16 flex justify-between items-center px-4">
        <div class="w-auto">
            <a href="/" class="text-white font-mono subpixel-antialiased">Weibo 2.0</a>
        </div>

        <div class="w-66 flex font-sans font-light text-sm">

            <div class="flex justify-center space-x-2">
                <a href="/" class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium">首页</a>
                <a href="/" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">广场</a>
                <a href="{{ route('users.index') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">用户</a>
            </div>

            <div class="ml-5">  
                @if (Auth::check())
                    <div>
                        <button type="button" class="relative group">
                            <a href="{{ route('users.show', [Auth::user()]) }}"><img class="h-9 w-9 rounded-full" src="{{ Auth::user()->gravatar('36') }}" alt=""></a>
                            <ul class="absolute right-0 top-full w-36 bg-slate-700 rounded-md px-3 py-4 text-sm leading-loose opacity-100 hidden group-hover:block">
                                <li class="hover:bg-slate-600 rounded-sm"><a href="{{ route('users.show', [Auth::user()]) }}" class="text-slate-100">个人中心</a></li>
                                <li class="hover:bg-slate-600 rounded-sm"><a href="{{ route('users.edit',[Auth::user()]) }}" class="text-slate-100">修改资料</a></li>
                                <li class="hover:bg-slate-600 rounded-sm">
                                    <a href="#" onclick="document.getElementById('logout_form').submit(); return false;" class="text-slate-100">登出</a>
                                </li>
                            </ul>
                        </button> 
                    </div> 
                    <form action="{{ route('logout') }}" method="post" id="logout_form" class="hidden"> 
                        @method('DELETE')
                        @csrf
                    </form>
                @else
                    <div class="flex justify-center"><a href="/login" class=" text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">登录</a></div>
                @endif
            </div>

        </div>

    </div>
</div>