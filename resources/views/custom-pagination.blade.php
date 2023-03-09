<!-- @if ($paginator->lastPage() > 1)
<ul class="pagination">
    <li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
        <a href="{{ $paginator->url(1) }}">«</a>
    </li>
    @for ($i = 1; $i <= $paginator->lastPage(); $i++)
        <li class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
            <a href="{{ $paginator->url($i) }}">{{ $i }}</a>
        </li>
        @endfor
        <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
            <a href="{{ $paginator->url($paginator->currentPage()+1) }}">»</a>
        </li>
</ul>
@endif -->

@if ($paginator->lastPage() > 1)
    <ul class="pagination">
        <li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
            <a href="{{ ($paginator->currentPage() == 1) ? 'javascript:void(0)' : $paginator->url(1) }}">«</a>
        </li>
        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            @if($i >= $paginator->currentPage() - 2 && $i <= $paginator->currentPage() + 2)
                <li class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
                    <a href="{{ $paginator->url($i) }}">{{ $i }}</a>
                </li>
            @endif
        @endfor
        <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
            <a href="{{ ($paginator->currentPage() == $paginator->lastPage()) ? 'javascript:void(0)' : $paginator->url($paginator->currentPage()+1) }}">»</a>
        </li>
    </ul>
@endif
