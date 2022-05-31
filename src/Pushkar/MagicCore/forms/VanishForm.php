<?php

namespace Pushkar\MagicCore\forms;

use pocketmine\Server;
use dktapps\pmforms\FormIcon;
use dktapps\pmforms\MenuForm;
use pocketmine\player\Player;
use dktapps\pmforms\MenuOption;

class VanishForm extends MenuForm
{

    public function __construct()
    {
        parent::__construct("§l§6Vanish", "§6Please Select The Next Menu", [
            new MenuOption("§eVanish\n§8Click To Open", new FormIcon("textures/icon/settings", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("§eUnvanish\n§8Click To Open", new FormIcon("textures/icon/settings", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("§cExit", new FormIcon("textures/blocks/barrier", FormIcon::IMAGE_TYPE_URL))
        ], function (Player $sender, int $selected): void {
            switch ($selected) {
                case 0:
                    Server::getInstance()->dispatchCommand($sender, "vanish");
                    break;

                case 1:
                    Server::getInstance()->dispatchCommand($sender, "unvanish");
                    break;
            }
        });
    }
}
