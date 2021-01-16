@if ($paginator->hasPages())
<div class="pagination">
        @if ($paginator->onFirstPage())
        
    @else
        
        <a href="{{ $paginator->previousPageUrl() }}" class="prev page-numbers">« Previous</a>
    @endif
        
        
        @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
        <a href="#" class="page-numbers">{{ $element }}</a>
            
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <span class="page-numbers current">{{ $page }}</span> 
                   
                @else
                <a href="{{ $url }}" class="page-numbers">{{ $page }}</a>
                   
                @endif
            @endforeach
        @endif
    @endforeach
    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
    <a href="{{ $paginator->nextPageUrl() }}" class="next page-numbers">Next »</a></div>
    
@else

@endif
   
@endif