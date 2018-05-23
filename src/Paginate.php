<?php namespace GeneaLabs\LaravelCollectionMacros;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

class Paginate
{
    /**
    * @SuppressWarnings(PHPMD.StaticAccess)
    */
    public function __construct()
    {
        (new Collection)->macro(
            "paginate",
            function (
                int $perPage = 15,
                string $pageName = "page",
                int $currentPage = null,
                array $options = []
            ) : LengthAwarePaginator {
                $currentPage = $currentPage
                    ?: LengthAwarePaginator::resolveCurrentPage($pageName);
                $options["path"] = $options["path"]
                    ?? LengthAwarePaginator::resolveCurrentPath();
                $options["pageName"] = $pageName;

                return new LengthAwarePaginator(
                    $this->forPage($currentPage, $perPage),
                    $this->count(),
                    $perPage,
                    $currentPage,
                    $options
                );
            }
        );
    }
}
