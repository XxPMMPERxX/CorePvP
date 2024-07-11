<?php

namespace deceitya\corepvp;

use deceitya\corepvp\database\Database;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase
{
    private Database $db;

    public function onEnable(): void
    {
        $this->db = new Database("{$this->getDataFolder()}corepvp.db");
        $this->db->open();
        $this->db->createTables();
    }

    public function onDisable(): void
    {
        $this->db->close();
    }
}
