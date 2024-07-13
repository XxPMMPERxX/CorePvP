<?php

namespace deceitya\corepvp\model;

use Ramsey\Uuid\UuidInterface;

class Account
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
    private int $kill;
    /** @var int デス数 */
    private int $death;
    /** @var int プレイ回数 */
    private int $playCount;
    /** @var int コアを破壊した回数 */
    private int $breakCount;
    /** @var string 称号 */
    private string $tag;
}
