<?php

namespace Pushkar\MagicCore\listener;

use pocketmine\Server;
use AGTHARN\BankUI\Main;
use pocketmine\world\World;
use pocketmine\math\Vector3;
use pocketmine\utils\Config;
use pocketmine\player\Player;
use Stats\player\MagicPlayer;
use pocketmine\event\Listener;
use _64FF00\PurePerms\PurePerms;
use pocketmine\item\ItemFactory;
use Pushkar\MagicCore\MagicCore;
use pocketmine\item\VanillaItems;
use jojoe77777\FormAPI\SimpleForm;
use onebone\economyapi\EconomyAPI;
use pocketmine\math\AxisAlignedBB;
use pocketmine\math\VoxelRayTrace;
use pocketmine\block\BlockLegacyIds;
use Pushkar\MagicCore\forms\StarForm;
use pocketmine\event\block\BlockPlaceEvent;
use Pushkar\MagicCore\forms\GrindStoneForm;
use pocketmine\console\ConsoleCommandSender;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\player\PlayerInteractEvent;
use Pushkar\MagicCore\forms\anvil\AnvilMainForm;
use pocketmine\event\player\PlayerBucketEmptyEvent;
use pocketmine\network\mcpe\protocol\types\DeviceOS;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\entity\EntityTrampleFarmlandEvent;
use pocketmine\event\inventory\InventoryTransactionEvent;

class EventListener implements Listener
{
    public function onJoin(PlayerJoinEvent $event): void
    {
        $sender = $event->getPlayer();
        if (!file_exists(MagicCore::getInstance()->getDataFolder() . "Players/" . $sender->getName() . ".yml")) {
            new Config(MagicCore::getInstance()->getDataFolder() . "Players/" . $sender->getName() . ".yml", Config::YAML, array(
                "Bits" => 0,
                "Claimed" => [],
                "PremiumPass" => false,
                "PremiumClaimed" => [],
            ));
        }
        MagicCore::getInstance()->loadData($sender);
        $item = ItemFactory::getInstance()->get(1070, 0, 1);
        $item->setCustomName("§r§aSkyblock Menu §7( Right Click )§r");
        $item->setLore(["§r§7View All Of Your Skyblock Progress Including Your Skills,\n§7Collections, Recipes And More!\n\n§r§eClick To Open!"]);
        $sender->getHungerManager()->setFood(20);
        $sender->getHungerManager()->setSaturation(20);
        $sender->getInventory()->setItem(8, $item);
        if ($sender->isConnected()) {
            $name = $sender->getName();
            $sender->sendMessage("§e==============§6=============\n§r§7Welcome, $name §7to §eMagic Skyblock\n\n§7Amazing SkyBlock Experience On Bedrock\n\n§e§lVOTE: §r§7Our Vote Website http://bit.ly/vote-magic \n§6§lDISCORD: §r§7http://discord.io/magicgames\n§e==============§6==============");
            if (MagicCore::getInstance()->getConfig()->get("Hub-Spawn") === true) {
                $defaultWorld = MagicCore::getInstance()->getServer()->getWorldManager()->getDefaultWorld();
                if (!$defaultWorld instanceof World) {
                    return;
                }

                $sender->teleport($defaultWorld->getSafeSpawn());
            }
            if (MagicCore::getInstance()->getConfig()->get("onJoin-FlyReset") === true) {
                if ($sender->isCreative()) return;
                $sender->setAllowFlight(false);
            }
        }
        $ainv = $sender->getArmorInventory();
        if (!$sender->hasPlayedBefore()) {
            if (MagicCore::getInstance()->getConfig()->get("First-Join") === true) {
                if (MagicCore::getInstance()->getConfig()->get("Inventory") === true) {
                    foreach (MagicCore::getInstance()->getConfig()->get("Slots", []) as $slotItem) {
                        $result = ItemFactory::getInstance()->get($slotItem["id"], $slotItem["damage"], $slotItem["count"]);
                        $result->setCustomName($slotItem["name"]);
                        $result->setLore([$slotItem["lore"]]);
                        $sender->getInventory()->setItem($slotItem["slot"], $result);
                    }
                }
                foreach (MagicCore::getInstance()->getConfig()->get("First-Join-Command") as $v) {
                    MagicCore::getInstance()->getServer()->dispatchCommand(new ConsoleCommandSender(MagicCore::getInstance()->getServer(), MagicCore::getInstance()->getServer()->getLanguage()), str_replace("{player}", $sender->getName(), $v));
                }
                if (MagicCore::getInstance()->getConfig()->get("Armor") === true) {
                    $data = MagicCore::getInstance()->getConfig()->get("helm");
                    $item = ItemFactory::getInstance()->get($data["id"]);
                    $item->setCustomName($data["name"]);
                    $item->setLore([$data["lore"]]);
                    $ainv->setHelmet($item);

                    $data = MagicCore::getInstance()->getConfig()->get("chest");
                    $item = ItemFactory::getInstance()->get($data["id"]);
                    $item->setCustomName($data["name"]);
                    $item->setLore([$data["lore"]]);
                    $ainv->setChestplate($item);

                    $data = MagicCore::getInstance()->getConfig()->get("leggins");
                    $item = ItemFactory::getInstance()->get($data["id"]);
                    $item->setCustomName($data["name"]);
                    $item->setLore([$data["lore"]]);
                    $ainv->setLeggings($item);

                    $data = MagicCore::getInstance()->getConfig()->get("boots");
                    $item = ItemFactory::getInstance()->get($data["id"]);
                    $item->setCustomName($data["name"]);
                    $item->setLore([$data["lore"]]);
                    $ainv->setBoots($item);
                }
            }
        }
    }

