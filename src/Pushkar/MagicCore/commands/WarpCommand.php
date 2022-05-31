<?php

namespace Pushkar\MagicCore\commands;

use Pushkar\MagicCore\MagicCore;
use pocketmine\player\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use Pushkar\MagicCore\forms\WarpForm;

class WarpCommand extends Command
{

    public function __construct()
    {
        parent::__construct("warp", "§eWarpUI For Better Experience");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): mixed
    {
        if ($sender instanceof Player) {
            $sender->sendForm(new WarpForm(MagicCore::getInstance()));
            return true;
        }
        $sender->sendMessage("Use this command in-game");
        return false;
    }
}
