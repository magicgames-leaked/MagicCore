<?php

namespace Pushkar\MagicCore\commands;

use pocketmine\player\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use Pushkar\MagicCore\forms\ServersForm;

class ServersCommand extends Command
{

    public function __construct()
    {
        parent::__construct("servers", "§eSee MagicGames All Servers");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): mixed
    {
        if ($sender instanceof Player) {
            $sender->sendForm(new ServersForm($sender));
            return true;
        }
        return false;
    }
}
