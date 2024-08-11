<?php

declare(strict_types=1);

namespace deceitya\corepvp\database;

use deceitya\corepvp\player\PlayerGameInfo;
use Ramsey\Uuid\UuidInterface;

interface PlayerGameInfoProvider
{
    /**
     * IDからプレイヤーデータ取得
     *
     * @param integer $id
     * @return PlayerGameInfo|null
     */
    public function find(int $id): ?PlayerGameInfo;

    /**
     * プレイヤーのUUIDからプレイヤーデータ取得
     *
     * @param UuidInterface $uuid
     * @return PlayerGameInfo|null
     */
    public function findByUUID(UuidInterface $uuid): ?PlayerGameInfo;

    /**
     * プレイヤー名からプレイヤーデータ取得
     *
     * @param string $name
     * @return PlayerGameInfo|null
     */
    public function findByName(string $name): ?PlayerGameInfo;

    /**
     * プレイヤーデータ保存
     *
     * @param PlayerGameInfo $info
     * @return boolean
     */
    public function store(PlayerGameInfo $info): bool;
}
