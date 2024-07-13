<?php

namespace deceitya\corepvp\player;

use Ramsey\Uuid\UuidInterface;

class PlayerGameInfo
{
    /** @var int DBのID */
    private int $id;
    /** @var string プレイヤーのUUID */
    private UuidInterface $uuid;
    /** @var string プレイヤー名 */
    private string $name;
    /** @var int お金 */
    private int $money;
    /** @var int レベル */
    private float $level;
    /** @var int キル数 */
    private int $killCount;
    /** @var int デス数 */
    private int $deathCount;
    /** @var int プレイ回数 */
    private int $playCount;
    /** @var int コアを破壊した回数 */
    private int $breakCount;
    /** @var string 称号 */
    private string $tag;
}
