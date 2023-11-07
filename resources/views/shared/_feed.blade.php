<div class="w-full">
    @foreach ($posts as $post)
        @include('shared._post', ['user' => $post->user])
    @endforeach
    <div class="mt-10">
        {!! $posts->render(); !!}
    </div>
</div>