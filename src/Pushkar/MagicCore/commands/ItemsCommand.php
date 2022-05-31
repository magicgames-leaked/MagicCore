<?php

namespace Pushkar\MagicCore\commands;

use Pushkar\MagicCore\MagicCore;
use pocketmine\player\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use Pushkar\MagicCore\forms\ItemsForm;

class ItemsCommand extends Command
{
    public function __construct()
    {
        parent::__construct("items", "§eAdmins Items :)");
        $this->setPermission("items.cmd");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): mixed
    {
        if ($sender instanceof Player) {
          if ($sender->hasPermission("items.cmd")){
            $sender->sendForm(new ItemsForm());
          } else {
            $sender->sendMessage(MagicCore::PREFIX . "You Don't Have Permission");
          }
            return true;
        }
        $sender->sendMessage("Use this command in-game");
        return false;
    }
}
