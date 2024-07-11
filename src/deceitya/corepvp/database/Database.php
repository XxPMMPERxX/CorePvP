<?php

namespace deceitya\corepvp\database;

use PDO;

// とりまSQLite固定
class Database
{
    private string $file;
    private PDO $db;

    public function __construct(string $file)
    {
        $this->file = $file;
    }

    public function open(): bool
    {
        $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
        $this->db = new PDO("sqlite:{$this->file}", options:$options);

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
}