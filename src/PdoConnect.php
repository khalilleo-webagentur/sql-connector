<?php

declare(strict_types=1);

namespace Khalilleo\Connector;

use PDO;

final class PdoConnect
{
    public PDO $pdo;

    public function __construct(
        private readonly string $host,
        private readonly string $dbName,
        private readonly string $username,
        private readonly string $password
    ) {
        $this->pdo = $this->connect($host, $dbName, $username, $password);
    }

    private function connect(): PDO
    {
        set_exception_handler(function ($e) {
            exit($e->getMessage());
        });

        $dsn = sprintf("mysql:host=%s;dbname=%s;charset=utf8mb4", $this->host, $this->dbName);

        $options = [
            PDO::ATTR_EMULATE_PREPARES   => true,
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];

        return new PDO($dsn, $this->username, $this->password, $options);
    }
}
