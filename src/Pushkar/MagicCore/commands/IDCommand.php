<?php

namespace Pushkar\MagicCore\commands;

use Pushkar\MagicCore\MagicCore;
use pocketmine\player\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class IDCommand extends Command
{
    public function __construct()
    {
        parent::__construct("id", "§eItem id");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): mixed
    {
        if ($sender instanceof Player) {
            $sender->sendMessage(MagicCore::PREFIX . "§aID: §b{$sender->getInventory()->getItemInHand()->getId()}:{$sender->getInventory()->getItemInHand()->getMeta()}");
            return true;
        }
        $sender->sendMessage("Use this command in-game");
        return false;
    }
}
