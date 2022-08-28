@if ($paginator->hasPages())
    <div class="pro-pagination-style text-center mt-10">
        <ul >
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
{{--                 <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="page-link" aria-hidden="true">&lsaquo;</span>
                </li> --}}
                <li ><a class="disabled prev" href="#"><i class="icon-arrow-left"></i></a></li>
            @else
{{--                 <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li> --}}
                <li ><a class="prev" href="{{ $paginator->previousPageUrl() }}"><i class="icon-arrow-left"></i></a></li>

            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))

                    <li class="disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>

                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            {{-- <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li> --}}
                                    <li><a class="active" href="#">{{ $page }}</a></li>

                        @else
                            {{-- <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li> --}}
                            <li><a  href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
{{--                     <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li> --}}
                <li><a class="next" href="{{ $paginator->nextPageUrl() }}"><i class="icon-arrow-right"></i></a></li>
            @else
{{--                 <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="page-link" aria-hidden="true">&rsaquo;</span>
                </li> --}}
                <li><a class="disabled next" href="#"><i class="icon-arrow-right"></i></a></li>
            @endif
        </ul>
    </div>
@endif
