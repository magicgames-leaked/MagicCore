<?php

namespace Pushkar\MagicCore\commands;

use pocketmine\player\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use Pushkar\MagicCore\forms\JerryForm;

class JerryCommand extends Command
{
    public function __construct()
    {
        parent::__construct("jerry", "§eSkyblock Jerry");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): mixed
    {
        if ($sender instanceof Player) {
            $sender->sendForm(new JerryForm());
            return true;
        }
        $sender->sendMessage("Use this command in-game");
        return false;
    }
}
