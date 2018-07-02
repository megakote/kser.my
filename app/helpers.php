<?
use Illuminate\Support\Collection;

function paginate($items, $perPage = 5)
{
    $items = $items instanceof Collection ? $items : Collection::make($items);

    $pageStart = request('page', 1);
    $offSet    = ($pageStart * $perPage) - $perPage;
    $itemsForCurrentPage = $items->slice($offSet, $perPage);

    return new Illuminate\Pagination\LengthAwarePaginator(
        $itemsForCurrentPage, $items->count(), $perPage,
        Illuminate\Pagination\Paginator::resolveCurrentPage(),
        ['path' => Illuminate\Pagination\Paginator::resolveCurrentPath()]
    );
}