<?php

namespace Pushkar\MagicCore\commands;

use pocketmine\player\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use Pushkar\MagicCore\forms\CommunityShopForm;

class CommunityShopCommand extends Command
{
    public function __construct()
    {
        parent::__construct("communityshop", "§eCommunity Shop", "/magicpass", ["magicpass", "cs"]);
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): mixed
    {
        if ($sender instanceof Player) {
            $sender->sendForm(new CommunityShopForm($sender));
            return true;
        }
        return false;
    }
}
