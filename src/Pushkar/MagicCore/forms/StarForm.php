<?php

namespace Pushkar\MagicCore\forms;

use pocketmine\Server;
use dktapps\pmforms\FormIcon;
use dktapps\pmforms\MenuForm;
use pocketmine\player\Player;
use Stats\player\MagicPlayer;
use dktapps\pmforms\MenuOption;

class StarForm extends MenuForm
{
    public function __construct(Player $player)
    {
        $item = $player->getInventory()->getItemInHand();
        $damage = ($player instanceof MagicPlayer ? $player->getDamage() : 0) + $item->getAttackPoints();
        $defense = ($player instanceof MagicPlayer ? $player->getDefense() : 0) + $player->getArmorPoints();
        $heal = $player->getHealth();
        $maxheal = $player->getMaxHealth();
        $name = $player->getName();
        parent::__construct("is_dynamic&side_text§l§fMagic Skyblock Menu", "§bHello,\n§e$name\n\n\n§d§lSTATS:§r\n\n§cHealth: $heal" . "§7/§c$maxheal \n\n§aDefense: §a$defense \n\n§4Damage: $damage \n§r", [
            new MenuOption("grid_tile§eSKYBLOCK MENU", new FormIcon("textures/icon/star", FormIcon::IMAGE_TYPE_PATH)),
            new MenuOption("grid_tile§eSHOP MENU", new FormIcon("textures/icon/shop", FormIcon::IMAGE_TYPE_PATH)),
            new MenuOption("grid_tile§eKIT MENU", new FormIcon("textures/icon/kit", FormIcon::IMAGE_TYPE_PATH)),
            new MenuOption("grid_tile§eTELEPORT HUB", new FormIcon("textures/icon/hub", FormIcon::IMAGE_TYPE_PATH)),
            new MenuOption("grid_tile§eQUEST MENU", new FormIcon("textures/icon/quest", FormIcon::IMAGE_TYPE_PATH)),
            new MenuOption("grid_tile§eCRAFTING RECIPES", new FormIcon("textures/icon/recipe", FormIcon::IMAGE_TYPE_PATH)),
            new MenuOption("grid_tile§eWARPS", new FormIcon("textures/icon/warp", FormIcon::IMAGE_TYPE_PATH)),
            new MenuOption("grid_tile§eBANK", new FormIcon("textures/icon/bank", FormIcon::IMAGE_TYPE_PATH)),
            new MenuOption("grid_tile§ePLAYER VAULT", new FormIcon("textures/icon/chest", FormIcon::IMAGE_TYPE_PATH)),
            new MenuOption("grid_tile§eBAZAAR", new FormIcon("textures/icon/bazaar", FormIcon::IMAGE_TYPE_PATH)),
            new MenuOption("grid_tile§eOTHER SERVERS", new FormIcon("textures/icon/server", FormIcon::IMAGE_TYPE_PATH)),
            new MenuOption("grid_tile§eSETTINGS", new FormIcon("textures/icon/settings", FormIcon::IMAGE_TYPE_PATH)),
            new MenuOption("header_button", new FormIcon("textures/ui/icon_back", FormIcon::IMAGE_TYPE_PATH))
        ], function (Player $sender, int $selected): void {
            switch ($selected) {
                case 0:
                    Server::getInstance()->dispatchCommand($sender, "is ui");
                    break;
                case 1:
                    Server::getInstance()->dispatchCommand($sender, "shop");
                    break;
                case 2:
                    Server::getInstance()->dispatchCommand($sender, "kit");
                    break;
                case 3:
                    Server::getInstance()->dispatchCommand($sender, "hub");
                    break;
                case 4:
                    Server::getInstance()->dispatchCommand($sender, "quest");
                    break;
                case 5:
                    Server::getInstance()->dispatchCommand($sender, "recipes");
                    break;
                case 6:
                    Server::getInstance()->dispatchCommand($sender, "warp");
                    break;
                case 7:
                    Server::getInstance()->dispatchCommand($sender, "bank");
                    break;
                case 8:
                    Server::getInstance()->dispatchCommand($sender, "vaultui");
                    break;
                case 9:
                    Server::getInstance()->dispatchCommand($sender, "bazaar");
                    break;
                case 10:
                    Server::getInstance()->dispatchCommand($sender, "servers");
                    break;
                case 11:
                    Server::getInstance()->dispatchCommand($sender, "settings");
                    break;
                case 12:
                    break;
            }
        });
    }
}
