<?php

declare(strict_types=1);

namespace deceitya\corepvp\database\impl;

use deceitya\corepvp\database\Database;
use deceitya\corepvp\database\PlayerGameInfoProvider;
use deceitya\corepvp\player\PlayerGameInfo;
use PDO;
use Ramsey\Uuid\UuidInterface;

class PlayerGameInfoProviderImpl implements PlayerGameInfoProvider
{
    /**
     * プレイヤーが参加していたゲームを取得
     * そのゲームのコア破壊回数をチームごとに集計して
     * プレイヤーが参加しているチームのほうがコア破壊数が多い場合の数を勝利とする
     * この勝利数を取得
     */
    private const SELECT_QUERY = <<<__SQL__
    SELECT
        player.id                       AS id,
        player.uuid                     AS uuid,
        player.name                     AS name,
        player.money                    AS money,
        player.level                    AS level,
        COUNT(DISTINCT kill.id)         AS kill_count,
        COUNT(DISTINCT death.id)        AS death_count,
        COUNT(DISTINCT join.id)         AS play_count,
        COUNT(DISTINCT destroy_core.id) AS destroy_core_count,
        (
            SELECT
            FROM join_destroying_core_histories 
        )
    FROM players                               AS player
    INNER JOIN join_destroying_core_histories  AS join         ON join.player         = player.id
    INNER JOIN destroy_core_histories          AS destroy_core ON destroy_core.player = player.id
    INNER JOIN death_histories                 AS death        ON death.dead          = player.id
    INNER JOIN death_histories                 AS kill         ON kill.killer         = player.id

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
        $filtered = array_filter($this->infos, function($infoID) use ($id) {
            return $infoID === $id;
        });
        if (count($filtered) > 0) {
            // resetで連想配列の一番最初の値が取得できる
            return reset($filtered);
        }

        // TODO
    }

    public function findByUUID(UuidInterface $uuid): ?PlayerGameInfo
    {
        if (isset($this->infos[$uuid])) {
            return $this->infos[$uuid];
        }

        $query = self::SELECT_QUERY;
        $query .= "WHERE player.uuid = :uuid;";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":uuid", $uuid);
        $stmt->execute();
        // 実行結果から1行のみ取得
        $result = $stmt->fetch(PDO::FETCH_ASSOC);


    }

    public function findByName(string $name): ?PlayerGameInfo
    {
    }

    public function store(PlayerGameInfo $info): bool
    {

    }
}