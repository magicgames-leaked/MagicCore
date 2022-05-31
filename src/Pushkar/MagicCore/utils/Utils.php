<?php

namespace Pushkar\MagicCore\utils;

use pocketmine\player\Player;

final class Utils
{
    public function resetNick(Player $sender): void
    {
        $sender->setDisplayName($sender->getName());
        $sender->setNameTag($sender->getName());
        $sender->sendMessage("§8(§b!§8) §7Your nickname has been reset!");
    }
}
