@if ($paginator->hasPages())
    <nav class="d-flex justify-content-center align-items-center text-center mt-5">
        <div class="row">
            <div class="col">
                <ul class="pagination">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <li class="disabled page-item" aria-disabled="true" aria-label="@lang('pagination.previous')">
                            <span aria-hidden="true" class="page-link">&lsaquo;</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a href="{{ $paginator->previousPageUrl() }}" class="page-link " rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                        </li>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <li class="disabled page-item" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="active page-item" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                                @else
                                    <li class="page-item"><a href="{{ $url }}" class="page-link">{{ $page }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <li class="page-item">
                            <a href="{{ $paginator->nextPageUrl() }}" class="page-link" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                        </li>
                    @else
                        <li class="disabled page-item" aria-disabled="true" aria-label="@lang('pagination.next')">
                            <span aria-hidden="true" class="page-link">&rsaquo;</span>
                        </li>
                    @endif
                </ul>
                <div>
                    <h6>Элементов на странице</h6>
                    <form method="get" action="{{url('bicycle')}}">
                        <div>
                            <select name="perpage" class="form-select">
                                <option value="1" @if($paginator->perPage() == 1) selected @endif>1</option>
                                <option value="2" @if($paginator->perPage() == 2) selected @endif>2</option>
                                <option value="3" @if($paginator->perPage() == 3) selected @endif>3</option>
                                <option value="4" @if($paginator->perPage() == 4) selected @endif>4</option>
                            </select>
                            <button  type="submit" class="btn btn-primary">Изменить</button>
                        </div>
                    </form>
                </div>
            </div>   
        </div>
    </nav>
@endif
