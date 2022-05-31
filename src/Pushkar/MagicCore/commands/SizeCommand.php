<?php

namespace Pushkar\MagicCore\commands;

use Pushkar\MagicCore\MagicCore;
use pocketmine\player\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use Pushkar\MagicCore\forms\SizeForm;

class SizeCommand extends Command
{
    public function __construct()
    {
        parent::__construct("size", "§eYour sizes");
        $this->setPermission("size.cmd");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): mixed
    {
        if ($sender instanceof Player) {
          if ($sender->hasPermission("size.cmd")){
            $sender->sendForm(new SizeForm($sender));
          } else {
            $sender->sendMessage(MagicCore::PREFIX . "You Don't Have Permission");
          }
            return true;
        }
        return false;
    }
}
