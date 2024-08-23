<?php

declare(strict_types=1);

namespace vBulletin\Connection;

use PDO;
use vBulletin\Logger\Log;
use PDOException;
use vBulletin\Connection\Enum\Driver;

class DB
{
    private PDO $connection;

    public function __construct(
        private readonly Driver $driver,
        private readonly string $database,
        private readonly string $host,
        private readonly string $username,
        private readonly string $password,
    ) {}

    public function connect(): bool
    {
        if (isset($this->connection)) {
            return true;
        }

        try {
            $uri = sprintf(
                '%s:dbname=%s;host=%s',
                $this->driver->value,
                $this->database,
                $this->host
            );
            $this->connection = new PDO(
                $uri,
                $this->username,
                $this->password
            );
            Log::info('DB: connected to ' . $uri . '@' . $this->username);
        } catch (PDOException $exception) {
            Log::error('DB: failed to connect. ' . $exception->getMessage());
        }

        return isset($this->connection);
    }

    public function findSimilar(string $value): array
    {
        return $this->query(
            'SELECT * FROM vb_post WHERE text LIKE ?', ["%$value%"]
        );
    }

    public function find(int $id): array
    {
        return $this->query(
            'SELECT * FROM vb_searchresult WHERE searchid = ?', [$id]
        );
    }

    private function query(string $sql, array $options): array
    {
        if (! isset($this->connection)) {
            Log::warning('DB: connection not found. Please connect first.');
            return [];
        }

        try {
            $statement = $this->connection->prepare($sql);
            $statement->execute($options);
            Log::info('DB: executed command. ' . $statement->queryString);
        } catch (PDOException $exception) {
            Log::error('DB: failed to execute SQL. ' . $exception->getMessage());
            return [];
        }

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
