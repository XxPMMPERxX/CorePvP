<?php

declare(strict_types=1);

namespace deceitya\corepvp\player\history;

use DateTime;

/**
 * レベル履歴
 */
class LevelHistory
{
    /**
     * @param integer $id         履歴ID
     * @param float $oldLevel     更新前レベル
     * @param float $newLevel     更新後レベル
     * @param string|null $reason 更新理由
     * @param DateTime $datetime  更新日時
     */
    public function __construct(
        private int $id,
        private float $oldLevel,
        private float $newLevel,
        private string|null $reason,
        private DateTime $datetime
    ) {}

    /**
     * 履歴IDを取得
     *
     * @return integer
     */
    public function getID(): int
    {
        return $this->id;
    }

    /**
     * 更新前レベルを取得
     *
     * @return float
     */
    public function getOldLevel(): float
    {
        return $this->oldLevel;
    }

    /**
     * 更新後レベルの取得
     *
     * @return float
     */
    public function getNewLevel(): float
    {
        return $this->newLevel;
    }

    /**
     * 更新理由を取得
     *
     * @return string
     */
    public function getReason(): ?string
    {
        return $this->reason;
    }
    
    /**
     * 更新日時を取得
     *
     * @return DateTime
     */
    public function getDateTime(): DateTime
    {
        return $this->datetime;
    }
}
