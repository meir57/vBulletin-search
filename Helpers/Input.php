<?php

declare(strict_types=1);

namespace vBulletin\Helpers;

class Input
{
    public static function sanitize(string $value): string
    {
        return strip_tags(htmlentities($value));
    }
}
