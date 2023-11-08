{{-- <div class="max-w-[18rem] mx-auto"> --}}
<div class="">
    <div class="flex flex-col items-center sm:flex-row w-full justify-center">
        <div class="sm:mr-5 w-28">
            <img class="w-full border-4 border-slate-200 rounded-md" src="{{ $user->gravatar() }}" alt="">
        </div>
        <div class="text-center sm:text-left">
            <h2 class="font-bold text-4xl mb-2.5 mt-4 sm:mt-0">{{ $user->name }}</h2>
            <p class="font-thin text-sm text-slate-500 mb-3 text-center">< {{ $user->email }} ></p>
            @include('shared._follow_button')
        </div> 
    </div>
    <div class="flex justify-between w-56 mx-auto py-6 border-t border-b mt-6">
        <div class="w-1/3">
            <h2 class="text-center text-2xl font-bold font-mono"><a href="{{ route('users.show', $user); }}">{{ $user->posts->count(); }}</a></h2>
            <p class="font-light text-sm text-center">动态</p>
        </div>
        <div class="w-1/3">
            <h2 class="text-center text-2xl font-bold font-mono"><a href="{{ route('users.followings', $user); }}">{{ $user->followings->count(); }}</a></h2>
            <p class="font-light text-sm text-center">关注</p>
        </div>
        <div class="w-1/3">
            <h2 class="text-center text-2xl font-bold font-mono"><a href="{{ route('users.followers', $user); }}">{{ $user->followers->count(); }}</a></h2>
            <p class="font-light text-sm text-center">粉丝</p>
        </div>
    </div>
</div>