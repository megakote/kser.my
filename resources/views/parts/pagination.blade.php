@php($link_limit = 7)
@if ($paginator->lastPage() > 1)
    <ul class="pagination">
        <li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
            <a class="arrow left2-arrow" href="{{ $paginator->url(1) }}"></a>
        </li>
        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            <?php
            $half_total_links = floor($link_limit / 2);
            $from = $paginator->currentPage() - $half_total_links;
            $to = $paginator->currentPage() + $half_total_links;
            if ($paginator->currentPage() < $half_total_links) {
                $to += $half_total_links - $paginator->currentPage();
            }
            if ($paginator->lastPage() - $paginator->currentPage() < $half_total_links) {
                $from -= $half_total_links - ($paginator->lastPage() - $paginator->currentPage()) - 1;
            }
            ?>
            @if ($from < $i && $i < $to)
                <li>
                    <a class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }}" href="{{ $paginator->url($i) }}">{{ $i }}</a>
                </li>
            @endif
        @endfor
        <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
            <a class="arrow right2-arrow" href="{{ $paginator->url($paginator->lastPage()) }}"></a>
        </li>
    </ul>
@endif

{{--<ul class="pagination">--}}
    {{--<li><a href="#" class="arrow left2-arrow"></a></li>--}}
    {{--<li><a href="#" class="arrow left-arrow"></a></li>--}}
    {{--<li><a href="#" class="active">1</a></li>--}}
    {{--<li><a href="#">2</a></li>--}}
    {{--<li><a href="#">3</a></li>--}}
    {{--<li><a href="#">4</a></li>--}}
    {{--<li>...</li>--}}
    {{--<li><a href="#">14</a></li>--}}
    {{--<li><a href="#" class="arrow right-arrow"></a></li>--}}
    {{--<li><a href="#" class="arrow right2-arrow"></a></li>--}}
{{--</ul>--}}