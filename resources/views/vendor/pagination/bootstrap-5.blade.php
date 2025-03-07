@if ($paginator->hasPages())
<nav class="d-flex align-items-center justify-content-between pagination-section">
    <div class="d-flex justify-content-between flex-fill d-sm-none pagination-page-links">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
            <li class="page-item disabled" aria-disabled="true">
                <span class="page-link">@lang('pagination.previous')</span>
            </li>
            @else
            <li class="page-item">
                <a class="page-link" href="javascript:void(0)" wire:click="previousPage" rel="prev">@lang('pagination.previous')</a>
            </li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="javascript:void(0)" wire:click="nextPage" rel="next">@lang('pagination.next')</a>
            </li>
            @else
            <li class="page-item disabled" aria-disabled="true">
                <span class="page-link">@lang('pagination.next')</span>
            </li>
            @endif
        </ul>
    </div>

    <div class="d-none flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between">
        <div class="showing-number-records">
            <p class="small text-muted">
                {!! __('cruds.Showing') !!}
                <span class="fw-semibold">{{ $paginator->firstItem() }}</span>
                {!! __('cruds.to') !!}
                <span class="fw-semibold">{{ $paginator->lastItem() }}</span>
                {!! __('cruds.of') !!}
                <span class="fw-semibold">{{ $paginator->total() }}</span>
                {!! __('cruds.results') !!}
            </p>
        </div>

        <div class="pagination-pages">
            <ul class="pagination">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="page-link" aria-hidden="true">&lsaquo;</span>
                </li>
                @else
                <li class="page-item">
                    <a class="page-link" href="javascript:void(0)" wire:click="previousPage" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                @else
                <li class="page-item"><a class="page-link" href="javascript:void(0)" wire:click="gotoPage({{ $page }})">{{ $page }}</a></li>
                @endif
                @endforeach
                @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="javascript:void(0)" wire:click="nextPage" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
                @else
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="page-link" aria-hidden="true">&rsaquo;</span>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
@endif