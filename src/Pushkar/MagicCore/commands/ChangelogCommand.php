<?php

namespace Pushkar\MagicCore\commands;

use pocketmine\player\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use Pushkar\MagicCore\forms\InformationForm;

class ChangelogCommand extends Command
{
    public function __construct()
    {
        parent::__construct("changelog", "§eSee Server Changelog");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): mixed
    {
        if ($sender instanceof Player) {
            (new InformationForm())->INFOTWO($sender);
            return true;
        }
        return false;
    }
}
