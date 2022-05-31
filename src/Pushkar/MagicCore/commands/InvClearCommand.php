<?php

namespace Pushkar\MagicCore\commands;

use pocketmine\player\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use Pushkar\MagicCore\forms\InvclearForm;

class InvClearCommand extends Command
{
    public function __construct()
    {
        parent::__construct("invclear", "§eClear Your Inventory");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): mixed
    {
        if ($sender instanceof Player) {
            $sender->sendForm(new InvclearForm());
            return true;
        }
        return false;
    }
}
