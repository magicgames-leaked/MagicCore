<?php

namespace Pushkar\MagicCore\commands;

use Pushkar\MagicCore\MagicCore;
use pocketmine\player\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use Pushkar\MagicCore\forms\LiftUiForm;

class LiftuiCommand extends Command
{
    public function __construct()
    {
        parent::__construct("liftui", "§eLiftui For Mines");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): mixed
    {
        if ($sender instanceof Player) {
            $sender->sendForm(new LiftUiForm(MagicCore::getInstance()));
            return true;
        }
        return false;
    }
}
