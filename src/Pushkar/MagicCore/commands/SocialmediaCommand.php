<?php

namespace Pushkar\MagicCore\commands;

use pocketmine\player\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use Pushkar\MagicCore\forms\InformationForm;

class SocialmediaCommand extends Command
{

    public function __construct()
    {
        parent::__construct("socialmedia", "§eServer Social Media");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): mixed
    {
        if ($sender instanceof Player) {
            (new InformationForm())->INFOEIGHT($sender);
            return true;
        }
        return false;
    }
}
