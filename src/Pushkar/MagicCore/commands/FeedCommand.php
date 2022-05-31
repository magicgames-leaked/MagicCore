<?php

namespace Pushkar\MagicCore\commands;

use Pushkar\MagicCore\MagicCore;
use pocketmine\player\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class FeedCommand extends Command
{
    public function __construct()
    {
        parent::__construct("feed", "§eFill your hunger bar");
        $this->setPermission("feed.cmd");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): mixed
    {
        if ($sender instanceof Player) {
            $sender->getHungerManager()->setFood(20);
            if ($sender->hasPermission("feed.cmd")) {
                $sender->getHungerManager()->setSaturation(20);
                $sender->sendMessage(MagicCore::PREFIX . "Gods Feeded You");
                return true;
            } else {
                $sender->sendMessage(MagicCore::PREFIX . "You Don't Have Permission");
            }
        }
        $sender->sendMessage("Use this command in-game");
        return false;
    }
}
