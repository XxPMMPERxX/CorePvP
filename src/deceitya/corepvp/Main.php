<?php

namespace deceitya\corepvp;

use deceitya\corepvp\database\Database;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase
{
    public function onEnable(): void
    {
        $db = new Database("{$this->getDataFolder()}corepvp.db");
        $db->open();
        $db->createTables();
    }
}
