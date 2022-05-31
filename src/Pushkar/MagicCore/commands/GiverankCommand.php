<?php

namespace Pushkar\MagicCore\commands;

use pocketmine\player\Player;
use pocketmine\command\Command;
use Pushkar\MagicCore\MagicCore;
use pocketmine\command\CommandSender;
use Pushkar\MagicCore\forms\GiverankForm;
use Pushkar\MagicCore\forms\GiveadminrankForm;

class GiverankCommand extends Command
{
    public function __construct()
    {
        parent::__construct("giverank", "§eGive Rank To Player");
        $this->setPermission("giverank.cmd");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): mixed
    {
        if ($sender instanceof Player) {
            if ($sender->hasPermission("giveadminrank.cmd")) {
                $sender->sendForm(new GiveadminrankForm());
                return true;
            }
            if ($sender->hasPermission("giverank.cmd")) {
                $sender->sendForm(new GiverankForm());
                return true;
            }
            $sender->sendMessage(MagicCore::PREFIX . "You Don't Have Permission");
            return false;
        }
        $sender->sendMessage("Use this command in-game");
        return false;
    }
}
