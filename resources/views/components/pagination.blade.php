<div class="custom-paginator">
    @if ($paginator->hasPages())
        <div aria-label="{{ __('Pagination Navigation') }}"
        class="grid px-4 py-3 text-xsxxx font-semibold tracking-wide text-white sm:grid-cols-9xxx">
        
        <!-- Pagination -->
        <span class="flex col-span-4xxx mt-2xx sm:mt-autoxx sm:justify-endxx">
            <nav aria-label="Table navigation" class="mx-auto">
                <ul class="inline-flex items-center">
                    <li>
                        <button class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none  hover:text-orange-500" aria-label="Previous" rel="prev"
                            {{-- wire:click="previousPage" dusk="previousPage.after" --}}
                            @if ($paginator->onFirstPage())
                                disabled
                            @else
                                wire:click="previousPage" dusk="previousPage.after"
                            @endif
                        >
                            <svg class="w-5 h-5 fill-current" aria-hidden="true"
                                viewBox="0 0 20 20">
                                <path
                                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                    clip-rule="evenodd" fill-rule="evenodd"></path>
                            </svg>
                        </button>
                    </li>

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <li>
                                <span class="px-3 py-1">{{ $element }}</span>
                            </li>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li>
                                        <button class="px-3 py-1 text-orange-500 transition-colors duration-150 active:text-white hover:text-white rounded-md focus:outline-none">
                                            {{ $page }}
                                        </button>
                                    </li>
                                @else
                                    <li wire:key="paginator-page{{ $page }}">
                                        <button wire:click="gotoPage({{ $page }})" aria-label="{{ __('Go to page :page', ['page' => $page]) }}" class="px-3 py-1 rounded-md focus:outline-none hover:text-orange-500">
                                            {{ $page }}
                                        </button>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    <li>
                        <button class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none hover:text-orange-500" aria-label="Next"
                            {{-- wire:click="nextPage" dusk="nextPage.after" rel="next" --}}
                            @if ($paginator->hasMorePages())
                                wire:click="nextPage" dusk="nextPage.after" rel="next"
                            @else
                                disabled
                            @endif
                        >
                            <svg class="w-5 h-5 fill-current" aria-hidden="true"
                                viewBox="0 0 20 20">
                                <path
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd" fill-rule="evenodd"></path>
                            </svg>
                        </button>
                    </li>
                </ul>
            </nav>
        </span>
        
    @endif
</div>
    