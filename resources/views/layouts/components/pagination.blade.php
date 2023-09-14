@if ($paginator->hasPages())

    <nav aria-label="Pagination">
        <hr class="my-0" />
        <ul class="pagination justify-content-center my-4">
            @if ($paginator->onFirstPage())
                <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1"
                        aria-disabled="true">Previous</a></li>
            @else
                <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}" tabindex="-1"
                        aria-disabled="true">Previous</a></li>
            @endif
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                {{-- @if (is_string($element))
                        <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                    @endif --}}

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page"><span
                                    class="page-link">{{ $page }}</span></li>
                        @else
                            <li class="page-item"><a class="page-link"
                                    href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach




            @if ($paginator->hasMorePages())
                <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}">Next</a></li>
            @else
                <li class="page-item disabled"><a class="page-link" href="#!">Next</a></li>
            @endif
        </ul>
    </nav>
@endif
