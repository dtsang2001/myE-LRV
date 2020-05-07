@if($paginator->hasPages())

<nav class="navigation pagination">
    <div class="nav-links">
		
		@if($paginator->onFirstPage())
		<a class="btn btn-dark-b" disabled>
            <span class="screen-reader-text">Prev</span>
            <i class="icon-Left-3"></i>
        </a>
        @else
        <a href="{{ $paginator->previousPageUrl() }}" class="btn btn-dark-b">
            <span class="screen-reader-text">Prev</span>
            <i class="icon-Left-3"></i>
        </a>
        @endif
		
		@foreach ($elements as $element)
			@if (is_array($element))
				@foreach ($element as $page => $url)

					@if ($page == $paginator->currentPage())
						<span class=" btn btn-dark-b current" style="background: black; color: #fff">{{ $page }}</span>

					@elseif ($page == $paginator->currentPage() - 1 || $page == $paginator->lastPage())
        				<a href="{{ $url }}" class="btn btn-dark-b"> {{ $page }} </a>

        			@elseif ($page == $paginator->currentPage() + 1 || $page == $paginator->lastPage())
        				<a href="{{ $url }}" class="btn btn-dark-b"> {{ $page }} </a>

        			@elseif ($page == $paginator->lastPage() - 1)
        				<span class=" btn btn-dark-b current">...</span>

        			@elseif ($page == $paginator->lastPage() - ($paginator->lastPage() - 1))
        				<a href="{{ $url }}" class="btn btn-dark-b"> {{ $page }} </a>

        			@elseif ($page == ($paginator->lastPage() - ($paginator->lastPage() - 1)) + 1)
        				<a href="{{ $url }}" class="btn btn-dark-b"> {{ $page }} </a>

        			@elseif ($page == ($paginator->lastPage() - ($paginator->lastPage() - 1)) + 2)
        				<span class=" btn btn-dark-b current">...</span>

        			@endif

        		@endforeach
        	@endif
        @endforeach
        
        @if ($paginator->hasMorePages())
		<a href="{{ $paginator->nextPageUrl() }}" class=" btn btn-dark-b ">
            <span class="screen-reader-text">Next</span>
            <i class="icon-Right-3"></i>
        </a>
        @else
        <a class=" btn btn-dark-b" disabled>
            <span class="screen-reader-text">Next</span>
            <i class="icon-Right-3"></i>
        </a>
        @endif

    </div>
</nav>

@endif