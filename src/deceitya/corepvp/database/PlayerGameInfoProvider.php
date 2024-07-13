<?php

declare(strict_types=1);

namespace deceitya\corepvp\database;

use deceitya\corepvp\player\PlayerGameInfo;
use Ramsey\Uuid\UuidInterface;

interface PlayerGameInfoProvider
{
    public function find(int $id): PlayerGameInfo;

    public function findByUUID(UuidInterface $uuid): PlayerGameInfo;

    public function findByName(string $name): PlayerGameInfo;

    public function store(PlayerGameInfo $info): bool;
}
