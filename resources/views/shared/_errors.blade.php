@if (count($errors) > 0) 
<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 my-4 rounded relative">
    <ul>
        @foreach ($errors->all() as $error)
    	<li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif