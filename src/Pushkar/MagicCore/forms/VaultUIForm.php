<?php

namespace Pushkar\MagicCore\forms;

use pocketmine\Server;
use Pushkar\MagicCore\MagicCore;
use dktapps\pmforms\FormIcon;
use dktapps\pmforms\MenuForm;
use pocketmine\player\Player;
use dktapps\pmforms\MenuOption;
use pocketmine\console\ConsoleCommandSender;

class VaultUIForm extends MenuForm
{

    public function __construct(Player $sender)
    {
        $name = $sender->getName();
        parent::__construct("§eVault UI", "§bHi §e$name ,\n\n§bPlease Select The Next Menu:", [
            new MenuOption("§l§bENDER CHEST\n§l§9»» §rTap to open", new FormIcon("https://i.imgur.com/dryygPj.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("§l§bVAULT 1\n§l§9»» §rTap to open", new FormIcon("https://i.imgur.com/kwFuyP3.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("§l§bVAULT 2\n§l§9»» §aVIP§r Rank Required", new FormIcon("https://i.imgur.com/kwFuyP3.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("§l§bVAULT 3\n§l§9»» §aVIP§c+§r Rank Required", new FormIcon("https://i.imgur.com/kwFuyP3.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("§l§bVAULT 4\n§l§9»» §aVIP§c+§r Rank Required", new FormIcon("https://i.imgur.com/kwFuyP3.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("§l§bVAULT 5\n§l§9»» §bMVP§r Rank Required", new FormIcon("https://i.imgur.com/kwFuyP3.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("§l§bVAULT 6\n§l§9»» §bMVP§r Rank Required", new FormIcon("https://i.imgur.com/kwFuyP3.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("§l§bVAULT 7\n§l§9»» §bMVP§c+§r Rank Required", new FormIcon("https://i.imgur.com/kwFuyP3.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("§l§bVAULT 8\n§l§9»» §bMVP§c+§r Rank Required", new FormIcon("https://i.imgur.com/kwFuyP3.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("§l§bVAULT 9\n§l§9»» §bMVP§e+§c+§r Rank Required", new FormIcon("https://i.imgur.com/kwFuyP3.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("§l§bVAULT 10\n§l§9»» §bMVP§e+§c+§r Rank Required", new FormIcon("https://i.imgur.com/kwFuyP3.png", FormIcon::IMAGE_TYPE_URL))
        ], function (Player $sender, int $selected): void {
            switch ($selected) {
                case 0:
                  Server::getInstance()->dispatchCommand($sender, "echest");
                    break;
                case 1:
                  Server::getInstance()->dispatchCommand($sender, "pv 1");
                    break;
                case 2:
                  Server::getInstance()->dispatchCommand($sender, "pv 2");
                    break;
                case 3:
                  Server::getInstance()->dispatchCommand($sender, "pv 3");
                    break;
                case 4:
                  Server::getInstance()->dispatchCommand($sender, "pv 4");
                    break;
                case 5:
                  Server::getInstance()->dispatchCommand($sender, "pv 5");
                    break;
                case 6:
                  Server::getInstance()->dispatchCommand($sender, "pv 6");
                    break;
                case 7:
                  Server::getInstance()->dispatchCommand($sender, "pv 7");
                    break;
                case 8:
                  Server::getInstance()->dispatchCommand($sender, "pv 8");
                    break;
                case 9:
                  Server::getInstance()->dispatchCommand($sender, "pv 9");
                    break;
                case 10:
                  Server::getInstance()->dispatchCommand($sender, "pv 10");
                    break;
            }
        });
    }
}
