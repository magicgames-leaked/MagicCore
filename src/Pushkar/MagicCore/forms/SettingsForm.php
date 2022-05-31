<?php

namespace Pushkar\MagicCore\forms;

use pocketmine\Server;
use dktapps\pmforms\FormIcon;
use dktapps\pmforms\MenuForm;
use pocketmine\player\Player;
use dktapps\pmforms\MenuOption;

class SettingsForm extends MenuForm
{
    public function __construct()
    {
        parent::__construct("§l§eSettings", "§bYour Personal Setting", [
            new MenuOption("§l§bNICKNAME\n§l§9»» §r§oTap to open", new FormIcon("textures/icon/settings", FormIcon::IMAGE_TYPE_PATH)),
            new MenuOption("§l§bCAPES\n§l§9»» §r§oTap to open", new FormIcon("textures/icon/settings", FormIcon::IMAGE_TYPE_PATH)),
            new MenuOption("§l§bHIDE PLAYERS\n§l§9»» §r§oTap to open", new FormIcon("textures/icon/settings", FormIcon::IMAGE_TYPE_PATH)),
            new MenuOption("§l§bPETS\n§l§9»» §r§oTap to open", new FormIcon("textures/icon/settings", FormIcon::IMAGE_TYPE_PATH)),
            new MenuOption("§l§bSIZE\n§l§9»» §r§oTap to open", new FormIcon("textures/icon/settings", FormIcon::IMAGE_TYPE_PATH)),
            new MenuOption("§l§bPERKS\n§l§9»» §r§oTap to open", new FormIcon("textures/icon/settings", FormIcon::IMAGE_TYPE_PATH)),
            new MenuOption("§l§bVANISH\n§l§9»» §r§oTap to open", new FormIcon("textures/icon/settings", FormIcon::IMAGE_TYPE_PATH)),
            new MenuOption("§l§bVAULT\n§l§9»» §r§oTap to open", new FormIcon("textures/icon/settings", FormIcon::IMAGE_TYPE_PATH)),
            new MenuOption("§cExit", new FormIcon("textures/blocks/barrier", FormIcon::IMAGE_TYPE_PATH))
        ], function (Player $sender, int $selected): void {
            switch ($selected) {
                case 0:
                    Server::getInstance()->dispatchCommand($sender, "nick");
                    break;

                case 1:
                    Server::getInstance()->dispatchCommand($sender, "cape");
                    break;

                case 2:
                    Server::getInstance()->dispatchCommand($sender, "hide");
                    break;

                case 3:
                    Server::getInstance()->dispatchCommand($sender, "pets");
                    break;

                case 4:
                    Server::getInstance()->dispatchCommand($sender, "size");
                    break;

                case 5:
                    $sender->sendForm(new PerksForm());
                    break;

                case 6:
                    $sender->sendForm(new VanishForm());
                    break;

                case 7:
                    Server::getInstance()->dispatchCommand($sender, "vaultui");
                    break;
                case 8:
                    break;
            }
        });
    }
}
