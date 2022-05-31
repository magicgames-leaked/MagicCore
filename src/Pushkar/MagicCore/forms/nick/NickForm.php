<?php

namespace Pushkar\MagicCore\forms\nick;

use dktapps\pmforms\FormIcon;
use dktapps\pmforms\MenuForm;
use pocketmine\player\Player;
use dktapps\pmforms\MenuOption;
use Pushkar\MagicCore\utils\Utils;

class NickForm extends MenuForm
{

    public function __construct()
    {
        parent::__construct(
            "§9§l« §r§1Nickname Menu §9§l»§r",
            "",
            [
                new MenuOption("§a§lCHANGE NICKNAME\n§r§8Tap to continue", new FormIcon("textures/ui/confirm", FormIcon::IMAGE_TYPE_PATH)),
                new MenuOption("§c§lRESET NICKNAME\n§r§8Tap to reset", new FormIcon("textures/ui/trash", FormIcon::IMAGE_TYPE_PATH)),
                new MenuOption("§c§lEXIT\n§r§8Tap to exit", new FormIcon("textures/ui/cancel", FormIcon::IMAGE_TYPE_PATH))
            ],
            function (Player $player, int $selected): void {
                switch ($selected) {
                    case 0:
                        $player->sendForm(new NickChangeForm());
                        break;
                    case 1:
                        (new Utils())->resetNick($player);
                        break;
                    case 2:
                        //nothing
                        break;
                }
            }
        );
    }
}
