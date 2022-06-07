{{-- <button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button> --}}

<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-white border border-orange-500 rounded-md font-semibold text-xs text-orange-500 uppercase tracking-widest shadow-sm hover:text-orange-400 hover:border-orange-400 focus:outline-none focus:border-orange-400 active:text-orange-400 focus:outline-none disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button>
