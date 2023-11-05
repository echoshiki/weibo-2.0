<div class="py-1 my-6">
    <div class="border-b border-gray-200">
        <h1 class="text-2xl leading-loose font-bold text-center sm:text-left">
            {{ $title }}
        </h1>
    </div>
    <p class="text-sm leading-10 font-normal text-center sm:text-left">
        {{ $subtitle }}
    </p>
</div>

@include('shared._errors')   
@include('shared._message')