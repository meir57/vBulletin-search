<?php

declare(strict_types=1);

namespace vBulletin\Connection\Enum;

enum Driver: string
{
    case MYSQL = 'mysql';
    case SQLITE = 'sqlite';
    case POSTGRES = 'pgsql';
}
