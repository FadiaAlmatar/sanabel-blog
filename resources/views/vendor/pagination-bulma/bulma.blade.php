@if ($paginator->hasPages())
  <nav class="pagination is-centered is-rounded" role="navigation" aria-label="pagination">
    @unless ($paginator->onFirstPage())
      <a class="pagination-previous" href="{{ $paginator->previousPageUrl() }}" style="text-decoration: none">Previous</a>
    @endunless
    @if ($paginator->hasMorePages())
      <a class="pagination-next" href="{{ $paginator->nextPageUrl() }}" style="text-decoration: none">Next page</a>
    @endif
    <ul class="pagination-list">
      {{-- Pagination Elements --}}
      @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
          <span class="pagination-ellipsis">&hellip;</span>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
          @foreach ($element as $page => $url)
            @if ($page == $paginator->currentPage())
              <li>
                <a class="pagination-link is-current" aria-label="Page {{ $page }}"
                   aria-current="page">{{ $page }}</a>
              </li>
            @else
              <li>
                <a href="{{ $url }}" class="pagination-link"
                   aria-label="Goto page {{ $page }}">{{ $page }}</a>
              </li>
            @endif
          @endforeach
        @endif
      @endforeach

    </ul>
  </nav>
@endif
