<?php

namespace Pushkar\MagicCore\commands;

use pocketmine\Server;
use pocketmine\player\Player;
use pocketmine\command\Command;
use Pushkar\MagicCore\MagicCore;
use pocketmine\command\CommandSender;

class BitsCommand extends Command
{
    public function __construct()
    {
        parent::__construct("bits", "§eBits", "/bits <give/balance/take> <player> <amount>");
        $this->setPermission("bits.cmd");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): mixed
    {
        if ($sender->hasPermission("bits.cmd")) {
            if (!isset($args[0]) || !isset($args[1])) {
                $sender->sendMessage("§e/bits <give/balance/take> <player> <amount>");
                return false;
            }
            switch ($args[0]) {
                case "give":
                    if (!isset($args[2])) {
                        $sender->sendMessage("§e/bits <give/balance/take> <player> <amount>");
                        return false;
                    }
                    MagicCore::getInstance()->giveBitsBalance($args[1], (float) $args[2]);
                    $sender->sendMessage(" §7Added §e" . $args[2] . "§7 Bits In §e" . $args[1]);
                    
                    $player = Server::getInstance()->getPlayerExact($args[1]);
                    if ($player instanceof Player) {
                        $player->sendMessage(" §7You Got §e" . $args[2] . "§7 Bits");
                    }
                    break;
                case "balance":
                    $sender->sendMessage(' §7The Player §e' . $args[1] . '§7 Have : §e$' . MagicCore::getInstance()->getBitsBalance($args[1]) . "§7 Bits");
                    break;
                case "take":
                    if (!isset($args[2])) {
                        $sender->sendMessage("§e/bits <give/balance/take> <player> <amount>");
                        return false;
                    }
                    MagicCore::getInstance()->takeBitsBalance($args[1], (float) $args[2]);
                    $sender->sendMessage(" §7Removed §e" . $args[2] . "§7 Bits In §e" . $args[1]);
                    break;
                default:
                    $sender->sendMessage("§e/bits <give/balance/take> <player> <amount>");
                    break;
            }
            return true;
        }
        $sender->sendMessage(MagicCore::PREFIX . "You Don't Have Permission");
        return false;
    }
}
