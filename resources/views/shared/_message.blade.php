@php
    $alert_style = [
        'success' => 'bg-green-100 border border-green-400 text-green-700',
        'warning' => 'bg-orange-100 border border-orange-400 text-orange-700',
        'notice' => 'bg-blue-100 border border-blue-400 text-blue-700',
        'danger' => 'bg-red-100 border border-red-400 text-red-700',
    ];
@endphp

@foreach (['success', 'warning', 'notice', 'danger'] as $msg)
    @if (session()->has($msg))
    <div class="{{ $alert_style[$msg] }} w-full p-4">
        <p class="text-sm">{{ session($msg) }}</p>
    </div>
    @endif
@endforeach