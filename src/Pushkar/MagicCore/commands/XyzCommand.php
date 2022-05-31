<?php

namespace Pushkar\MagicCore\commands;

use pocketmine\player\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class XyzCommand extends Command
{

    public function __construct()
    {
        parent::__construct("xyz", "§eGet Your Coordinates");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): mixed
    {
        if ($sender instanceof Player) {
            $pos = $sender->getPosition();
            $x = intval($pos->getX());
            $y = intval($pos->getY());
            $z = intval($pos->getZ());
            $sender->sendMessage("§6§l========================\n§l§bCOORDINATES :§r§e $x $y $z\n§6§l========================");
            return true;
        }
        $sender->sendMessage("Use this command in-game");
        return false;
    }
}
