@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-semibold text-base text-[#003580] mb-1']) }}>
    {{ $value ?? $slot }}
</label>
