<?php

declare(strict_types=1);

namespace deceitya\corepvp\player\history;

use DateTime;

/**
 * ゲーム参加履歴
 */
class JoinGameHisotry
{
    /**
     * @param integer $id        履歴ID
     * @param integer $game      参加したゲーム
     * @param integer $teamID    参加チームID
     * @param string  $teamName  参加チーム名
     * @param DateTime $datetime 参加日時
     */
    public function __construct(
        private int $id,
        private int $game,
        private int $teamID,
        private string $teamName,
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
     * 参加したゲームを取得
     *
     * @return integer
     */
    public function getGame(): int
    {
        return $this->game;
    }

    /**
     * 参加したチームIDを取得
     *
     * @return integer
     */
    public function getTeamID(): int
    {
        return $this->teamID;
    }

    /**
     * 参加したチームの名前を取得
     *
     * @return string
     */
    public function getTeamName(): string
    {
        return $this->teamName;
    }

    /**
     * 参加した日時を取得
     *
     * @return DateTime
     */
    public function getDateTime(): DateTime
    {
        return $this->datetime;
    }
}
