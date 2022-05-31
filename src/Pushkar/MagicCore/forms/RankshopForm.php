<?php

namespace Pushkar\MagicCore\forms;

use pocketmine\Server;
use jojoe77777\FormAPI\Form;
use dktapps\pmforms\FormIcon;
use dktapps\pmforms\MenuForm;
use pocketmine\player\Player;
use dktapps\pmforms\MenuOption;
use Pushkar\MagicCore\MagicCore;
use jojoe77777\FormAPI\SimpleForm;
use onebone\economyapi\EconomyAPI;
use pocketmine\console\ConsoleCommandSender;

class RankshopForm extends MenuForm
{
    public function __construct()
    {
        parent::__construct("is_dynamic&side_text§e» RANKSHOP «", "§bHi, §bWelcome To The Ranks Shop\n\n§aWelcome To The Server\n§eMagic§6Games\n\n§aThere Are Several Ranks Available On Our Server, Namely:", [
            new MenuOption("grid_tile§fMEMBER", new FormIcon("https://i.imgur.com/2b7iNjx.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("grid_tile§eVOTER", new FormIcon("https://i.imgur.com/s6mntJZ.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("grid_tile§aVIP", new FormIcon("https://i.imgur.com/NTLdDOO.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("grid_tile§aVIP§c+", new FormIcon("https://i.imgur.com/7ekMbwD.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("grid_tile§bMVP", new FormIcon("https://i.imgur.com/iyw0IVB.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("grid_tile§bMVP§c+", new FormIcon("https://i.imgur.com/0QweNSQ.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("grid_tile§bMVP§e+§c+", new FormIcon("https://i.imgur.com/93Fuqj5.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("grid_tile§cYOUTUBE", new FormIcon("https://i.imgur.com/HYNd0I3.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("grid_tile§dLORD", new FormIcon("https://i.imgur.com/ieDLusZ.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("grid_tile§dLORD§e+", new FormIcon("https://i.imgur.com/IuF4m8w.png", FormIcon::IMAGE_TYPE_URL))
        ], function (Player $sender, int $selected): void {
            switch ($selected) {
                case 0:
                    $this->member($sender);
                    break;
                case 1:
                    $this->vote($sender);
                    break;
                case 2:
                    $this->vip($sender);
                    break;
                case 3:
                    $this->vipplus($sender);
                    break;
                case 4:
                    $this->mvp($sender);
                    break;
                case 5:
                    $this->mvpplus($sender);
                    break;
                case 6:
                    $this->mvpplusplus($sender);
                    break;
                case 7:
                    $this->youtube($sender);
                    break;
                case 8:
                    $this->lord($sender);
                    break;
                case 9:
                    $this->lordplus($sender);
                    break;
            }
        });
    }

    public function member(Player $sender): Form
    {
        $form = new SimpleForm(function (Player $sender, int $data = null) {
            if ($data === null) {
                return true;
            }
            switch ($data) {
                case 0:
                    $sender->sendForm(new RankshopForm());
                    break;
            }
        });
        $form->setTitle("§6»§aMEMBER§6«");
        $form->setContent(MagicCore::getInstance()->getConfig()->get("member.feature"));
        $form->addButton("§cBack", 0, "textures/blocks/barrier");
        $sender->sendForm($form);
        return $form;
    }

    public function vote(Player $sender): Form
    {
        $form = new SimpleForm(function (Player $sender, int $data = null) {
            if ($data === null) {
                return true;
            }
            switch ($data) {
                case 0:
                    $sender->sendForm(new RankshopForm());
                    break;
            }
        });
        $form->setTitle("§6»§aVOTER§6«");
        $form->setContent(MagicCore::getInstance()->getConfig()->get("voter.feature"));
        $form->addButton("§cBack", 0, "textures/blocks/barrier");
        $sender->sendForm($form);
        return $form;
    }

    public function vip(Player $sender): Form
    {
        $form = new SimpleForm(function (Player $sender, int $data = null) {
            if ($data === null) {
                return true;
            }
            switch ($data) {
                case 0:
                    #$sender->sendMessage(" §eRankShop Will Be Opened When Server Will Release");
                    $this->vipbuy($sender);
                    break;
                case 1:
                    $sender->sendForm(new RankshopForm());
                    break;
            }
        });
        $form->setTitle("§6»§aVIP§6«");
        $form->setContent(str_replace("{cost}", MagicCore::getInstance()->getConfig()->get("vip.cost"), MagicCore::getInstance()->getConfig()->get("vip.feature")));
        $form->addButton("§5» Buy With Ingame Money «\n§a$" . MagicCore::getInstance()->getConfig()->get("vip.cost"), 1, "https://i.imgur.com/MYro8RD.png");
        $form->addButton("§cBack", 0, "textures/blocks/barrier");
        $sender->sendForm($form);
        return $form;
    }

    public function vipplus(Player $sender): Form
    {
        $form = new SimpleForm(function (Player $sender, int $data = null) {
            if ($data === null) {
                return true;
            }
            switch ($data) {
                case 0:
                    #$sender->sendMessage(" §eRankShop Will Be Opened When Server Will Release");
                    $this->vipplusbuy($sender);
                    break;
                case 1:
                    $sender->sendForm(new RankshopForm());
                    break;
            }
        });
        $form->setTitle("§6»§aVIP§c+§6«");
        $form->setContent(str_replace("{cost}", MagicCore::getInstance()->getConfig()->get("vip+.cost"), MagicCore::getInstance()->getConfig()->get("vip+.feature")));
        $form->addButton("§5» Buy With Ingame Money «\n§a$" . MagicCore::getInstance()->getConfig()->get("vip+.cost"), 1, "https://i.imgur.com/MYro8RD.png");
        $form->addButton("§cBack", 0, "textures/blocks/barrier");
        $sender->sendForm($form);
        return $form;
    }

    public function mvp(Player $sender): Form
    {
        $form = new SimpleForm(function (Player $sender, int $data = null) {
            if ($data === null) {
                return true;
            }
            switch ($data) {
                case 0:
                    #$sender->sendMessage(" §eRankShop Will Be Opened When Server Will Release");
                    $this->mvpbuy($sender);
                    break;
                case 1:
                    $sender->sendForm(new RankshopForm());
                    break;
            }
        });
        $form->setTitle("§6»§aMVP§6«");
        $form->setContent(str_replace("{cost}", MagicCore::getInstance()->getConfig()->get("mvp.cost"), MagicCore::getInstance()->getConfig()->get("mvp.feature")));
        $form->addButton("§5» Buy With Ingame Money «\n§a$" . MagicCore::getInstance()->getConfig()->get("mvp.cost"), 1, "https://i.imgur.com/MYro8RD.png");
        $form->addButton("§cBack", 0, "textures/blocks/barrier");
        $sender->sendForm($form);
        return $form;
    }

    public function mvpplus(Player $sender): Form
    {
        $form = new SimpleForm(function (Player $sender, int $data = null) {
            if ($data === null) {
                return true;
            }
            switch ($data) {
                case 0:
                    #$sender->sendMessage(" §eRankShop Will Be Opened When Server Will Release");
                    $this->mvpplusbuy($sender);
                    break;
                case 1:
                    $sender->sendForm(new RankshopForm());
                    break;
            }
        });
        $form->setTitle("§6»§aMVP§c+§6«");
        $form->setContent(str_replace("{cost}", MagicCore::getInstance()->getConfig()->get("mvp+.cost"), MagicCore::getInstance()->getConfig()->get("mvp+.feature")));
        $form->addButton("§5» Buy With Ingame Money «\n§a$" . MagicCore::getInstance()->getConfig()->get("mvp+.cost"), 1, "https://i.imgur.com/MYro8RD.png");
        $form->addButton("§cBack", 0, "textures/blocks/barrier");
        $sender->sendForm($form);
        return $form;
    }

    public function mvpplusplus(Player $sender): Form
    {
        $form = new SimpleForm(function (Player $sender, int $data = null) {
            if ($data === null) {
                return true;
            }
            switch ($data) {
                case 0:
                    #$sender->sendMessage(" §eRankShop Will Be Opened When Server Will Release");
                    $this->mvpplusplusbuy($sender);
                    break;
                case 1:
                    $sender->sendForm(new RankshopForm());
                    break;
            }
        });
        $form->setTitle("§6»§aMVP§e+§c+§6«");
        $form->setContent(str_replace("{cost}", MagicCore::getInstance()->getConfig()->get("mvp++.cost"), MagicCore::getInstance()->getConfig()->get("mvp++.feature")));
        $form->addButton("§5» Buy With Ingame Money «\n§a$" . MagicCore::getInstance()->getConfig()->get("mvp++.cost"), 1, "https://i.imgur.com/MYro8RD.png");
        $form->addButton("§cBack", 0, "textures/blocks/barrier");
        $sender->sendForm($form);
        return $form;
    }

    public function youtube(Player $sender): Form
    {
        $form = new SimpleForm(function (Player $sender, int $data = null) {
            if ($data === null) {
                return true;
            }
            switch ($data) {
                case 0:
                    $sender->sendForm(new RankshopForm());
                    break;
            }
        });
        $form->setTitle("§6»§cYOUTUBE§6«");
        $form->setContent(MagicCore::getInstance()->getConfig()->get("youtube.feature"));
        $form->addButton("§cBack", 0, "textures/blocks/barrier");
        $sender->sendForm($form);
        return $form;
    }

    /*███╗░░░███╗░█████╗░░██████╗░██╗░█████╗░░██████╗░░█████╗░███╗░░░███╗███████╗░██████╗
    ████╗░████║██╔══██╗██╔════╝░██║██╔══██╗██╔════╝░██╔══██╗████╗░████║██╔════╝██╔════╝
    ██╔████╔██║███████║██║░░██╗░██║██║░░╚═╝██║░░██╗░███████║██╔████╔██║█████╗░░╚█████╗░
    ██║╚██╔╝██║██╔══██║██║░░╚██╗██║██║░░██╗██║░░╚██╗██╔══██║██║╚██╔╝██║██╔══╝░░░╚═══██╗
    ██║░╚═╝░██║██║░░██║╚██████╔╝██║╚█████╔╝╚██████╔╝██║░░██║██║░╚═╝░██║███████╗██████╔╝
    ╚═╝░░░░░╚═╝╚═╝░░╚═╝░╚═════╝░╚═╝░╚════╝░░╚═════╝░╚═╝░░╚═╝╚═╝░░░░░╚═╝╚══════╝╚═════╝░ */
    public function vipbuy(Player $sender): Form
    {
        $form = new SimpleForm(function (Player $sender, int $data = null) {
            if ($data === null) {
                return true;
            }
            switch ($data) {
                case 0:
                    $coins = EconomyAPI::getInstance()->myMoney($sender);
                    $name = $sender->getName();
                    $rank = MagicCore::getInstance()->getConfig()->get("vip.name");
                    $cost = MagicCore::getInstance()->getConfig()->get("vip.cost");
                    if ($coins >= $cost) {
                        EconomyAPI::getInstance()->reduceMoney($sender, $cost);
                        Server::getInstance()->dispatchCommand(new ConsoleCommandSender(Server::getInstance(), Server::getInstance()->getLanguage()), str_replace("{player}", $sender->getName(), MagicCore::getInstance()->getConfig()->get("vip.cmd")));
                        $sender->sendMessage(MagicCore::getInstance()->getConfig()->get("vip.complete"));
                        Server::getInstance()->broadcastMessage("§f[§eMagic§6Games§f] §a$name Has Buyed VIP Rank");
                        return true;
                    } else {
                        $sender->sendMessage(MagicCore::getInstance()->getConfig()->get("vip.error"));
                    }
                    break;
                case 1:
                    $sender->sendMessage("§f[§eMagic§6Games§f]§a You Cancelled Buying The Rank");
                    break;
            }
        });
        $form->setTitle(MagicCore::getInstance()->getConfig()->get("vip.title"));
        $form->setContent(str_replace("{cost}", MagicCore::getInstance()->getConfig()->get("vip.cost"), MagicCore::getInstance()->getConfig()->get("vip.buy")));
        $form->addButton("§3» Yes «", 1, "https://cdn-icons-png.flaticon.com/128/3572/3572255.png");
        $form->addButton("§4» Cancel «", 1, "https://cdn-icons-png.flaticon.com/128/3572/3572260.png");
        $sender->sendForm($form);
        return $form;
    }
    public function vipplusbuy(Player $sender): Form
    {
        $form = new SimpleForm(function (Player $sender, int $data = null) {
            if ($data === null) {
                return true;
            }
            switch ($data) {
                case 0:
                    $coins = EconomyAPI::getInstance()->myMoney($sender);
                    $name = $sender->getName();
                    $rank = MagicCore::getInstance()->getConfig()->get("vip+.name");
                    $cost = MagicCore::getInstance()->getConfig()->get("vip+.cost");
                    if ($coins >= $cost) {
                        EconomyAPI::getInstance()->reduceMoney($sender, $cost);
                        Server::getInstance()->dispatchCommand(new ConsoleCommandSender(Server::getInstance(), Server::getInstance()->getLanguage()), str_replace("{player}", $sender->getName(), MagicCore::getInstance()->getConfig()->get("vip+.cmd")));

                        $sender->sendMessage(MagicCore::getInstance()->getConfig()->get("vip+.complete"));
                        Server::getInstance()->broadcastMessage("§f[§eMagic§6Games§f] §a$name Has Buyed §aVIP§c+ §aRank");
                        return true;
                    } else {
                        $sender->sendMessage(MagicCore::getInstance()->getConfig()->get("vip+.error"));
                    }
                    break;
                case 1:
                    $sender->sendMessage("§f[§eMagic§6Games§f]§a You Cancelled Buying The Rank");
                    break;
            }
        });
        $form->setTitle(MagicCore::getInstance()->getConfig()->get("vip+.title"));
        $form->setContent(str_replace("{cost}", MagicCore::getInstance()->getConfig()->get("vip+.cost"), MagicCore::getInstance()->getConfig()->get("vip+.buy")));
        $form->addButton("§3» Yes «", 1, "https://cdn-icons-png.flaticon.com/128/3572/3572255.png");
        $form->addButton("§4» Cancel «", 1, "https://cdn-icons-png.flaticon.com/128/3572/3572260.png");
        $sender->sendForm($form);
        return $form;
    }
    public function mvpbuy(Player $sender): Form
    {
        $form = new SimpleForm(function (Player $sender, int $data = null) {
            if ($data === null) {
                return true;
            }
            switch ($data) {
                case 0:
                    $coins = EconomyAPI::getInstance()->myMoney($sender);
                    $name = $sender->getName();
                    $rank = MagicCore::getInstance()->getConfig()->get("mvp.name");
                    $cost = MagicCore::getInstance()->getConfig()->get("mvp.cost");
                    if ($coins >= $cost) {
                        EconomyAPI::getInstance()->reduceMoney($sender, $cost);
                        Server::getInstance()->dispatchCommand(new ConsoleCommandSender(Server::getInstance(), Server::getInstance()->getLanguage()), str_replace("{player}", $sender->getName(), MagicCore::getInstance()->getConfig()->get("mvp.cmd")));

                        $sender->sendMessage(MagicCore::getInstance()->getConfig()->get("mvp.complete"));
                        Server::getInstance()->broadcastMessage("§f[§eMagic§6Games§f] §a$name Has Buyed §bMVP §aRank");
                        return true;
                    } else {
                        $sender->sendMessage(MagicCore::getInstance()->getConfig()->get("mvp.error"));
                    }
                    break;
                case 1:
                    $sender->sendMessage("§f[§eMagic§6Games§f]§a You Cancelled Buying The Rank");
                    break;
            }
        });
        $form->setTitle(MagicCore::getInstance()->getConfig()->get("mvp.title"));
        $form->setContent(str_replace("{cost}", MagicCore::getInstance()->getConfig()->get("mvp.cost"), MagicCore::getInstance()->getConfig()->get("mvp.buy")));
        $form->addButton("§3» Yes «", 1, "https://cdn-icons-png.flaticon.com/128/3572/3572255.png");
        $form->addButton("§4» Cancel «", 1, "https://cdn-icons-png.flaticon.com/128/3572/3572260.png");
        $sender->sendForm($form);
        return $form;
    }
    public function mvpplusbuy(Player $sender): Form
    {
        $form = new SimpleForm(function (Player $sender, int $data = null) {
            if ($data === null) {
                return true;
            }
            switch ($data) {
                case 0:
                    $coins = EconomyAPI::getInstance()->myMoney($sender);
                    $name = $sender->getName();
                    $rank = MagicCore::getInstance()->getConfig()->get("mvp+.name");
                    $cost = MagicCore::getInstance()->getConfig()->get("mvp+.cost");
                    if ($coins >= $cost) {
                        EconomyAPI::getInstance()->reduceMoney($sender, $cost);
                        Server::getInstance()->dispatchCommand(new ConsoleCommandSender(Server::getInstance(), Server::getInstance()->getLanguage()), str_replace("{player}", $sender->getName(), MagicCore::getInstance()->getConfig()->get("mvp+.cmd")));

                        $sender->sendMessage(MagicCore::getInstance()->getConfig()->get("mvp+.complete"));
                        Server::getInstance()->broadcastMessage("§f[§eMagic§6Games§f] §a$name Has Buyed §bMVP§c+§a Rank");
                        return true;
                    } else {

                        $sender->sendMessage(MagicCore::getInstance()->getConfig()->get("mvp+.error"));
                    }
                    break;
                case 1:
                    $sender->sendMessage("§f[§eMagic§6Games§f]§a You Cancelled Buying The Rank");
                    break;
            }
        });
        $form->setTitle(MagicCore::getInstance()->getConfig()->get("mvp+.title"));
        $form->setContent(str_replace("{cost}", MagicCore::getInstance()->getConfig()->get("mvp+.cost"), MagicCore::getInstance()->getConfig()->get("mvp+.buy")));
        $form->addButton("§3» Yes «", 1, "https://cdn-icons-png.flaticon.com/128/3572/3572255.png");
        $form->addButton("§4» Cancel «", 1, "https://cdn-icons-png.flaticon.com/128/3572/3572260.png");
        $sender->sendForm($form);
        return $form;
    }

    public function mvpplusplusbuy(Player $sender): Form
    {
        $form = new SimpleForm(function (Player $sender, int $data = null) {
            if ($data === null) {
                return true;
            }
            switch ($data) {
                case 0:
                    $coins = EconomyAPI::getInstance()->myMoney($sender);
                    $name = $sender->getName();
                    $rank = MagicCore::getInstance()->getConfig()->get("mvp++.name");
                    $cost = MagicCore::getInstance()->getConfig()->get("mvp++.cost");
                    if ($coins >= $cost) {
                        EconomyAPI::getInstance()->reduceMoney($sender, $cost);
                        Server::getInstance()->dispatchCommand(new ConsoleCommandSender(Server::getInstance(), Server::getInstance()->getLanguage()), str_replace("{player}", $sender->getName(), MagicCore::getInstance()->getConfig()->get("mvp++.cmd")));

                        $sender->sendMessage(MagicCore::getInstance()->getConfig()->get("mvp++.complete"));
                        Server::getInstance()->broadcastMessage("§f[§eMagic§6Games§f] §a$name Has Buyed §bMVP§e+§c+ §aRank");
                        return true;
                    } else {

                        $sender->sendMessage(MagicCore::getInstance()->getConfig()->get("mvp++.error"));
                    }
                    break;
                case 1:
                    $sender->sendMessage("§f[§eMagic§6Games§f]§a You Cancelled Buying The Rank");
                    break;
            }
        });
        $form->setTitle(MagicCore::getInstance()->getConfig()->get("mvp++.title"));
        $form->setContent(str_replace("{cost}", MagicCore::getInstance()->getConfig()->get("mvp++.cost"), MagicCore::getInstance()->getConfig()->get("mvp++.buy")));
        $form->addButton("§3» Yes «", 1, "https://cdn-icons-png.flaticon.com/128/3572/3572255.png");
        $form->addButton("§4» Cancel «", 1, "https://cdn-icons-png.flaticon.com/128/3572/3572260.png");
        $sender->sendForm($form);
        return $form;
    }

    public function lord(Player $sender): void
    {
        $form = new SimpleForm(function (Player $sender, int $data = null) {
            if ($data === null) {
                return true;
            }
            switch ($data) {
                case 0:
                    $sender->sendForm(new RankshopForm());
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
                    $sender->sendForm(new RankshopForm());
                    break;
            }
        });
        $form->setTitle("§dlord+");
        $form->setContent("§dLord+ §aRank Features §eMagic§6Games\n§a» §e/pets\n§a» §e/heal\n§a» §e/feed\n§a» §e/craft\n§a» §e/cape\n§a» §e/emoji\n§a» §e/size\n§a» §e/speed\n§a» §e/vision\n§a» §e/repair\n§a» §e/skin\n§a» §e/fly\n§a» §e/vanish\n§a» §e/god\n§a» §e/lay\n§a» §e/sit\n\n§cBonus\n§a» PlayerVaults 1-14\n§a» Access To MEMBER KIT\n§a» Access To VIP KIT\n§a» Access To VIP+ KIT\n§a» Access To MVP KIT\n§a» Access To MVP+ KIT\n§a» Access To §bMVP§e+§c+§a KIT\n§a» Access To LORD Kit\n§a» Access To LORD+ Kit\n\n§l§ePRICE: §e$15\n§r§aWant To Buy Rank?\n§aVisit https://magicgames.tebex.io");
        $form->addButton("§cBack", 0, "textures/blocks/barrier");
        $sender->sendForm($form);
    }
}
