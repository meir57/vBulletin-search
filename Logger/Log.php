<?php

declare(strict_types=1);

namespace vBulletin\Logger;

use vBulletin\Logger\Interface\LogInterface;

class Log implements LogInterface
{
    private static string $filepath = 'Storage/logs.txt';

    public static function info(string $message)
    {
        file_put_contents(self::$filepath, '[INFO] ' . $message . "\n", FILE_APPEND);
        fwrite(fopen('php://stdout', 'w'), '[INFO] ' . $message . PHP_EOL);
    }

    public static function warning(string $message)
    {
        file_put_contents(self::$filepath, '[WARNING] ' . $message . "\n", FILE_APPEND);
        fwrite(fopen('php://stdout', 'w'), '[WARNING] ' . $message . PHP_EOL);
    }

    public static function error(string $message)
    {
        file_put_contents(self::$filepath, '[ERROR] ' . $message . "\n", FILE_APPEND);
        fwrite(fopen('php://stdout', 'w'), '[ERROR] ' . $message . PHP_EOL);
    }
}
