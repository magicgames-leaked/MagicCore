<?php

namespace Pushkar\MagicCore\commands;

use pocketmine\player\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use Pushkar\MagicCore\forms\InformationForm;

class RanklistCommand extends Command
{

    public function __construct()
    {
        parent::__construct("ranklist", "§eServer Ranks");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): mixed
    {
        if ($sender instanceof Player) {
            (new InformationForm())->INFOSEVEN($sender);
            return true;
        }
        return false;
    }
}
