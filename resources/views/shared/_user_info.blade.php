
<div class="flex flex-col items-center sm:flex-row">
    <div class="sm:mr-4">
        <img class="border-4 border-slate-200 rounded-md" src="{{ $user->gravatar('100') }}" alt="">
    </div>
    <div class="text-center sm:text-left">
        <h2 class="font-bold text-4xl mb-2.5 mt-4 sm:mt-0">{{ $user->name }}</h2>
        <p class="font-thin text-md text-slate-400">{{ $user->email }}</p>
        <p class="font-thin text-md text-slate-400">{{ $user->created_at }}</p>
    </div> 
</div>