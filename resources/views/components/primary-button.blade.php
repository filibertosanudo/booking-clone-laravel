<button {{ $attributes->merge([
    'type' => 'submit',
    'class' => 'inline-flex items-center justify-center px-6 py-2 bg-[#003580] hover:bg-[#005fa3] border border-[#0071c2] rounded-lg font-bold text-base text-white transition focus:outline-none focus:ring-2 focus:ring-blue-200 focus:ring-offset-2'
]) }}>
    {{ $slot }}
</button>
