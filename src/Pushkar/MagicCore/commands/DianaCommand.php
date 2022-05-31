<?php

namespace Pushkar\MagicCore\commands;

use dktapps\pmforms\FormIcon;
use dktapps\pmforms\MenuForm;
use pocketmine\player\Player;
use dktapps\pmforms\MenuOption;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class DianaCommand extends Command
{
    public function __construct()
    {
        parent::__construct("diana", "§eMayor Diana");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): mixed
    {
        if ($sender instanceof Player) {
            $name = $sender->getName();
            $sender->sendForm(new MenuForm(
                "§l§dMayor Diana",
                "§bHi, §e$name \n§r§bWelcome To Server §eMagic§6Games§r\n\n§cDiana the Mythological Caretaker:§r\n\n§a» §eBarrier Street: §oGain 25percent more bank interest§r\n§a» §eMining XP Buff: §oEarn 1.5x Mining experience on public islands§r\n§a» §eProspection: §oMining minions work 25percent faster§r\n§a» §eArcane Catalyst: §oSpells deal 15percent increased damage§r\n§a» §eAstral Negotiator: §oEnchanting and anvils costs -15percent less experience§r",
                [
                    new MenuOption("§cExit", new FormIcon("textures/blocks/barrier", FormIcon::IMAGE_TYPE_PATH))
                ],
                function (): void {
                }
            ));
            return true;
        }
        return false;
    }
}
