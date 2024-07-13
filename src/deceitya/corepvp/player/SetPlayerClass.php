<?php

declare(strict_types=1);

namespace deceitya\corepvp\player;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerCreationEvent;

class SetPlayerClass implements Listener
{
    public function onCreation(PlayerCreationEvent $e)
    {
        $e->setPlayerClass(PlayerExtend::class);
    }
}
