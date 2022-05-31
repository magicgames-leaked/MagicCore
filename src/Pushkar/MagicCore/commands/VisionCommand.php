<?php

namespace Pushkar\MagicCore\commands;

use pocketmine\player\Player;
use pocketmine\command\Command;
use Pushkar\MagicCore\MagicCore;
use pocketmine\command\CommandSender;
use pocketmine\entity\effect\EffectInstance;
use pocketmine\entity\effect\VanillaEffects;

class VisionCommand extends Command
{
    private array $vision;

    public function __construct()
    {
        parent::__construct("vision", "§eGet Vision :D");
        $this->setPermission("vision.cmd");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): mixed
    {
        if ($sender instanceof Player) {
            if ($sender->hasPermission("vision.cmd")) {
                if (isset($this->vision[$sender->getName()])) {
                    unset($this->vision[$sender->getName()]);
                    $sender->getEffects()->remove(VanillaEffects::NIGHT_VISION());
                    $sender->sendMessage(" §aVision: Off");
                    return true;
                }
                $this->vision[$sender->getName()] = 0;
                $sender->getEffects()->add(new EffectInstance(VanillaEffects::NIGHT_VISION(), 600 * 100, 3));
                $sender->sendMessage(" §aVision: On");
                return true;
            }
            $sender->sendMessage(MagicCore::PREFIX . "You Don't Have Permission");
        }
        return false;
    }
}
