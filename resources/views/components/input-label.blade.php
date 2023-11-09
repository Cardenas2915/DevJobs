@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-white text-sm font-bold uppercase']) }}>
    {{ $value ?? $slot }}
</label>
