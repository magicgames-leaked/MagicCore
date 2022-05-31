<?php

namespace Pushkar\MagicCore\forms;

use dktapps\pmforms\FormIcon;
use dktapps\pmforms\MenuForm;
use pocketmine\player\Player;
use dktapps\pmforms\MenuOption;
use Pushkar\MagicCore\forms\StoreForm;

class CommunityShopForm extends MenuForm
{
    public function __construct(Player $sender)
    {
        $name = $sender->getName();
        parent::__construct("is_dynamic&big_button§eCommunity Store", "", [
            new MenuOption("big_button§eStore", new FormIcon("https://i.imgur.com/l9gRbKI.jpg", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("rect_button§t§r§eMagic Pass", new FormIcon("https://i.imgur.com/4OkNRBn.jpg", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("rect_button§t§r§eCommunity shop", new FormIcon("https://i.imgur.com/8StsT7e.jpg", FormIcon::IMAGE_TYPE_URL))
        ], function (Player $sender, int $selected): void {
            switch ($selected) {
                case 0:
                    $sender->sendForm(new StoreForm());
                    break;
                case 1:
                    $sender->sendTitle("§e§lCOMMING SOON");
                    break;
                case 2:
                    $sender->sendTitle("§e§lCOMMING SOON");
                    #$sender->sendForm(new CommunityStoreForm($sender));
                    break;
            }
        });
    }
}
