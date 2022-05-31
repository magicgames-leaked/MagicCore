<?php

namespace Pushkar\MagicCore\forms;

use pocketmine\Server;

use dktapps\pmforms\FormIcon;
use dktapps\pmforms\MenuForm;
use pocketmine\player\Player;
use dktapps\pmforms\MenuOption;
use jojoe77777\FormAPI\CustomForm;
use jojoe77777\FormAPI\SimpleForm;
use Pushkar\MagicCore\forms\CommunityShopForm;

class StoreForm extends MenuForm
{

    public function __construct()
    {
        parent::__construct("is_dynamic&side_text§eStore", "§eThere Are Several Things Which You Can Buy From Our Website\n\n§eYour Ranks Purchasing Keeps The Server Getting New Updates\n\n§bmagicgames.tebex.io", [
            new MenuOption("grid_tile§aVIP", new FormIcon("https://i.imgur.com/NTLdDOO.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("grid_tile§aVIP§c+", new FormIcon("https://i.imgur.com/7ekMbwD.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("grid_tile§bMVP", new FormIcon("https://i.imgur.com/iyw0IVB.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("grid_tile§bMVP§c+", new FormIcon("https://i.imgur.com/0QweNSQ.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("grid_tile§bMVP§e+§c+", new FormIcon("https://i.imgur.com/93Fuqj5.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("grid_tile§dLord", new FormIcon("https://i.imgur.com/ieDLusZ.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("grid_tile§dLord§b+", new FormIcon("https://i.imgur.com/ieDLusZ.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("grid_tile§e500000 Coins", new FormIcon("https://i.imgur.com/EbMGL97.jpg", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("grid_tile§e1000000 Coins", new FormIcon("https://i.imgur.com/RCb3MDP.jpg", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("grid_tile§e5000000 Coins", new FormIcon("https://i.imgur.com/kHQm64E.jpg", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("grid_tile§b100 Bits", new FormIcon("https://i.imgur.com/oqCwO8d.jpg", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("grid_tile§b500 Bits", new FormIcon("https://i.imgur.com/cD9nLns.jpg", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("header_button", new FormIcon("textures/ui/icon_back", FormIcon::IMAGE_TYPE_PATH))
        ], function (Player $sender, int $selected): void {
            switch ($selected) {
                case 0:
                    $this->vip($sender);
                    break;
                case 1:
                    $this->vipplus($sender);
                    break;
                case 2:
                    $this->mvp($sender);
                    break;
                case 3:
                    $this->mvpplus($sender);
                    break;
                case 4:
                    $this->mvpplusplus($sender);
                    break;
                case 5:
                    $this->lord($sender);
                    break;
                case 6:
                    $this->lordplus($sender);
                    break;
                case 7:
                    $this->coin1($sender);
                    break;
                case 8:
                    $this->coin2($sender);
                    break;
                case 9:
                    $this->coin3($sender);
                    break;
                case 10:
                    $this->bits1($sender);
                    break;
                case 11:
                    $this->bits2($sender);
                    break;
                case 12:
                    $sender->sendForm(new CommunityShopForm($sender));
                    break;
            }
        });
    }

    public function vip(Player $sender): void
    {
        $form = new SimpleForm(function (Player $sender, int $data = null) {
            if ($data === null) {
                return true;
            }
            switch ($data) {
                case 0:
                    $sender->sendForm(new StoreForm());
                    break;
            }
        });
        $form->setTitle("§6»§aVIP§6«");
        $form->setContent("§aVIP Rank Features §eMagic§6Games\n§a» §e/heal\n§a» §e/feed\n§a» §e/cape\n§a» §e/craft\n\n§cBonus\n§a» PlayerVaults 1-2\n§a» Access To MEMBER KIT\n§a» Access To VIP KIT\n\n§l§ePRICE: §e$2\n§r§aWant To Buy Rank?\n§aVisit https://magicgames.tebex.io");
        $form->addButton("§cBack", 0, "textures/blocks/barrier");
        $sender->sendForm($form);
    }

    public function vipplus(Player $sender): void
    {
        $form = new SimpleForm(function (Player $sender, int $data = null) {
            if ($data === null) {
                return true;
            }
            switch ($data) {
                case 0:
                    $sender->sendForm(new StoreForm());
                    break;
            }
        });
        $form->setTitle("§eVIP §a+");
        $form->setContent("§aVIP§c+ §aRank Features §eMagic§6Games\n§a» §e/heal\n§a» §e/feed\n§a» §e/craft\n§a» §e/cape\n§a» §e/emoji\n\n§cBonus\n§a» PlayerVaults 1-4\n§a» Access To MEMBER KIT\n§a» Access To VIP KIT\n§a» Access To VIP§c+§aKIT\n\n§l§ePRICE: §e$3\n§r§aWant To Buy Rank?\n§aVisit https://magicgames.tebex.io");
        $form->addButton("§cBack", 0, "textures/blocks/barrier");
        $sender->sendForm($form);
    }

    public function mvp(Player $sender): void
    {
        $form = new SimpleForm(function (Player $sender, int $data = null) {
            if ($data === null) {
                return true;
            }
            switch ($data) {
                case 0:
                    $sender->sendForm(new StoreForm());
                    break;
            }
        });
        $form->setTitle("§bMVP");
        $form->setContent("§bMVP §aRank Features §eMagic§6Games\n§a» §e/heal\n§a» §e/feed\n§a» §e/craft\n§a» §e/cape\n§a» §e/emoji\n§a» §e/size\n§a» §e/speed\n§a» §e/repair\n\n§cBonus\n§a» PlayerVaults 1-6\n§a» Access To MEMBER KIT\n§a» Access To VIP KIT\n§a» Access To MEMBER KIT\n§a» Access To §bVIP+§a KIT\n\n§l§ePRICE: §e$5\n§r§aWant To Buy Rank?\n§aVisit https://magicgames.tebex.io");
        $form->addButton("§cBack", 0, "textures/blocks/barrier");
        $sender->sendForm($form);
    }

    public function mvpplus(Player $sender): void
    {
        $form = new SimpleForm(function (Player $sender, int $data = null) {
            if ($data === null) {
                return true;
            }
            switch ($data) {
                case 0:
                    $sender->sendForm(new StoreForm());
                    break;
            }
        });
        $form->setTitle("§bMVP§c+");
        $form->setContent("§bMVP§c+ §aRank Features §eMagic§6Games\n§a» §e/heal\n§a» §e/feed\n§a» §e/craft\n§a» §e/cape\n§a» §e/emoji\n§a» §e/size\n§a» §e/skin\n§a» §e/speed\n§a» §e/vision\n§a» §e/repair\n\n§cBonus\n§a» PlayerVaults 1-8\n§a» Access To MEMBER KIT\n§a» Access To VIP KIT\n§a» Access To VIP+ KIT\n§a» Access To MVP KIT\n§a» Access To §bMVP§c+§a KIT\n\n§l§ePRICE: §e$8\n§r§aWant To Buy Rank?\n§aVisit https://magicgames.tebex.io");
        $form->addButton("§cBack", 0, "textures/blocks/barrier");
        $sender->sendForm($form);
    }

    public function mvpplusplus(Player $sender): void
    {
        $form = new SimpleForm(function (Player $sender, int $data = null) {
            if ($data === null) {
                return true;
            }
            switch ($data) {
                case 0:
                    $sender->sendForm(new StoreForm());
                    break;
            }
        });
        $form->setTitle("§bMVP §c++");
        $form->setContent("§bMVP§e+§c+ §aRank Features §eMagic§6Games\n§a» §e/pets\n§a» §e/heal\n§a» §e/feed\n§a» §e/craft\n§a» §e/cape\n§a» §e/emoji\n§a» §e/size\n§a» §e/speed\n§a» §e/vision\n§a» §e/repair\n§a» §e/skin\n\n§cBonus\n§a» PlayerVaults 1-10\n§a» Access To MEMBER KIT\n§a» Access To VIP KIT\n§a» Access To VIP+ KIT\n§a» Access To MVP KIT\n§a» Access To MVP+ KIT\n§a» Access To §bMVP§e+§c+§a KIT\n\n§l§ePRICE: §e$10\n§r§aWant To Buy Rank?\n§aVisit https://magicgames.tebex.io");
        $form->addButton("§cBack", 0, "textures/blocks/barrier");
        $sender->sendForm($form);
    }
    public function lord(Player $sender): void
    {
        $form = new SimpleForm(function (Player $sender, int $data = null) {
            if ($data === null) {
                return true;
            }
            switch ($data) {
                case 0:
                    $sender->sendForm(new StoreForm());
                    break;
            }
        });
        $form->setTitle("§dlord");
        $form->setContent("§dLord §aRank Features §eMagic§6Games\n§a» §e/pets\n§a» §e/heal\n§a» §e/feed\n§a» §e/craft\n§a» §e/cape\n§a» §e/emoji\n§a» §e/size\n§a» §e/speed\n§a» §e/vision\n§a» §e/repair\n§a» §e/skin\n§a» §e/fly\n§a» §e/vanish\n§a» §e/sit\n\n§cBonus\n§a» PlayerVaults 1-12\n§a» Access To MEMBER KIT\n§a» Access To VIP KIT\n§a» Access To VIP+ KIT\n§a» Access To MVP KIT\n§a» Access To MVP+ KIT\n§a» Access To §bMVP§e+§c+§a KIT\n§a» Access To LORD Kit\n\n§l§ePRICE: §e$13\n§r§aWant To Buy Rank?\n§aVisit https://magicgames.tebex.io");
        $form->addButton("§cBack", 0, "textures/blocks/barrier");
        $sender->sendForm($form);
    }

    public function lordplus(Player $sender): void
    {
        $form = new SimpleForm(function (Player $sender, int $data = null) {
            if ($data === null) {
                return true;
            }
            switch ($data) {
                case 0:
                    $sender->sendForm(new StoreForm());
                    break;
            }
        });
        $form->setTitle("§dlord+");
        $form->setContent("§dLord+ §aRank Features §eMagic§6Games\n§a» §e/pets\n§a» §e/heal\n§a» §e/feed\n§a» §e/craft\n§a» §e/cape\n§a» §e/emoji\n§a» §e/size\n§a» §e/speed\n§a» §e/vision\n§a» §e/repair\n§a» §e/skin\n§a» §e/fly\n§a» §e/vanish\n§a» §e/god\n§a» §e/lay\n§a» §e/sit\n\n§cBonus\n§a» PlayerVaults 1-14\n§a» Access To MEMBER KIT\n§a» Access To VIP KIT\n§a» Access To VIP+ KIT\n§a» Access To MVP KIT\n§a» Access To MVP+ KIT\n§a» Access To §bMVP§e+§c+§a KIT\n§a» Access To LORD Kit\n§a» Access To LORD+ Kit\n\n§l§ePRICE: §e$15\n§r§aWant To Buy Rank?\n§aVisit https://magicgames.tebex.io");
        $form->addButton("§cBack", 0, "textures/blocks/barrier");
        $sender->sendForm($form);
    }

    public function coin1(Player $sender): void
    {
        $form = new SimpleForm(function (Player $sender, int $data = null) {
            if ($data === null) {
                return true;
            }
            switch ($data) {
                case 0:
                    $sender->sendForm(new StoreForm());
                    break;
            }
        });
        $form->setTitle("§eCoins");
        $form->setContent("§bAmount: §e500000 Coins\n\n§l§ePRICE: §e$3\n§r§aWant To Buy Coins?\n§aVisit https://magicgames.tebex.io");
        $form->addButton("§cBack", 0, "textures/blocks/barrier");
        $sender->sendForm($form);
    }

    public function coin2(Player $sender): void
    {
        $form = new SimpleForm(function (Player $sender, int $data = null) {
            if ($data === null) {
                return true;
            }
            switch ($data) {
                case 0:
                    $sender->sendForm(new StoreForm());
                    break;
            }
        });
        $form->setTitle("§eCoins");
        $form->setContent("§bAmount: §e1000000 Coins\n\n§l§ePRICE: §e$5\n§r§aWant To Buy Coins?\n§aVisit https://magicgames.tebex.io");
        $form->addButton("§cBack", 0, "textures/blocks/barrier");
        $sender->sendForm($form);
    }

    public function coin3(Player $sender): void
    {
        $form = new SimpleForm(function (Player $sender, int $data = null) {
            if ($data === null) {
                return true;
            }
            switch ($data) {
                case 0:
                    $sender->sendForm(new StoreForm());
                    break;
            }
        });
        $form->setTitle("§eCoins");
        $form->setContent("§bAmount: §e5000000 Coins\n\n§l§ePRICE: §e$12\n§r§aWant To Buy Coins?\n§aVisit https://magicgames.tebex.io");
        $form->addButton("§cBack", 0, "textures/blocks/barrier");
        $sender->sendForm($form);
    }
    public function bits1(Player $sender): void
    {
        $form = new SimpleForm(function (Player $sender, int $data = null) {
            if ($data === null) {
                return true;
            }
            switch ($data) {
                case 0:
                    $sender->sendForm(new StoreForm());
                    break;
            }
        });
        $form->setTitle("§bBits");
        $form->setContent("§bAmount: §e100 Bits\n\n§l§ePRICE: §e$3\n§r§aWant To Buy Bits?\n§aVisit https://magicgames.tebex.io");
        $form->addButton("§cBack", 0, "textures/blocks/barrier");
        $sender->sendForm($form);
    }

    public function bits2(Player $sender): void
    {
        $form = new SimpleForm(function (Player $sender, int $data = null) {
            if ($data === null) {
                return true;
            }
            switch ($data) {
                case 0:
                    $sender->sendForm(new StoreForm());
                    break;
            }
        });
        $form->setTitle("§bBits");
        $form->setContent("§bAmount: §e500 Bits\n\n§l§ePRICE: §e$8\n§r§aWant To Buy Bits?\n§aVisit https://magicgames.tebex.io");
        $form->addButton("§cBack", 0, "textures/blocks/barrier");
        $sender->sendForm($form);
    }
}