    public function onQuit(PlayerQuitEvent $event): void
    {
        $player = $event->getPlayer();
        MagicCore::getInstance()->saveData($player);
        unset(MagicCore::getInstance()->bitsMoney[$player->getName()]);
    }

    /**
     * @handleCancelled
     */
    public function onInteract(PlayerInteractEvent $event): void
    {
        $sender = $event->getPlayer();
        $item = $event->getItem();
        $block = $event->getBlock();
        switch ($event->getAction()) {
            case PlayerInteractEvent::LEFT_CLICK_BLOCK:
                if ($item->getId() === 1070 && $item->getCustomName() === "§r§aSkyblock Menu §7( Right Click )§r") {
                    $event->cancel();
                    $sender->sendForm(new StarForm($sender));
                }
                break;
            case PlayerInteractEvent::RIGHT_CLICK_BLOCK:
                if ($item->getId() === 1070 && $item->getCustomName() === "§r§aSkyblock Menu §7( Right Click )§r") {
                    $event->cancel();
                    $sender->sendForm(new StarForm($sender));
                }
                if (MagicCore::getInstance()->getConfig()->get("Anvil-Ui") === true) {
                    if ($block->getId() == 145) {
                        $event->cancel();
                        $event->getPlayer()->sendForm(new AnvilMainForm());
                    }
                }
                if (MagicCore::getInstance()->getConfig()->get("Grindstone-Ui") === true) {
                    if ($block->getId() == 450) {
                        $event->cancel();
                        $sender->sendForm(new GrindStoneForm());
                    }
                }
                if ($item->getNamedTag()->getTag("aspect_of_the_end") !== null) {
                    $start = $sender->getPosition()->add(0, $sender->getEyeHeight(), 0);

                    $endVector = $sender->getDirectionVector()->multiply($sender->getViewDistance() * 16);
                    $end = $start->add($endVector->getX(), $endVector->getY(), $endVector->getZ());
                    $level = $sender->getWorld();
                    foreach (VoxelRayTrace::betweenPoints($start, $end) as $vector3) {
                        if ($vector3->y >= World::Y_MAX or $vector3->y <= 0) {
                            return;
                        }
                        if (($result = $level->getBlockAt((int)$vector3->x, (int)$vector3->y, (int)$vector3->z)->calculateIntercept($start, $end)) !== null) {
                            $target = $result->hitVector;
                            $sender->teleport($target);
                            return;
                        }
                    }
                }
                // uhhh i dont think we should really do that ~ AGTHARN

                //if ($item->getNamedTag()->getTag("golem_sword") !== null) {
                //    $explosion = new Explosion(new Position($block->getPosition()->getX(), $block->getPosition()->getY(), $block->getPosition()->getZ(), $sender->getPosition()->getWorld()), 1, null);
                //    $explosion->explodeB();
                //}
                if ($item->getNamedTag()->getTag("leaping_sword") !== null) {
                    $sender->setMotion(new Vector3(mt_rand(1, 3), mt_rand(1, 3), mt_rand(1, 3)));
                }
                if ($item->getNamedTag()->getTag("voterank") !== null) {
                    $item->setCount($item->getCount() - 1);
                    $sender->getInventory()->setItemInHand($item);
                    MagicCore::getInstance()->getServer()->dispatchCommand(new ConsoleCommandSender(MagicCore::getInstance()->getServer(), MagicCore::getInstance()->getServer()->getLanguage()), str_replace("{player}", $sender->getName(), MagicCore::getInstance()->getConfig()->get("Vote-Voucher-Command")));
                    $sender->sendMessage(" §eVote Rank Voucher Successfully Claimed");
                }

                if ($item->getNamedTag()->getTag("profile") !== null) {
                    Server::getInstance()->dispatchCommand($sender, "profile");
                }
                if ($item->getNamedTag()->getTag("bag") !== null) {
                    Server::getInstance()->dispatchCommand($sender, "vaultui");
                }
                if ($item->getNamedTag()->getTag("bank") !== null) {
                    Server::getInstance()->dispatchCommand($sender, "bank");
                }
                break;
        }
    }

