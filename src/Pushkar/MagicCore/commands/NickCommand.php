<?php

namespace Pushkar\MagicCore\commands;

use Pushkar\MagicCore\MagicCore;
use pocketmine\player\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use Pushkar\MagicCore\forms\nick\NickForm;

class NickCommand extends Command
{
    public function __construct()
    {
        parent::__construct("nick", "§eChange Nickname");
        $this->setPermission("nick.cmd");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): mixed
    {
        if ($sender instanceof Player) {
          if ($sender->hasPermission("nick.cmd")){
            $sender->sendForm(new NickForm());
          } else {
            $sender->sendMessage(MagicCore::PREFIX . "You Don't Have Permission");
          }
            return true;
        }
        $sender->sendMessage("Use this command in-game");
        return false;
    }
}
