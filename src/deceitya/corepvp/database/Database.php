<?php

declare(strict_types=1);

namespace deceitya\corepvp\database;

use PDO;
use PDOStatement;

// とりまSQLite固定
class Database
{
    private ?PDO $db;

    public function open(string $connectUrl, string $user, string $password): bool
    {
        $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
        $this->db = new PDO($connectUrl, $user, $password, $options);

        return true;
    }

    public function close(): bool
    {
        // インスタンス破棄でクローズらしい
        $this->db = null;

        return true;
    }

    public function beginTransaction(): bool
    {
        return $this->db->beginTransaction();
    }

    public function commit(): bool
    {
        return $this->db->commit();
    }

    public function rollback(): bool
    {
        return $this->db->rollBack();
    }

    public function prepare(string $query): PDOStatement
    {
        return $this->db->prepare($query);
    }
}
