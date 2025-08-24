@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge([
    'class' => 'border border-[#003580] bg-white text-black px-4 py-2 rounded-lg shadow focus:border-blue-700 focus:ring-2 focus:ring-blue-200 transition placeholder-gray-400'
]) }}>
