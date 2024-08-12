<?php

declare(strict_types=1);

namespace deceitya\corepvp\player\history;

use DateTime;

/**
 * プレイヤー名更新履歴
 */
class NameHistory
{
    /**
     * @param integer $id         履歴ID
     * @param string $oldName     更新前名
     * @param string $newName     更新後名
     * @param string|null $reason 更新理由
     * @param DateTime $datetime  更新日
     */
    public function __construct(
        private int $id,
        private string $oldName,
        private string $newName,
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
     * 更新前の名前を取得
     * 
     * @return string
     */
    public function getOldName(): string
    {
        return $this->oldName;
    }

    /**
     * 更新後の名前を取得
     *
     * @return string
     */
    public function getNewName(): string
    {
        return $this->newName;
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
