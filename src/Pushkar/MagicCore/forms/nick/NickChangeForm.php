<?php

namespace Pushkar\MagicCore\forms\nick;

use pocketmine\player\Player;
use dktapps\pmforms\CustomForm;
use dktapps\pmforms\element\Input;
use Pushkar\MagicCore\utils\Utils;
use dktapps\pmforms\CustomFormResponse;

class NickChangeForm extends CustomForm
{

    public function __construct()
    {
        parent::__construct(
            "§9§l«§r §1Nickname Menu §9§l»§r",
            [
                new Input("element0", "§6Type the nickname that u want here:", "§7Nickname...")
            ],
            function (Player $player, CustomFormResponse $response): void {
                $nickName = $response->getString("element0");
                if ($nickName == "reset") {
                    (new Utils())->resetNick($player);
                }
                if (strlen($nickName) > 8) {
                    $player->sendMessage("§l§eMAGICGAMES > §r§bYou Can Make Nickname Only In Less Than 9 Characters!");
                }
                $player->setDisplayName($nickName);
                $player->setNameTag($nickName);
                $player->sendMessage("§6Your nickname is now §c" . $nickName);
            }
        );
    }
}
