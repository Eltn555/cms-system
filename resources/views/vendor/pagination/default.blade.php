@if ($paginator->hasPages())
    <nav class="pagination-style-1 my-3">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())

            @else
                <a wire:click="previousPage" onclick="toTop()" wire:loading.attr="disabled" rel="next" class="next p-1 px-2 bg-light" aria-label="@lang('pagination.next')">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15 5L9 12L15 19" stroke="#232323" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            @endif

            @php
                $currentPage = $paginator->currentPage();
                $lastPage = $paginator->lastPage();
                $startPage = max($currentPage - 2, 1);
                $endPage = min($currentPage + 2, $lastPage);
            @endphp

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><a>{{ $element }}</a></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page >= $startPage && $page <= $endPage)
                            @if ($page == $paginator->currentPage())
                                <li style="font-size: larger; width: 35px; height: 35px;" class="mx-1 font-kyiv text-white bg-dark active d-flex justify-content-center align-items-center" aria-current="page">{{ $page }}</li>
                            @else
                                <li style="cursor: pointer" onclick="toTop()" class="mx-1 bg-light" wire:key="paginator-page-{{ $page }}" wire:click="gotoPage({{ $page }})">
                                    <a class="next bg-light" wire:loading.attr="disabled">
                                        {{ $page }}
                                    </a>
                                </li>
                            @endif
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a wire:click="nextPage" onclick="toTop()" wire:loading.attr="disabled" rel="next" class="next p-1 px-2 bg-light" aria-label="@lang('pagination.next')">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 5L15 12L9 19" stroke="#232323" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            @else

            @endif
        </ul>
    </nav>
@endif
