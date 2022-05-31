<?php

namespace Pushkar\MagicCore\forms;

use pocketmine\world\World;
use dktapps\pmforms\FormIcon;
use dktapps\pmforms\MenuForm;
use pocketmine\player\Player;
use pocketmine\world\Position;
use dktapps\pmforms\MenuOption;
use Pushkar\MagicCore\MagicCore;

class LiftUiForm extends MenuForm
{

    public function __construct(MagicCore $plugin)
    {
        parent::__construct("§l§eMagic Skyblock Lift Operator", "§6Please Select The Cave You Want To Telport", [
            new MenuOption("§bIron Mine\n§9»» §r§oTap to Teleport", new FormIcon("textures/items/iron_ingot", FormIcon::IMAGE_TYPE_PATH)),
            new MenuOption("§bGold Mine\n§9»» §r§oTap to Teleport", new FormIcon("textures/items/gold_ingot", FormIcon::IMAGE_TYPE_PATH)),
            new MenuOption("§bRedstone Mine\n§9»» §r§oTap to Teleport", new FormIcon("textures/items/redstone_dust", FormIcon::IMAGE_TYPE_PATH)),
            new MenuOption("§bLapis Mine\n§9»» §r§oTap to Teleport", new FormIcon("textures/items/dye_powder_blue", FormIcon::IMAGE_TYPE_PATH)),
            new MenuOption("§bEmerald Mine\n§9»» §r§oTap to Teleport", new FormIcon("textures/items/emerald", FormIcon::IMAGE_TYPE_PATH)),
            new MenuOption("§bDiamond Mine\n§9»» §r§oTap to Teleport", new FormIcon("textures/items/diamond", FormIcon::IMAGE_TYPE_PATH)),
            new MenuOption("§bSantuary\n§9»» §r§oTap to Teleport", new FormIcon("textures/blocks/obsidian", FormIcon::IMAGE_TYPE_PATH))
        ], function (Player $sender, int $selected) use ($plugin): void {
            switch ($selected) {
                case 0:
                    $world = $plugin->getServer()->getWorldManager()->getWorldByName($plugin->getConfig()->get("iron-world"));
                    if (!$world instanceof World) {
                        break;
                    }

                    $sender->teleport(new Position((float)$plugin->getConfig()->get("iron-x"), (float)$plugin->getConfig()->get("iron-y"), (float)$plugin->getConfig()->get("iron-z"), $world));
                    $sender->sendTitle("§lIRON MINE");
                    break;
                case 1:
                    $world = $plugin->getServer()->getWorldManager()->getWorldByName($plugin->getConfig()->get("gold-world"));
                    if (!$world instanceof World) {
                        break;
                    }

                    $sender->teleport(new Position((float)$plugin->getConfig()->get("gold-x"), (float)$plugin->getConfig()->get("gold-y"), (float)$plugin->getConfig()->get("gold-z"), $world));
                    $sender->sendTitle("§6§lGOLD MINE");
                    break;
                case 2:
                    $world = $plugin->getServer()->getWorldManager()->getWorldByName($plugin->getConfig()->get("redstone-world"));
                    if (!$world instanceof World) {
                        break;
                    }
                    $sender->teleport(new Position((float)$plugin->getConfig()->get("redstone-x"), (float)$plugin->getConfig()->get("redstone-y"), (float)$plugin->getConfig()->get("redstone-z"), $world));
                    $sender->sendTitle("§c§lREDSTONE MINE");
                    break;
                case 3:
                    $world = $plugin->getServer()->getWorldManager()->getWorldByName($plugin->getConfig()->get("lapis-world"));
                    if (!$world instanceof World) {
                        break;
                    }

                    $sender->teleport(new Position((float)$plugin->getConfig()->get("lapis-x"), (float)$plugin->getConfig()->get("lapis-y"), (float)$plugin->getConfig()->get("lapis-z"), $world));
                    $sender->sendTitle("§9§lLAPIS MINE");
                    break;
                case 4:
                    $world = $plugin->getServer()->getWorldManager()->getWorldByName($plugin->getConfig()->get("emerald-world"));
                    if (!$world instanceof World) {
                        break;
                    }

                    $sender->teleport(new Position((float)$plugin->getConfig()->get("emerald-x"), (float)$plugin->getConfig()->get("emerald-y"), (float)$plugin->getConfig()->get("emerald-z"), $world));
                    $sender->sendTitle("§a§lEMERALD MINE");
                    break;
                case 5:
                    $world = $plugin->getServer()->getWorldManager()->getWorldByName($plugin->getConfig()->get("diamond-world"));
                    if (!$world instanceof World) {
                        break;
                    }

                    $sender->teleport(new Position((float)$plugin->getConfig()->get("diamond-x"), (float)$plugin->getConfig()->get("diamond-y"), (float)$plugin->getConfig()->get("diamond-z"), $world));
                    $sender->sendTitle("§l§bDIAMOND MINE");
                    break;
                case 6:
                    $world = $plugin->getServer()->getWorldManager()->getWorldByName($plugin->getConfig()->get("obsidian-world"));
                    if (!$world instanceof World) {
                        break;
                    }
                    $sender->teleport(new Position((float)$plugin->getConfig()->get("obsidian-x"), (float)$plugin->getConfig()->get("obsidian-y"), (float)$plugin->getConfig()->get("obsidian-z"), $world));
                    $sender->sendTitle("§e§lSANTUARY");
                    break;
            }
        });
    }
}
