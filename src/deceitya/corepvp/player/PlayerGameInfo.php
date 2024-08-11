<?php

declare(strict_types=1);

namespace deceitya\corepvp\player;

use Ramsey\Uuid\UuidInterface;

class PlayerGameInfo
{
    /**
     * コンストラクタ
     *
     * @param integer       $id                      DB上のプレイヤーID
     * @param UuidInterface $uuid                    プレイヤーUUID
     * @param string        $name                    プレイヤー名
     * @param integer       $money                   所持金
     * @param integer       $level                   レベル
     * @param integer       $killCount               キル数
     * @param integer       $deathCount              デス数
     * @param integer       $destroyingCorePlayCount コア破壊プレイ回数
     * @param integer       $destroyCoreCount        コアを破壊した回数
     * @param integer       $destroyingCoreWinCount  コア破壊勝利数
     * @param string        $tag                     称号
     */
    public function __construct(
        private int $id,
        private UuidInterface $uuid,
        private string $name,
        private int $money = 0,
        private float $level = 0,
        private int $killCount = 0,
        private int $deathCount = 0,
        private int $destroyingCorePlayCount = 0,
        private int $destroyCoreCount = 0,
        private int $destroyingCoreWinCount = 0,
        private string $tag = ""
    ) {
        $this->id = $id;
        $this->uuid = $uuid;
        $this->name = $name;
        $this->money = $money;
        $this->level = $level;
        $this->killCount = $killCount;
        $this->deathCount = $deathCount;
        $this->destroyingCorePlayCount = $destroyingCorePlayCount;
        $this->destroyCoreCount = $destroyCoreCount;
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

    public function getDestroyingCorePlayCount(): int
    {
        return $this->destroyingCorePlayCount;
    }

    public function increaseDestroyingCorePlayCount(int $amount = 1): bool
    {
        if ($amount < 0) return false;

        $this->destroyingCorePlayCount += $amount;
        return true;
    }

    public function getDestroyCoreCount(): int
    {
        return $this->destroyCoreCount;
    }

    public function increaseDestroyCoreCount(int $amount = 1): bool
    {
        if ($amount < 0) return false;

        $this->destroyCoreCount += $amount;
        return true;
    }

    public function getDestroyingCoreWinCount(): int
    {
        return $this->destroyingCoreWinCount;
    }

    public function increaseDestroyingCoreWinCount(int $amount = 1): bool
    {
        if ($amount < 0) return false;

        $this->destroyingCoreWinCount += $amount;
        return true;
    }
}
