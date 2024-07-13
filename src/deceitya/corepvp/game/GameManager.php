<?php

namespace deceitya\corepvp\game;

// 命名に困ったらManagerクラス一択！
class GameManager
{
    private static ?Game $currentGame = null;

    public static function getCurrentGame(): ?Game
    {
        return self::$currentGame;
    }

    public static function setCurrentGame(Game $game): void
    {
        self::$currentGame = $game;
    }
}