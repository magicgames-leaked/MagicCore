<?php

namespace Pushkar\MagicCore\forms;

use pocketmine\Server;
use dktapps\pmforms\FormIcon;
use dktapps\pmforms\MenuForm;
use pocketmine\player\Player;
use dktapps\pmforms\MenuOption;

class JerryForm extends MenuForm
{

    public function __construct()
    {
        parent::__construct("§l§bJERRY", "§6Please Select The Next Menu", [
            new MenuOption("§l§bSKYBLOCK MENU\n§l§9»» §r§oTap To Open", new FormIcon("https://cdn-icons-png.flaticon.com/128/619/619005.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("§l§bSHOP\n§l§9»» §r§oTap To Open", new FormIcon("https://cdn-icons-png.flaticon.com/128/1198/1198310.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("§l§bTELEPORT TO HUB\n§l§9»» §r§oTap To Open", new FormIcon("https://i.imgur.com/hoWiSas.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("§l§bQUEST\n§l§9»» §r§oTap To Open", new FormIcon("https://cdn-icons-png.flaticon.com/128/1673/1673620.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("§l§bWARPS\n§l§9»» §r§oTap To Open", new FormIcon("https://i.imgur.com/9bVt5M1.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("§l§bSKILLS\n§l§9»» §r§oTap To Open", new FormIcon("https://i.imgur.com/hBhDETp.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("§l§bBAZAAR\n§l§9»» §r§oTap To Open", new FormIcon("textures/icon/bazaar", FormIcon::IMAGE_TYPE_PATH)),
            new MenuOption("§l§bAUCTION\n§l§9»» §r§oTap To Open", new FormIcon("https://cdn-icons-png.flaticon.com/512/2863/2863339.png", FormIcon::IMAGE_TYPE_URL))
        ], function (Player $player, int $selected): void {
            switch ($selected) {
                case 0:
                    Server::getInstance()->dispatchCommand($player, "sb");
                    break;
                case 1:
                    Server::getInstance()->dispatchCommand($player, "shop");
                    break;
                case 2:
                    Server::getInstance()->dispatchCommand($player, "hub");
                    break;
                case 3:
                    Server::getInstance()->dispatchCommand($player, "quest");
                    break;
                case 4:
                    Server::getInstance()->dispatchCommand($player, "warp");
                    break;
                case 5:
                    Server::getInstance()->dispatchCommand($player, "skills");
                    break;
                case 6:
                    Server::getInstance()->dispatchCommand($player, "bazaar");
                    break;
                case 7:
                    Server::getInstance()->dispatchCommand($player, "ah");
                    break;
            }
        });
    }
}
