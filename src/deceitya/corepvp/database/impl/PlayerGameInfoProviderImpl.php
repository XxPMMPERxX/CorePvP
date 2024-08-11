<?php

declare(strict_types=1);

namespace deceitya\corepvp\database\impl;

use deceitya\corepvp\database\Database;
use deceitya\corepvp\database\PlayerGameInfoProvider;
use deceitya\corepvp\player\PlayerGameInfo;
use PDO;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class PlayerGameInfoProviderImpl implements PlayerGameInfoProvider
{
    private const SELECT_QUERY = <<<__SQL__
    SELECT
        player.id                       AS id,
        player.uuid                     AS uuid,
        latest_name.name                AS name,
        latest_money.money              AS money,
        latest_level.level              AS level,
        COUNT(DISTINCT kill.id)         AS kill_count,
        COUNT(DISTINCT death.id)        AS death_count,
        COUNT(DISTINCT join.id)         AS play_count,
        COUNT(DISTINCT destroy_core.id) AS destroy_core_count
    FROM players                      AS player

    -- プレイヤーの最新の名前を取得
    INNER JOIN (
        SELECT
            name.player   AS player
            name.new_name AS name
        FROM name_histories AS name
        WHERE name.player = player.id
        ORDER BY created_at DESC
        LIMIT 1
    )                                 AS latest_name  ON latest_name.player  = player.id

    -- プレイヤーの最新の所持金を取得
    INNER JOIN (
        SELECT
            money.player    AS player
            money.new_money AS money
        FROM money_histories AS money
        WHERE money.player = player.id
        ORDER BY created_at DESC
        LIMIT 1
    )                                 AS latest_moeny ON latest_moeny.player = player.id

    -- プレイヤーの最新のレベルを取得
    INNER JOIN (
        SELECT
            level.player    AS player
            level.new_level AS level
        FROM level_histories AS level
        WHERE level.player = player.id
        ORDER BY created_at DESC
        LIMIT 1
    )                                 AS latest_level ON latest_level.player = player.id

    INNER JOIN join_game_histories    AS join         ON join.player         = player.id
    INNER JOIN destroy_core_histories AS destroy_core ON destroy_core.player = player.id
    INNER JOIN death_histories        AS death        ON death.dead          = player.id
    INNER JOIN death_histories        AS kill         ON kill.killer         = player.id

    __SQL__;

    /** @var Database */
    private Database $db;
    /** @var array<UuidInferface,PlayerGameInfo> */
    private array $infos = [];

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function find(int $id): ?PlayerGameInfo
    {
        // IDでフィルターをかける
        $filtered = array_filter($this->infos, function (PlayerGameInfo $info) use ($id) {
            return $info->getID() === $id;
        });
        if (count($filtered) > 0) {
            return reset($filtered); // resetで連想配列の一番最初の値が取得できる
        }

        // SQL
        $query = self::SELECT_QUERY;
        $query .= "WHERE player.id = :id;";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC); // 実行結果から1行のみ取得
        if (!$result) return null;

        $info = $this->generatePlayerGameInfoFromResult($result);

        // 取得結果をメモリに保存
        $this->infos[$info->getUUID()] = $info;

        return $info;
    }

    public function findByUUID(UuidInterface $uuid): ?PlayerGameInfo
    {
        // メモリにデータが存在している場合はそれを返す
        if (isset($this->infos[$uuid])) {
            return $this->infos[$uuid];
        }

        // SQL
        $query = self::SELECT_QUERY;
        $query .= "WHERE player.uuid = :uuid;";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":uuid", $uuid);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC); // 実行結果から1行のみ取得
        if (!$result) return null;

        $info = $this->generatePlayerGameInfoFromResult($result);

        // 取得結果をメモリに保存
        $this->infos[$uuid] = $info;

        return $info;
    }

    public function findByName(string $name): ?PlayerGameInfo
    {
        // 名前でフィルターをかける
        $filtered = array_filter($this->infos, function (PlayerGameInfo $info) use ($name) {
            return $info->getName() === $name;
        });
        if (count($filtered) > 0) {
            return reset($filtered); // resetで連想配列の一番最初の値が取得できる
        }

        // SQL
        $query = self::SELECT_QUERY;
        $query .= "WHERE player.name = :name;";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":name", $name, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC); // 実行結果から1行のみ取得
        if (!$result) return null;

        $info = $this->generatePlayerGameInfoFromResult($result);

        // 取得結果をメモリに保存
        $this->infos[$info->getUUID()] = $info;

        return $info;
    }

    public function store(PlayerGameInfo $info): bool
    {
        return false;
    }

    private function generatePlayerGameInfoFromResult(array $result)
    {
        return new PlayerGameInfo(
            $result["id"],
            Uuid::fromString($result["uuid"]),
            $result["name"],
            $result["money"],
            $result["level"],
            $result["kill_count"],
            $result["death_count"],
            $result["play_count"],
            $result["destroy_core_count"]
        );
    }
}
