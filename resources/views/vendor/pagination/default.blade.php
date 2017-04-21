@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a class="paginate_button previous disabled" >Previous</a>
        @else
            <a class="paginate_button previous" href="{{ $paginator->previousPageUrl() }}" rel="prev">Previous</a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <a class="disabled">{{ $element }}</a>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a class="paginate_button current">{{ $page }}</a>
                    @else
                        <a class="paginate_button" href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a class="paginate_button next" href="{{ $paginator->nextPageUrl() }}" rel="next">Next</a>
        @else
            <a class="paginate_button next disabled">Next</a>
        @endif
    </ul>
@endif
