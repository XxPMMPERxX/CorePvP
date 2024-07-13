<?php

declare(strict_types=1);

namespace deceitya\corepvp\player;

use Ramsey\Uuid\UuidInterface;

class PlayerGameInfo
{
    /** @var int DBのID */
    private int $id;
    /** @var UuidInterface プレイヤーのUUID */
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
    private int $breakCoreCount;
    /** @var string 称号 */
    private string $tag;

    public function __construct(int $id, UuidInterface $uuid, string $name, int $money = 0, float $level = 0, int $killCount = 0, int $deathCount = 0, int $playCount = 0, int $breakCoreCount = 0, string $tag = "")
    {
        $this->id = $id;
        $this->uuid = $uuid;
        $this->name = $name;
        $this->money = $money;
        $this->level = $level;
        $this->killCount = $killCount;
        $this->deathCount = $deathCount;
        $this->playCount = $playCount;
        $this->breakCoreCount = $breakCoreCount;
        $this->tag = $tag;
    }

    public function getID(): int
    {
        return $this->id;
    }

    public function getUUID(): UuidInterface
    {
        return $this->uuid;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getMoney(): int
    {
        return $this->money;
    }

    public function setMoney(int $money): bool
    {
        // 引数が0未満の場合はfalse
        if ($money < 0) return false;

        $this->money = $money;
        return true;
    }

    public function increaseMoney(int $amount): bool
    {
        if ($amount < 0) return false;

        return $this->setMoney($this->money + $amount);
    }

    public function decreaseMoney(int $amount): bool
    {
        if ($amount < 0) return false;

        return $this->setMoney($this->money - $amount);
    }

    public function getLevel(): float
    {
        return $this->level;
    }

    public function setLevel(float $level): bool
    {
        if ($level < 0) return false;

        $this->level = $level;
        return true;
    }

    public function increaseLevel(float $amount): bool
    {
        if ($amount < 0) return false;

        return $this->setLevel($this->level + $amount);
    }

    public function getKillCount(): int
    {
        return $this->killCount;
    }

    public function increaseKillCount(int $amount = 1): bool
    {
        if ($amount < 0) return false;

        $this->killCount += $amount;
        return true;
    }

    public function getDeathCount(): int
    {
        return $this->deathCount;
    }

    public function increaseDeathCount(int $amount = 1): bool
    {
        if ($amount < 0) return false;

        $this->deathCount += $amount;
        return true;
    }

    public function getPlayCount(): int
    {
        return $this->playCount;
    }

    public function increasePlayCount(int $amount = 1): bool
    {
        if ($amount < 0) return false;

        $this->playCount += $amount;
        return true;
    }

    public function getBreakCoreCount(): int
    {
        return $this->breakCoreCount;
    }

    public function increaseBreakCoreCount(int $amount = 1): bool
    {
        if ($amount < 0) return false;

        $this->breakCoreCount += $amount;
        return true;
    }
}
