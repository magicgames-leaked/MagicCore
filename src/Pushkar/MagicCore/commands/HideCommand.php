<?php

namespace Pushkar\MagicCore\commands;

use pocketmine\player\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use Pushkar\MagicCore\forms\HideForm;

class HideCommand extends Command
{
    public function __construct()
    {
        parent::__construct("hide", "§eHide/Show Player");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): mixed
    {
        if ($sender instanceof Player) {
            $sender->sendForm(new HideForm());
            return true;
        }
        $sender->sendMessage("Use this command in-game");
        return false;
    }
}