    public function onTransaction(InventoryTransactionEvent $event): void
    {
        $transaction = $event->getTransaction();
        foreach ($transaction->getActions() as $action) {
            $item = $action->getSourceItem();
            if ($item->getId() === 1070 && $item->getCustomName() === "§r§aSkyblock Menu §7( Right Click )§r") {
                $event->cancel();
            }
        }
    }

    public function onEntityDamage1(EntityDamageEvent $event): void
    {
        $entity = $event->getEntity();
        if (!$entity instanceof Player) {
            return;
        }

        if (MagicCore::getInstance()->getConfig()->get("onDamage-FlyReset") === true) {
            if ($event instanceof EntityDamageByEntityEvent) {
                $damager = $event->getDamager();
                if ($damager instanceof Player) {
                    if ($damager->isCreative()) return;
                    if ($damager->getAllowFlight() === true) {
                        $damager->sendMessage(MagicCore::PREFIX . "Flight mode disabled due to combat");
                        $damager->setAllowFlight(false);
                        $damager->setFlying(false);
                    }
                }
            }
        }
        if ($event->getCause() === EntityDamageEvent::CAUSE_VOID) {
            $defaultWorld = $entity->getWorld()->getSpawnLocation();
            $entity->teleport($defaultWorld);
            $event->cancel();
            $senderMoney = EconomyAPI::getInstance()->myMoney($entity);
            if (!is_float($senderMoney)) {
                return;
            }
            if (MagicCore::getInstance()->getConfig()->get("Void-Money-Lose") === true) {
                switch (MagicCore::getInstance()->getConfig()->get("Type")) {
                    case "all":
                        $entity->sendMessage("§c§lINFO > §r§bYou Fell In Void And Lost §e$" . $senderMoney);
                        EconomyAPI::getInstance()->reduceMoney($entity, $senderMoney);
                        break;
                    case "half":
                        $entity->sendMessage("§c§lINFO > §r§bYou Fell In Void And Lost §e$" . $senderMoney / 2);
                        EconomyAPI::getInstance()->reduceMoney($entity, $senderMoney / 2);
                        break;
                    case "amount":
                        $entity->sendMessage("§c§lINFO > §r§bYou Fell In Void And Lost §e$" . (float)MagicCore::getInstance()->getConfig()->get("Money-Loss"));
                        EconomyAPI::getInstance()->reduceMoney($entity, (float)MagicCore::getInstance()->getConfig()->get("Money-Loss"));
                        break;
                    case "percent":
                        $entity->sendMessage("§c§lINFO > §r§bYou Fell In Void And Lost §e$" . ((float)MagicCore::getInstance()->getConfig()->get("Money-Loss") / 100) * $senderMoney);
                        EconomyAPI::getInstance()->reduceMoney($entity, ((float)MagicCore::getInstance()->getConfig()->get("Money-Loss") / 100) * $senderMoney);
                        break;
                }
            }
        }
    }

