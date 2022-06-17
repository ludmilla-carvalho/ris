<div class="md:col-span-1 flex justify-between">
    {{-- px-4 sm:px-0 --}}
    <div class="">
        <h3 class="text-lg font-medium text-white">{{ $title }}</h3>

        <p class="mt-1 text-sm text-stone-400">
            {{ $description }}
        </p>
    </div>

    <div class="px-4 sm:px-0">
        {{ $aside ?? '' }}
    </div>
</div>
