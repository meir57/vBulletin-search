<?php

declare(strict_types=1);

namespace vBulletin\Render;

class View
{
    public static function renderSearchResults(array $results): void
    {
        foreach ($results as $result) {
            if ($result['forumid'] == 5) {
                continue;
            }

            self::renderSearchResult($result);
        }
    }

    public static function renderSearchResult(mixed $result): void
    {
        if (gettype($result) == 'string') {
            echo $result;
            return;
        }

        echo '<pre>'. var_export($result, true) . '</pre>';
    }
}
