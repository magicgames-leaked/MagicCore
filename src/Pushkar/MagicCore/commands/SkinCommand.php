<?php

namespace Pushkar\MagicCore\commands;

use Pushkar\MagicCore\MagicCore;
use pocketmine\player\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use Pushkar\MagicCore\forms\InformationForm;

class SkinCommand extends Command
{

    public function __construct()
    {
        parent::__construct("skin", "§eSkin Stealer");
        $this->setPermission("skin.cmd");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): mixed
    {
        if ($sender instanceof Player) {
         if ($sender->hasPermission("skin.cmd")){
            (new InformationForm())->skin($sender);
        } else {
            $sender->sendMessage(MagicCore::PREFIX . "You Don't Have Permission");
          }
            return true;
        }
        return false;
    }
}
