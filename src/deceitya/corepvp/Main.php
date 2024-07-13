<?php

declare(strict_types=1);

namespace deceitya\corepvp;

use deceitya\corepvp\database\Database;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase
{
    private Database $db;

    public function onEnable(): void
    {
        $this->saveDefaultConfig();
        $config = $this->getConfig();

        $this->db = new Database();
        $this->db->open($config->getNested("database.url"), $config->getNested("database.user"), $config->getNested("database.password"));
    }

    public function onDisable(): void
    {
        $this->db->close();
    }
}
