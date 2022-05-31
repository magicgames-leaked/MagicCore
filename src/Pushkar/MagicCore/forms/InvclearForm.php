<?php

namespace Pushkar\MagicCore\forms;

use dktapps\pmforms\FormIcon;
use dktapps\pmforms\MenuForm;
use pocketmine\player\Player;
use dktapps\pmforms\MenuOption;
use pocketmine\item\ItemFactory;

class InvclearForm extends MenuForm
{

    public function __construct()
    {
        parent::__construct("§l§eInvClear", "§cIt Will Clear Your Inventory\n§bYou Can't Get Your Items Back After Inv Clear", [
            new MenuOption("§c» Yes «", new FormIcon("https://cdn-icons-png.flaticon.com/128/3572/3572255.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("§6» Cancel «", new FormIcon("https://cdn-icons-png.flaticon.com/128/3572/3572260.png", FormIcon::IMAGE_TYPE_URL))
        ], function (Player $player, int $selected): void {
            switch ($selected) {
                case 0:
                    $player->sendMessage(" §7Clearing Armor Inventory....");
                    $player->getArmorInventory()->clearAll();
                    $player->sendMessage(" §7Clearing Player Inventory....");
                    $player->getInventory()->clearAll();
                    $player->sendMessage(" §eInventory Cleared Successfully!");
                    $item = ItemFactory::getInstance()->get(1070, 0, 1);
                    $item->setCustomName("§r§aSkyblock Menu §7( Right Click )§r");
                    $item->setLore(["§r§7View All Of Your Skyblock Progress Including Your Skills,\n§7Collections, Recipes And More!\n\n§r§eClick To Open!"]);
                    $player->getInventory()->setItem(8, $item);
                    break;
                case 1:
                    $player->sendMessage(" §eYou Canceled The Inv Clear Process.");
                    break;
            }
        });
    }
}
