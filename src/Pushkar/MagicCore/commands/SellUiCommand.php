<?php

namespace Pushkar\MagicCore\commands;

use pocketmine\player\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use Pushkar\MagicCore\forms\SellUiForm;

class SellUiCommand extends Command
{
    public function __construct()
    {
        parent::__construct("sellui", "§eSell Your Items");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if ($sender instanceof Player) {
            $sender->sendForm(new SellUiForm());
            return true;
        }
        $sender->sendMessage("Use this command in-game");
        return false;
    }
}
