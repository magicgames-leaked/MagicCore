<?php

namespace Pushkar\MagicCore\forms;

use pocketmine\Server;
use dktapps\pmforms\FormIcon;
use dktapps\pmforms\MenuForm;
use pocketmine\player\Player;
use dktapps\pmforms\MenuOption;

class BazaarForm extends MenuForm
{

    public function __construct()
    {
        parent::__construct("§l§eMagic SkyBlock Bazaar", "§6Please Select The Next Menu", [
            new MenuOption("§l§bSELL ITEMS\n§l§9»» §r§oTap To Open", new FormIcon("https://cdn-icons-png.flaticon.com/512/6934/6934211.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("§l§bSHOP\n§l§9»» §r§oTap To Open", new FormIcon("https://cdn-icons-png.flaticon.com/128/1198/1198310.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("§l§bAUCTION\n§l§9»» §r§oTap To Open", new FormIcon("https://cdn-icons-png.flaticon.com/512/2863/2863339.png", FormIcon::IMAGE_TYPE_URL))
        ], function (Player $player, int $selected): void {
            switch ($selected) {
                case 0:
                    Server::getInstance()->dispatchCommand($player, "sellui");
                    break;
                case 1:
                    Server::getInstance()->dispatchCommand($player, "shop");
                    break;
                case 2:
                    Server::getInstance()->dispatchCommand($player, "ah");
                    break;
            }
        });
    }
}
