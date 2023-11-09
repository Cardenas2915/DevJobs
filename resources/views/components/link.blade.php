
@php
    $classes = "underline text-sm text-white hover:text-red-600";
@endphp
<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
