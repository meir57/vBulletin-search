<?php

declare(strict_types=1);

namespace vBulletin\Logger\Interface;

interface LogInterface
{
    public static function info(string $message);

    public static function warning(string $message);

    public static function error(string $message);
}
