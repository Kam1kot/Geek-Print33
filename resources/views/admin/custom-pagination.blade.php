@if ($paginator->hasPages())
<nav>
    <ul class="pagination">

        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled"><span>«</span></li>
        @else
            <li class="page-item"><a href="{{ $paginator->previousPageUrl() }}" rel="prev">«</a></li>
        @endif

        {{-- First Page --}}
        @if($paginator->currentPage() > 2)
            <li class="page-item"><a href="{{ $paginator->url(1) }}">1</a></li>
        @endif

        {{-- Dots before current pages --}}
        @if($paginator->currentPage() > 3)
            <li class="page-item disabled"><span>…</span></li>
        @endif

        {{-- Pages around current --}}
        @for ($i = max(1, $paginator->currentPage() - 1); $i <= min($paginator->lastPage(), $paginator->currentPage() + 1); $i++)
            @if ($i == $paginator->currentPage())
                <li class="page-item active"><span>{{ $i }}</span></li>
            @else
                <li class="page-item"><a href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
            @endif
        @endfor

        {{-- Dots after current pages --}}
        @if($paginator->currentPage() < $paginator->lastPage() - 2)
            <li class="page-item disabled"><span>…</span></li>
        @endif

        {{-- Last Page --}}
        @if($paginator->currentPage() < $paginator->lastPage() - 1)
            <li class="page-item"><a href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a></li>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item"><a href="{{ $paginator->nextPageUrl() }}" rel="next">»</a></li>
        @else
            <li class="page-item disabled"><span>»</span></li>
        @endif

    </ul>
</nav>
@endif
