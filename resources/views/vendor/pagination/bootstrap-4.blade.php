@if ($paginator->hasPages())
    <div class="table-footer d-flex align-items-center pagination1">
        <div class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <a class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="" aria-hidden="true">&#8249;</span>
                </a>
            @else
                <a class="" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&#8249;</a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <a class="disabled" aria-disabled="true">
                        <span class="">{{ $element }}</span>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <a class="active" aria-current="page">
                                <span class="">{{ $page }}</span>
                            </a>
                        @else
                            <a class="" href="{{ $url }}">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a class="" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&#8250;</a>
            @else
                <a class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="" aria-hidden="true">&#8250;</span>
                </a>
            @endif
            </div>
    </div>
@endif