    /** @priority LOWEST */
    public function onEntityDamage2(EntityDamageEvent $event): void
    {
        $entity = $event->getEntity();
        if (!$entity instanceof Player) {
            return;
        }

        $aabb = new AxisAlignedBB(107.00, (float) World::Y_MIN, -74.00, 151.00, (float) World::Y_MAX, -30.00);
        if ($entity->getPosition()->getWorld()->getFolderName() === "MagicGames") {
            if ($aabb->isVectorInXZ($entity->getPosition())) {
                $event->uncancel();
                return;
            }
            $event->cancel();
        }

        if ($event instanceof EntityDamageByEntityEvent) {
            $damager = $event->getDamager();
            $victim = $event->getEntity();
            $level = $victim->getWorld()->getFolderName();
            $worlds = ["test", "Arena"];
            if (in_array($level, $worlds))
                return;
            if (!$damager instanceof Player or !$victim instanceof Player)
                return;
            if ($damager->getInventory()->getItemInHand()->getId() !== 0)
                return;

            $event->cancel();
            $form = new SimpleForm(function (Player $player, ?int $result) use ($victim) {
                if ($result === null) return;
                switch ($result) {
                    case 0:
                        $name = $victim->getName();
                        Server::getInstance()->dispatchCommand($player, "visit \"$name\"");
                        break;
                    case 1:
                        #$sender = $event->getEntity();
                        $name = $victim->getName();
                        Server::getInstance()->dispatchCommand($player, "trade request \"$name\"");
                        break;
                    case 2:
                        #$sender = $event->getEntity();
                        $name = $victim->getName();
                        Server::getInstance()->dispatchCommand($player, "trade accept \"$name\"");
                        break;
                }
            });
            $purePerms = Server::getInstance()->getPluginManager()->getPlugin("PurePerms");
            if (!$purePerms instanceof PurePerms) {
                return;
            }

            $damage = $victim instanceof MagicPlayer ? $victim->getDamage() : 0;
            $defense = ($victim instanceof MagicPlayer ? $victim->getDefense() : 0) + $victim->getArmorPoints();
            $heal = $victim->getHealth();
            $maxheal = $victim->getMaxHealth();
            $name = $victim->getName();

            $rank = $purePerms->getUserDataMgr()->getData($victim)["group"];
            $coin = EconomyAPI::getInstance()->myMoney($victim);
            $ping = $victim->getNetworkSession()->getPing();
            $bank = Main::getInstance()->getSessionManager()->getSession($victim)->money;
            $device = $this->getPlayerPlatform($victim);
            $form->setTitle("§l§ePROFILE");
            $form->setContent("§bName:§e $name\n§bPing:§e $ping\n§bRank:§e $rank\n§bMoney In Purse:§e $coin\n§bMoney In Bank:§e $bank\n§bDevice:§e $device\n\n§d§lSTATS:§r\n§7+ §cHealth: $heal" . "§7/§c$maxheal \n§7+ §aDefense: §a$defense \n§7+ §4Damage: $damage ");
            $form->addButton("§l§bVISIT ISLAND\n§l§9»» §r§oTap to visit", 1, "https://i.imgur.com/qt15cyk.png");
            $form->addButton("§l§bREQUEST TRADE\n§l§9»» §r§oTap to request", 1, "https://i.imgur.com/HNAHnLE.png");
            $form->addButton("§l§bACCEPT TRADE\n§l§9»» §r§oTap to request", 1, "https://i.imgur.com/HNAHnLE.png");
            $damager->sendForm($form);
        }
    }

