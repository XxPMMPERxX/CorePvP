<?php

declare(strict_types=1);

namespace deceitya\corepvp\player\history;

use DateTime;

class DestroyCoreHistory
{
    /**
     * @param integer $id        履歴ID
     * @param integer $game      ゲームID
     * @param DateTime $datetime 破壊日時
     */
    public function __construct(
        private int $id,
        private int $game,
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
     * ゲームIDを取得
     *
     * @return integer
     */
    public function getGame(): int
    {
        return $this->game;
    }

    /**
     * 破壊日時を取得
     *
     * @return DateTime
     */
    public function getDateTime(): DateTime
    {
        return $this->datetime;
    }
}