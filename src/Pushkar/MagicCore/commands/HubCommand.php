<?php

namespace Pushkar\MagicCore\commands;

use pocketmine\Server;
use pocketmine\world\World;
use pocketmine\player\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class HubCommand extends Command
{
    public function __construct()
    {
        parent::__construct("hub", "§eTeleport To Hub");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): mixed
    {
        if ($sender instanceof Player) {
            $defaultWorld = Server::getInstance()->getWorldManager()->getDefaultWorld();
            if (!$defaultWorld instanceof World) {
                return false;
            }

            $sender->teleport($defaultWorld->getSafeSpawn());
            $sender->sendTitle("§6Welcome To Hub", "§eMagic§6Games");
            return true;
        }
        $sender->sendMessage("Use this command in-game");
        return false;
    }
}