    public function onArenaDeath(PlayerDeathEvent $event): void
    {
        $player = $event->getPlayer();
        if ($player->getPosition()->getWorld()->getFolderName() === "MagicGames") {
            $aabb = new AxisAlignedBB(107.00, (float) World::Y_MIN, -74.00, 151.00, (float) World::Y_MAX, -30.00);
            if ($aabb->isVectorInXZ($player->getPosition())) {
                foreach ($event->getDrops() as $item) {
                    $player->getPosition()->getWorld()->dropItem($player->getLocation(), $item);
                }

                $player->getInventory()->setHeldItemIndex(0);
                $player->getInventory()->clearAll();
                $player->getArmorInventory()->clearAll();
                $player->getOffHandInventory()->clearAll();
            }
        }
    }

    public function onArenaMove(PlayerMoveEvent $event): void
    {
        $player = $event->getPlayer();
        if ($player->getPosition()->getWorld()->getFolderName() === "MagicGames") {
            $aabb = new AxisAlignedBB(105.00, (float) World::Y_MIN, -76.00, 153.00, (float) World::Y_MAX, -28.00);
            $aabb2 = new AxisAlignedBB(107.00, (float) World::Y_MIN, -74.00, 151.00, (float) World::Y_MAX, -30.00);
            if ($aabb->isVectorInXZ($player->getPosition()) && !$aabb2->isVectorInXZ($player->getPosition())) {
                $player->sendMessage(MagicCore::PREFIX . "PvP is enabled in this area. You will lose items if you die.");
            }
        }
    }

    public function onDeath(PlayerDeathEvent $event): void
    {
        $sender = $event->getPlayer();
        if (MagicCore::getInstance()->getConfig()->get("KeepInventory") == true) {
            $worldName = $event->getPlayer()->getWorld()->getDisplayName();
            $worlds = MagicCore::getInstance()->getConfig()->get("KeepInventory-Worlds");
            switch (MagicCore::getInstance()->getConfig()->get("KeepInventory-Mode")) {
                case "all":
                    $event->setKeepInventory(true);
                    break;
                case "whitelist":
                    if (in_array($worldName, $worlds)) {
                        $event->setKeepInventory(true);
                    }
                    break;
                case "blacklist":
                    if (!in_array($worldName, $worlds)) {
                        $event->setKeepInventory(true);
                    }
                    break;
            }
        } else {
            $event->setKeepInventory(false);
        }

        $lastDamage = $sender->getLastDamageCause();
        if (!$lastDamage instanceof EntityDamageByEntityEvent) return;

        $senderMoney = EconomyAPI::getInstance()->myMoney($sender);
        if (is_bool($senderMoney)) {
            return;
        }

        $damager = $lastDamage->getDamager();
        if (MagicCore::getInstance()->getConfig()->get("Death-Money-Lose") === true) {
            if (!$damager instanceof Player) {
                MagicCore::getInstance()->naturalMoneyLoss($sender, $senderMoney);
                return;
            }
            switch (MagicCore::getInstance()->getConfig()->get("Type")) {
                case "all":
                    if (MagicCore::getInstance()->getConfig()->get("KillerGainMoney")) {
                        $damager->sendMessage("§c§lINFO > §r§bYou Have Killed §e " . $sender->getName() . " §bAnd Stole §e$" . $senderMoney);
                        EconomyAPI::getInstance()->addMoney($damager, $senderMoney);
                    }
                    $sender->sendMessage("§c§lINFO > §r§bYou Died And Lost §e$" . $senderMoney);
                    EconomyAPI::getInstance()->reduceMoney($sender, $senderMoney);
                    break;
                case "half":
                    if (MagicCore::getInstance()->getConfig()->get("KillerGainMoney")) {
                        $damager->sendMessage("§c§lINFO > §r§bYou Have Killed §e " . $sender->getName() . " §bAnd Stole §e$" . $senderMoney / 2);
                        EconomyAPI::getInstance()->addMoney($damager, $senderMoney / 2);
                    }
                    $sender->sendMessage("§c§lINFO > §r§bYou Died And Lost §e$" . $senderMoney / 2);
                    EconomyAPI::getInstance()->reduceMoney($sender, $senderMoney / 2);
                    break;
                case "amount":
                    if (MagicCore::getInstance()->getConfig()->get("KillerGainMoney")) {
                        $damager->sendMessage("§c§lINFO > §r§bYou Have Killed §e " . $sender->getName() . " §bAnd Stole §e$" . (float)MagicCore::getInstance()->getConfig()->get("Money-Loss"));
                        EconomyAPI::getInstance()->addMoney($damager, (float)MagicCore::getInstance()->getConfig()->get("Money-Loss"));
                    }
                    $sender->sendMessage("§c§lINFO > §r§bYou Died And Lost §e$" . (float)MagicCore::getInstance()->getConfig()->get("Money-Loss"));
                    EconomyAPI::getInstance()->reduceMoney($sender, (float)MagicCore::getInstance()->getConfig()->get("Money-Loss"));
                    break;
                case "percent":
                    if (MagicCore::getInstance()->getConfig()->get("KillerGainMoney")) {
                        $damager->sendMessage("§c§lINFO > §r§bYou Have Killed §e " . $sender->getName() . " §bAnd Stole §e$" . ((float)MagicCore::getInstance()->getConfig()->get("Money-Loss") / 100) * $senderMoney);
                        EconomyAPI::getInstance()->addMoney($damager, ((float)MagicCore::getInstance()->getConfig()->get("Money-Loss") / 100) * $senderMoney);
                    }
                    $sender->sendMessage("§c§lINFO > §r§bYou Died And Lost §e$" . ((float)MagicCore::getInstance()->getConfig()->get("Money-Loss") / 100) * $senderMoney);
                    EconomyAPI::getInstance()->reduceMoney($sender, ((float)MagicCore::getInstance()->getConfig()->get("Money-Loss") / 100) * $senderMoney);
                    break;
            }
        }
    }

