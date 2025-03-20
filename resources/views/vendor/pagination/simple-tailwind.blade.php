@if ($paginator->hasPages())
  <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between">
    @if ($paginator->onFirstPage())
      <x-button disabled>
        {!! __('pagination.previous') !!}
      </x-button>
    @else
      <a href="{{ $paginator->previousPageUrl() }}" rel="prev">
        <x-button>{!! __('pagination.previous') !!}</x-button>
      </a>
    @endif


    @if ($paginator->hasMorePages())
      <a href="{{ $paginator->nextPageUrl() }}" rel="next">
        <x-button>{!! __('pagination.next') !!}</x-button>
      </a>
    @else
      <x-button disabled>
        {!! __('pagination.next') !!}
      </x-button>
    @endif
  </nav>
@endif
