<?php

namespace Pushkar\MagicCore\forms\anvil;

use pocketmine\item\Tool;
use pocketmine\item\Armor;
use dktapps\pmforms\MenuForm;
use pocketmine\player\Player;
use dktapps\pmforms\MenuOption;
use pocketmine\item\ItemFactory;
use onebone\economyapi\EconomyAPI;

class AnvilRepairForm extends MenuForm
{

    public function __construct(Player $player)
    {
        $mymoney1 = EconomyAPI::getInstance()->myMoney($player);
        parent::__construct(
            "§2§l« §r§aREPAIR §2§l»§r",
            "§aRepair Your Item\n§aRepair Cost: 250\n§eYour Money: §a " . $mymoney1,
            [
                new MenuOption("§a§lREPAIR\n§r§8Tap to repair"),
                new MenuOption("§e§lBACK\n§r§8Tap to go back")
            ],
            function (Player $player, int $selected) use ($mymoney1): void {
                switch ($selected) {
                    case 0:
                        if ($mymoney1 >= 250) {
                            $item = $player->getInventory()->getItemInHand();
                            if ($item instanceof Armor or $item instanceof Tool) {
                                $id = $item->getId();
                                $meta = $item->getMeta();
                                $player->getInventory()->removeItem(ItemFactory::getInstance()->get($id, $meta, 1));
                                $newitem = ItemFactory::getInstance()->get($id, 0, 1);
                                if ($item->hasCustomName()) {
                                    $newitem->setCustomName($item->getCustomName());
                                }
                                if ($item->hasEnchantments()) {
                                    foreach ($item->getEnchantments() as $enchants) {
                                        $newitem->addEnchantment($enchants);
                                    }
                                }
                                $player->getInventory()->addItem($newitem);
                                $player->sendMessage("§aItem has been successfully fixed");
                                EconomyAPI::getInstance()->reduceMoney($player, 250);
                            } else {
                                $player->sendMessage("§cHold the item in your hand!");
                            }
                        } else {
                            $player->sendMessage("§cYou don't have enough money you need 250");
                        }
                        break;
                    case 1:
                        $player->sendForm(new AnvilMainForm());
                        break;
                }
            }
        );
    }
}
