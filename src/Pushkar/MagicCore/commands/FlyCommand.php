<?php

namespace Pushkar\MagicCore\commands;

use pocketmine\player\Player;
use pocketmine\command\Command;
use Pushkar\MagicCore\MagicCore;
use pocketmine\command\CommandSender;

class FlyCommand extends Command
{
    private array $fly = [];

    public function __construct()
    {
        parent::__construct("fly", "§eFly");
        $this->setPermission("fly.cmd");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): mixed
    {
        if ($sender instanceof Player) {
            if ($sender->hasPermission("fly.cmd")) {
                if (isset($this->fly[$sender->getName()])) {
                    unset($this->fly[$sender->getName()]);
                    $sender->setFlying(false);
                    $sender->sendMessage(" §eYour Fly Disabled Now!");
                    return true;
                }
                $this->fly[$sender->getName()] = 0;
                $sender->setFlying(true);
                $sender->sendMessage(" §eYour Fly Enabled Now!");
                return true;
            }
            $sender->sendMessage(MagicCore::PREFIX . "You Don't Have Permission");
            return false;
        }
        return false;
    }
}
