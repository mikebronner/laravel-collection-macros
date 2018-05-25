<?php namespace GeneaLabs\LaravelCollectionMacros;

use Illuminate\Support\Collection;

class ImplodeRecursive
{
    /**
    * @SuppressWarnings(PHPMD.UnusedLocalVariable)
    */
    public function __construct()
    {
        (new Collection)->macro(
            "implodeRecursive",
            function (string $glue = ", ") : string {
                $result = "";

                foreach ($this as $value) {
                    if (is_iterable($value)) {
                        $result .= collect($value)->implodeRecursive($glue);

                        continue;
                    }

                    if ($result) {
                        $result .= $glue;
                    }

                    $result .= $value;
                }

                return $result;
            }
        );
    }
}
