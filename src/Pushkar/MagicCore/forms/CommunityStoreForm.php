<?php

namespace Pushkar\MagicCore\forms;

use dktapps\pmforms\FormIcon;
use dktapps\pmforms\MenuForm;
use pocketmine\player\Player;
use dktapps\pmforms\MenuOption;
use Pushkar\MagicCore\forms\CommunityShopForm;

class CommunityStoreForm extends MenuForm
{
    public function __construct(Player $player)
    {
        $name = $player->getName();
        parent::__construct("is_dynamic&side_text§eCommunity Shop", "§bHello§e $name\n\n§bHere You Can Buy Rare Items With Bits", [
            new MenuOption("grid_tile§eMinion fuel", new FormIcon("https://i.imgur.com/haX97tN.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("grid_tile§eBuilder Wand", new FormIcon("textures/items/wand/builders_wand", FormIcon::IMAGE_TYPE_PATH)),
            new MenuOption("grid_tile§eSell Wand", new FormIcon("https://i.imgur.com/V3avY1E.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("grid_tile§eSmelt Wand", new FormIcon("https://i.imgur.com/6oJRXeS.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("grid_tile§eBooster Cookie", new FormIcon("https://i.imgur.com/iHEqyjB.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("grid_tile§eGod Portion", new FormIcon("https://i.imgur.com/PpZIXJr.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("grid_tile§eEarn bits", new FormIcon("https://cdn-icons-png.flaticon.com/128/3135/3135679.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("header_button", new FormIcon("textures/ui/icon_back", FormIcon::IMAGE_TYPE_PATH))
        ], function (Player $sender, int $selected): void {
            switch ($selected) {
                case 0:

                    break;
                case 1:

                    break;
                case 2:

                    break;

                case 3:

                    break;

                case 4:

                    break;

                case 5:

                    break;

                case 6:

                    break;

                case 7:
                    $sender->sendForm(new CommunityShopForm($sender));
                    break;
            }
        });
    }
}
