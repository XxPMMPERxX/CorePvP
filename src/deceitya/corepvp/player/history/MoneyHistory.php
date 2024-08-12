<?php

declare(strict_types=1);

namespace deceitya\corepvp\player\history;

use DateTime;

/**
 * 所持金履歴
 */
class MoneyHistory
{
    /**
     * @param integer $id         履歴ID
     * @param integer $oldMoney   更新前金額
     * @param integer $newMoney   更新後金額
     * @param string|null $reason 更新理由
     * @param DateTime $datetime  更新日
     */
    public function __construct(
        private int $id,
        private int $oldMoney,
        private int $newMoney,
        private ?string $reason,
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
     * 更新前の所持金を取得
     *
     * @return integer
     */
    public function getOldMoney(): int
    {
        return $this->oldMoney;
    }

    /**
     * 更新後の所持金を取得
     *
     * @return integer
     */
    public function getNewMoney(): int
    {
        return $this->newMoney;
    }

    /**
     * 更新理由を取得
     *
     * @return string|null
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
