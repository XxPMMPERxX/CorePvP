<?php

namespace deceitya\corepvp\game;

use DateTime;
use Generator;
use pocketmine\player\Player;

abstract class Game
{
    /** @var int ゲームID */
    protected int $id;
    /** @var Player[] 参加しているプレイヤー */
    protected array $players = [];
    /** @var Generatror ゲームフロー */
    protected Generator $flow;
    /** @var DateTime 開始時刻 */
    protected ?DateTime $beganAt;
    /** @var DateTime 終了時刻 */
    protected ?DateTime $endedAt;

    public function __construct(int $id)
    {
        $this->id = $id;
        $this->flow = $this->flow();
    }

    /**
     * ゲームのID取得
     */
    public function getID(): int
    {
        return $this->id;
    }

    /**
     * ゲーム開始時刻を取得
     */
    public function getBecanDateTime(): ?DateTime
    {
        return $this->beganAt;
    }

    /**
     * ゲーム終了時刻を取得
     */
    public function getEndedDateTime(): ?DateTime
    {
        return $this->endedAt;
    }

    /**
     * プレイヤーが参加しているかどうか
     */
    public function isPlayerJoined(Player $player): bool
    {
        return in_array($player, $this->players, true);
    }

    /**
     * プレイヤーを参加させる
     * @param Player $player 参加させるプレイヤー
     * @return bool 参加できたならtrue、すでにいる場合もtrue
     */
    public function addPlayer(Player $player): bool
    {
        if (!$this->isPlayerJoined($player)) {
            $this->players[] = $player;
            return true;
        }

        return true;
    }

    /**
     * プレイヤーを退会させる
     * @param Player $player プレイヤー
     * @return bool プレイヤーがゲームに参加していて退会させれた場合はtrue、参加していない場合はfalse
     */
    public function kickPlayer(Player $player): bool
    {
        if ($this->isPlayerJoined($player)) {
            array_values(array_diff($this->players, [$player]));
            return true;
        }

        return false;
    }

    /**
     * 参加しているプレイヤーの配列を取得
     * @return Player[]
     */
    public function getPlayers(): array
    {
        return $this->getPlayers();
    }

    /**
     * 次フェーズに移行する
     */
    public function next()
    {
        $this->flow->next();
    }

    /**
     * プレイヤー募集段階
     */
    abstract protected function onRecruiting(): bool;

    /**
     * ゲーム準備段階
     */
    abstract protected function onPrepare(): bool;

    /**
     * ゲーム開始時
     */
    abstract protected function onBegin(): bool;

    /**
     * ゲーム終了時
     */
    abstract protected function onEnd(): bool;

    protected function flow(): Generator
    {
        yield;
        $this->onRecruiting();
        yield;
        $this->onPrepare();
        yield;
        $this->onBegin();
        yield;
        $this->onEnd();
    }
}
