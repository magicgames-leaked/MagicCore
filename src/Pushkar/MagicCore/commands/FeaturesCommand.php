<?php

namespace Pushkar\MagicCore\commands;

use pocketmine\player\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use Pushkar\MagicCore\forms\InformationForm;

class FeaturesCommand extends Command
{
    public function __construct()
    {
        parent::__construct("features", "§eServer Features");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): mixed
    {
        if ($sender instanceof Player) {
            (new InformationForm())->INFOTHREE($sender);
            return true;
        }
        return false;
    }
}
