@if ($paginator->hasPages())
    <nav class="hrm-pagenavi d-flex justify-content-center align-items-center">
        <div class="d-inline-block">
            <ul class="page-numbers d-flex p-2 my-4 bg-white rounded-pill  border ">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="disabled d-none"><span>←</span></li>
                @else
                    <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">←</a></li>
                @endif

                @if($paginator->currentPage() > 3)
                    <li class=""><a href="{{ $paginator->url(1) }}">1</a></li>
                @endif
                @if($paginator->currentPage() > 4)
                    <li ><a>...</a></li>
                @endif
                @foreach(range(1, $paginator->lastPage()) as $i)
                    @if($i >= $paginator->currentPage() - 2 && $i <= $paginator->currentPage() + 2)
                        @if ($i == $paginator->currentPage())
                            <li class="current" aria-current="page"><a class="page-numbers" href="#">{{$i}}</a></li>
                            {{-- <li class="current"> <span>{{ $i }}</span></li> --}}
                        @else
                            <li><a href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
                        @endif
                    @endif
                @endforeach
                @if($paginator->currentPage() < $paginator->lastPage() - 3)
                    <li><a>...</a></li>
                @endif
                @if($paginator->currentPage() < $paginator->lastPage() - 2)
                    <li class="hidden-xs"><a href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a></li>
                @endif

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">→</a></li>
                @else
                    <li class="d-none"><span>→</span></li>
                @endif
            </ul>
        </div>
    </nav>
@endif