    public function onPlayerTrample(EntityTrampleFarmlandEvent $event): void
    {
        $event->cancel();
    }

    public function onMove(PlayerMoveEvent $event): void
    {
        $player = $event->getPlayer();
        $block = $player->getWorld()->getBlock($player->getPosition());
        if ($block->getId() == BlockLegacyIds::END_PORTAL) {
            Server::getInstance()->dispatchCommand($player, "join");
        }
        if ($block->getId() == BlockLegacyIds::PORTAL) {
            Server::getInstance()->dispatchCommand($player, "hub");
        }
    }

    public function onPlace(BlockPlaceEvent $event): void
    {
        $player = $event->getPlayer();
        $item = $event->getItem();
        $block = $event->getBlock();
        if ($item->getNamedTag()->getTag("enchantedblock") !== null) {
            $event->cancel();
            $player->sendMessage(" §eYou Can't Place Enchanted Blocks On Ground");
        }
    }

    public function onBucket(PlayerBucketEmptyEvent $event): void
    {
        $player = $event->getPlayer();
        $item = $event->getItem();
        if ($item->getNamedTag()->getTag("infi_bucket") !== null) {
            $player->getInventory()->setItemInHand($item);
        }
    }


    public function getPlayerPlatform(Player $player): string
    {
        $extraData = $player->getPlayerInfo()->getExtraData();

        if ($extraData["DeviceOS"] === DeviceOS::ANDROID && $extraData["DeviceModel"] === "") {
            return "Linux";
        }

        return match ($extraData["DeviceOS"]) {
            DeviceOS::ANDROID => "Android",
            DeviceOS::IOS => "iOS",
            DeviceOS::OSX => "macOS",
            DeviceOS::AMAZON => "FireOS",
            DeviceOS::GEAR_VR => "Gear VR",
            DeviceOS::HOLOLENS => "Hololens",
            DeviceOS::WINDOWS_10 => "Windows",
            DeviceOS::WIN32 => "Windows 7 (Edu)",
            DeviceOS::DEDICATED => "Dedicated",
            DeviceOS::TVOS => "TV OS",
            DeviceOS::PLAYSTATION => "PlayStation",
            DeviceOS::NINTENDO => "Nintendo Switch",
            DeviceOS::XBOX => "Xbox",
            DeviceOS::WINDOWS_PHONE => "Windows Phone",
            default => "Unknown"
        };
    }
}
