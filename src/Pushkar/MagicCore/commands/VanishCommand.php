<?php

namespace Pushkar\MagicCore\commands;

use Pushkar\MagicCore\MagicCore;
use pocketmine\player\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class VanishCommand extends Command
{
    private array $vanish = [];

    public function __construct()
    {
        parent::__construct("vanish", "§eVanish Command");
        $this->setPermission("vanish.cmd");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): mixed
    {
        if ($sender instanceof Player) {
            if ($sender->hasPermission("vanish.cmd")) {
                if (!isset($this->vanish[$sender->getName()])) {
                    $sender->sendMessage(MagicCore::PREFIX . "You are now vanished.");
                    $sender->setInvisible(true);
                    $sender->setSilent(true);

                    $this->vanish[$sender->getName()] = 1;
                    return true;
                }
                $sender->sendMessage(MagicCore::PREFIX . "You are now un vanished.");
                $sender->setInvisible(false);
                $sender->setSilent(false);

                unset($this->vanish[$sender->getName()]);
                return true;
            }
            $sender->sendMessage(MagicCore::PREFIX . "You Don't Have Permission");
        }
        return false;
    }
}
