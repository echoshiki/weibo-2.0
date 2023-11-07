<div class="flex py-6 border-b space-x-6">
    <div class="flex flex-col sm:flex-row items-center space-x-2 w-24 border-r pr-4 ">
        <div class="w-16 2xl:w-20 lg:mr-2">
            <img class="border-2 border-slate-200 rounded-full" src="{{ $user->gravatar() }}" alt="">
        </div> 
    </div> 
    <div class=" w-[56rem] flex items-center border-r pr-4">
        <p class="text-slate-700 font-light text-md"><a href="{{ route('users.show', $user->id) }}"><span class="font-medium text-slate-800">{{ $user->name }}</span></a>: {{ $post->content }} <span class="text-sm italic text-slate-400 font-thin inline-block">[ {{ $post->created_at->diffForHumans(); }} ]</span></p>
    </div>
    @can('destroy', $post)            
    <div class="flex flex-col justify-center">
        <form method="post" action="{{ route('posts.destroy', $post->id) }}" class="mb-0" onsubmit="return confirm('确认要删除么？');">
            @csrf
            @method('DELETE')
            <button type="submit" class="block w-16 rounded-md bg-red-600 px-3 py-2 text-center text-xs font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">删除</button>
        </form>
    </div>
    @endcan
</div>