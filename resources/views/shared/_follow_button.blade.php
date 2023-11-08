@can('follow', $user)
<div class="text-center">
    @if (Auth::user()->isFollowing($user)) 
    <form action="{{ route('users.unfollow', $user->id) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="inline-block w-full border border-orange-500 rounded-sm py-1.5 text-center text-sm font-normal text-orange-500 shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2">已关注</button>
    </form>     
    @else
    <form action="{{ route('users.follow', $user->id) }}" method="post">
        @csrf
        <button type="submit" class="inline-block w-full rounded-sm bg-orange-600 py-1.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-orange-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600">关注</button>
    </form>
    @endif
</div>

@endcan