@if ($paginator->hasPages())
    <nav class="pagination-style-1 mt-3">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())

            @else
                <li>
                    <a wire:click="previousPage" wire:loading.attr="disabled" class="next" rel="prev" aria-label="@lang('pagination.previous')"><i class=" ti-angle-double-left "></i></a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><a>{{ $element }}</a></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li style="font-weight: bold; font-size: larger; width: 35px; height: 35px; display:flex; justify-content: center; align-items: center" class="active" aria-current="page">{{ $page }}</li>
                        @else
                            <li wire:key="paginator-page-{{ $page }}">
                                <a class="next" wire:click="gotoPage({{ $page }})" wire:loading.attr="disabled">
                                    {{ $page }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a wire:click="nextPage" wire:loading.attr="disabled" rel="next" class="next p-2" aria-label="@lang('pagination.next')">
                    <i class=" ti-angle-double-right "></i>
                </a>
            @else

            @endif
        </ul>
    </nav>
@endif
