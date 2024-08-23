<?php

declare(strict_types=1);

namespace vBulletin\Search;

use vBulletin\Connection\DB;

class Search
{
    public function __construct(
       private readonly DB $database, 
    ) {
    }

    public function searchProcess(string $value): array
    {
        return $this->database->findSimilar($value);
    }

    public function searchResults(int $id): array
    {
        return $this->database->find($id);
    }
}
