<?php

namespace Pushkar\MagicCore\commands;

use pocketmine\player\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use Pushkar\MagicCore\forms\InformationForm;

class DiscordCommand extends Command
{
    public function __construct()
    {
        parent::__construct("discord", "§eServer Discord Link");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): mixed
    {
        if ($sender instanceof Player) {
            (new InformationForm())->SMONE($sender);
            return true;
        }
        return false;
    }
}
