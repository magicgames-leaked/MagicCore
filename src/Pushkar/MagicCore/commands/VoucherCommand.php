<?php

namespace Pushkar\MagicCore\commands;

use pocketmine\Server;
use pocketmine\player\Player;
use pocketmine\command\Command;
use pocketmine\item\ItemFactory;
use Pushkar\MagicCore\MagicCore;
use pocketmine\command\CommandSender;
use pocketmine\data\bedrock\EnchantmentIdMap;
use pocketmine\item\enchantment\EnchantmentInstance;

class VoucherCommand extends Command
{
    private EnchantmentInstance $fakeEnchant;
    
    public function __construct()
    {
        parent::__construct("voucher", "§eGive Vouchers", "/voucher <player> <voucher name>");
        $this->setPermission("voucher.cmd");
        /** @phpstan-ignore-next-line */
        $this->fakeEnchant = new EnchantmentInstance(EnchantmentIdMap::getInstance()->fromId(MagicCore::FAKE_ENCH_ID));
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): mixed
    {
        if ($sender->hasPermission("voucher.cmd")) {
            if (!isset($args[0]) || !isset($args[1])) {
                $sender->sendMessage("§e/voucher <player> <voucher name>");
                return false;
            }
            
            $player = Server::getInstance()->getPlayerExact($args[0]);
            if (!$player instanceof Player) {
                $sender->sendMessage("Use this command in-game");
                return false;
            }

            switch ($args[1]) {
                case "vote":
                    $item = ItemFactory::getInstance()->get(339, 0, 1);
                    $item->setCustomName("§r§eVoter Rank §aVoucher");
                    $item->setLore(["§r§aVoucher Reward: §eVoter Rank\n\n§r§7Tap The Voucher On Ground To Claim"]);
                    $item->getNamedTag()->setString("voterank", "voucher");
                    $item->addEnchantment($this->fakeEnchant);
                    $player->getInventory()->addItem($item);
                    $player->sendMessage(" §7You Have Been Given §eVoter Rank§7 Voucher!");
                    break;
                default:
                    $sender->sendMessage("§eThat Voucher Doesn't Exist");
                    break;
            }
            return true;
        }
        $sender->sendMessage(MagicCore::PREFIX . "You Don't Have Permission");
        return false;
    }
}
