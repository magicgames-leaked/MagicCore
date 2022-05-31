<?php

namespace Pushkar\MagicCore\commands;

use Pushkar\MagicCore\MagicCore;
use pocketmine\item\Durable;
use pocketmine\player\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class RepairCommand extends Command
{
    public function __construct()
    {
        parent::__construct("repair", "§eRepair Your Items");
        $this->setPermission("repair.cmd");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): mixed
    {
        if ($sender instanceof Player) {
            if ($sender->hasPermission("repair.cmd")) {
                $item = $sender->getInventory()->getItemInHand();
                if ($item instanceof Durable) {
                    $item->setDamage(0);
                    $sender->getInventory()->setItemInHand($item);
                    $sender->sendMessage(" §eRepaired Your Item");
                }
            } else {
                $sender->sendMessage(MagicCore::PREFIX . "You Don't Have Permission");
            }
            return true;
        }
        $sender->sendMessage("Use this command in-game");
        return false;
    }
}
