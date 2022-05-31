<?php

namespace Pushkar\MagicCore\forms;

use Pushkar\MagicCore\MagicCore;
use dktapps\pmforms\FormIcon;
use dktapps\pmforms\MenuForm;
use pocketmine\player\Player;
use Pushkar\MagicCore\forms\RankshopForm;
use dktapps\pmforms\MenuOption;
use jojoe77777\FormAPI\SimpleForm;
use jojoe77777\FormAPI\CustomForm;
use onebone\economyapi\EconomyAPI;
use pocketmine\Server;

class InformationForm extends MenuForm
{
    private array $players = [];

    public function __construct()
    {
        parent::__construct(MagicCore::getInstance()->getConfig()->get("TITLE-MENU"), MagicCore::getInstance()->getConfig()->get("CONTENT-MENU"), [
            new MenuOption(MagicCore::getInstance()->getConfig()->get("INFO-BTN-ONE"), new FormIcon("https://i.imgur.com/xbYrpSW.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption(MagicCore::getInstance()->getConfig()->get("INFO-BTN-TWO"), new FormIcon("https://i.imgur.com/UQvACCH.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption(MagicCore::getInstance()->getConfig()->get("INFO-BTN-THREE"), new FormIcon("https://i.imgur.com/RDDn4S8.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption(MagicCore::getInstance()->getConfig()->get("INFO-BTN-FOR"), new FormIcon("https://i.imgur.com/nVQ64qx.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption(MagicCore::getInstance()->getConfig()->get("INFO-BTN-FIVE"), new FormIcon("https://i.imgur.com/2VRM6BT.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption(MagicCore::getInstance()->getConfig()->get("INFO-BTN-SIX"), new FormIcon("https://i.imgur.com/9u10Avf.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption(MagicCore::getInstance()->getConfig()->get("INFO-BTN-SEVEN"), new FormIcon("https://i.imgur.com/gICdeHW.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption(MagicCore::getInstance()->getConfig()->get("INFO-BTN-EIGHT"), new FormIcon("https://i.imgur.com/2jjvcKo.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption(MagicCore::getInstance()->getConfig()->get("INFO-BTN-NINE"), new FormIcon("https://i.imgur.com/XNl95R5.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption(MagicCore::getInstance()->getConfig()->get("INFO-BTN-TEN"), new FormIcon("https://i.imgur.com/erHwlje.png", FormIcon::IMAGE_TYPE_URL))
        ], function (Player $sender, int $selected): void {
            switch ($selected) {
                case 0;
                    $this->INFOONE($sender);
                    break;
                case 1;
                    $this->INFOTWO($sender);
                    break;
                case 2;
                    $this->INFOTHREE($sender);
                    break;
                case 3;
                    $this->INFOFOR($sender);
                    break;
                case 4;
                    $this->INFOFIVE($sender);
                    break;
                case 5;
                    $this->INFOSIX($sender);
                    break;
                case 6;
                    $sender->sendForm(new RankshopForm());
                    break;
                case 7;
                    $this->INFOEIGHT($sender);
                    break;
                case 8;
                    $this->INFONINE($sender);
                    break;
                case 9;
                    $this->INFOTEN($sender);
                    break;
            }
        });
    }

    public function MagicCoreMenu(Player $sender): void
    {
        $form = new SimpleForm(function (Player $sender, $data) {
            if ($data == null) {
            }
            switch ($data) {
                case 0;
                    break;
                case 1;
                    $this->INFOONE($sender);
                    break;
                case 2;
                    $this->INFOTWO($sender);
                    break;
                case 3;
                    $this->INFOTHREE($sender);
                    break;
                case 4;
                    $this->INFOFOR($sender);
                    break;
                case 5;
                    $this->INFOFIVE($sender);
                    break;
                case 6;
                    $this->INFOSIX($sender);
                    break;
                case 7;
                    $this->INFOSEVEN($sender);
                    break;
                case 8;
                    $this->INFOEIGHT($sender);
                    break;
                case 9;
                    $this->INFONINE($sender);
                    break;
                case 10;
                    $this->INFOTEN($sender);
                    break;
                case 11;
                    $this->comingsoon($sender);
                    break;
            }
        });
        $form->setTitle(MagicCore::getInstance()->getConfig()->get("TITLE-MENU"));
        $form->setContent(MagicCore::getInstance()->getConfig()->get("CONTENT-MENU"));
        $form->addButton(MagicCore::getInstance()->getConfig()->get("EXIT-BTN"), 0, "textures/ui/cancel");
        $form->addButton(MagicCore::getInstance()->getConfig()->get("INFO-BTN-ONE"), 0, "textures/ui/copy");
        $form->addButton(MagicCore::getInstance()->getConfig()->get("INFO-BTN-TWO"), 0, "textures/ui/copy");
        $form->addButton(MagicCore::getInstance()->getConfig()->get("INFO-BTN-THREE"), 0, "textures/ui/copy");
        $form->addButton(MagicCore::getInstance()->getConfig()->get("INFO-BTN-FOR"), 0, "textures/ui/copy");
        $form->addButton(MagicCore::getInstance()->getConfig()->get("INFO-BTN-FIVE"), 0, "textures/ui/copy");
        $form->addButton(MagicCore::getInstance()->getConfig()->get("INFO-BTN-SIX"), 0, "textures/ui/copy");
        $form->addButton(MagicCore::getInstance()->getConfig()->get("INFO-BTN-SEVEN"), 0, "textures/ui/copy");
        $form->addButton(MagicCore::getInstance()->getConfig()->get("INFO-BTN-EIGHT"), 0, "textures/ui/copy");
        $form->addButton(MagicCore::getInstance()->getConfig()->get("INFO-BTN-NINE"), 0, "textures/ui/copy");
        $form->addButton(MagicCore::getInstance()->getConfig()->get("INFO-BTN-TEN"), 0, "textures/ui/copy");
        $form->addButton("§0§lCOMING SOON\n§r§cMORE FEATURES CMNG SOON!", 0, "textures/blocks/barrier");
        $sender->sendForm($form);
    }

    public function INFOONE(Player $sender): void
    {
        $form = new SimpleForm(function (Player $sender, $data) {
            if ($data == null) {
            }
            switch ($data) {
                case 0:
                    break;
                case 1;
                    $sender->sendForm(new InformationForm());
                    break;
            }
        });
        $form->setTitle(MagicCore::getInstance()->getConfig()->get("TITLE-ABOUT"));
        $form->setContent(MagicCore::getInstance()->getConfig()->get("CONTENT-ABOUT"));
        $form->addButton(MagicCore::getInstance()->getConfig()->get("EXIT-BTN"), 0, "textures/ui/cancel");
        $form->addButton(MagicCore::getInstance()->getConfig()->get("BACK-BTN"), 0, "textures/ui/icon_import");
        $sender->sendForm($form);
    }

    public function INFOTWO(Player $sender): void
    {
        $form = new SimpleForm(function (Player $sender, $data) {
            if ($data == null) {
            }
            switch ($data) {
                case 0;
                    break;
                case 1;
                    $sender->sendForm(new InformationForm());
                    break;
            }
        });
        $form->setTitle(MagicCore::getInstance()->getConfig()->get("TITLE-CHANGELOG"));
        $form->setContent(MagicCore::getInstance()->getConfig()->get("CONTENT-CHANGELOG"));
        $form->addButton(MagicCore::getInstance()->getConfig()->get("EXIT-BTN"), 0, "textures/ui/cancel");
        $form->addButton(MagicCore::getInstance()->getConfig()->get("BACK-BTN"), 0, "textures/ui/icon_import");
        $sender->sendForm($form);
    }

    public function INFOTHREE(Player $sender): void
    {
        $form = new SimpleForm(function (Player $sender, $data) {
            if ($data == null) {
            }
            switch ($data) {
                case 0;
                    break;
                case 1;
                    $sender->sendForm(new InformationForm());
                    break;
            }
        });
        $form->setTitle(MagicCore::getInstance()->getConfig()->get("TITLE-FEATURES"));
        $form->setContent(MagicCore::getInstance()->getConfig()->get("CONTENT-FEATURES"));
        $form->addButton(MagicCore::getInstance()->getConfig()->get("EXIT-BTN"), 0, "textures/ui/cancel");
        $form->addButton(MagicCore::getInstance()->getConfig()->get("BACK-BTN"), 0, "textures/ui/icon_import");
        $sender->sendForm($form);
    }

    public function INFOFOR(Player $sender): void
    {
        $form = new SimpleForm(function (Player $sender, $data) {
            if ($data == null) {
            }
            switch ($data) {
                case 0;
                    break;
                case 1;
                    $sender->sendForm(new InformationForm());
                    break;
            }
        });
        $form->setTitle(MagicCore::getInstance()->getConfig()->get("TITLE-RULES"));
        $form->setContent(MagicCore::getInstance()->getConfig()->get("CONTENT-RULES"));
        $form->addButton(MagicCore::getInstance()->getConfig()->get("EXIT-BTN"), 0, "textures/ui/cancel");
        $form->addButton(MagicCore::getInstance()->getConfig()->get("BACK-BTN"), 0, "textures/ui/icon_import");
        $sender->sendForm($form);
    }

    public function INFOFIVE(Player $sender): void
    {
        $form = new SimpleForm(function (Player $sender, $data) {
            if ($data == null) {
            }
            switch ($data) {
                case 0;
                    break;
                case 1;
                    $sender->sendForm(new InformationForm());
                    break;
            }
        });
        $form->setTitle(MagicCore::getInstance()->getConfig()->get("TITLE-STAFFLIST"));
        $form->setContent(MagicCore::getInstance()->getConfig()->get("CONTENT-STAFFLIST"));
        $form->addButton(MagicCore::getInstance()->getConfig()->get("EXIT-BTN"), 0, "textures/ui/cancel");
        $form->addButton(MagicCore::getInstance()->getConfig()->get("BACK-BTN"), 0, "textures/ui/icon_import");
        $sender->sendForm($form);
    }

    public function INFOSIX(Player $sender): void
    {
        $form = new SimpleForm(function (Player $sender, $data) {
            if ($data == null) {
            }
            switch ($data) {
                case 0;
                    break;
                case 1;
                    $sender->sendForm(new InformationForm());
                    break;
                case 2;
                    $this->TutorialONE($sender);
                    break;
                case 3;
                    $this->TutorialTWO($sender);
                    break;
                case 4;
                    $this->TutorialTHREE($sender);
                    break;
                case 5;
                    $this->TutorialFOR($sender);
                    break;
                case 6;
                    $this->TutorialFIVE($sender);
                    break;
            }
        });
        $form->setTitle(MagicCore::getInstance()->getConfig()->get("TUTORIAL-TITLE-MENU"));
        $form->setContent(MagicCore::getInstance()->getConfig()->get("TUTORIAL-CONTENT-MENU"));
        $form->addButton(MagicCore::getInstance()->getConfig()->get("EXIT-BTN"), 0, "textures/ui/cancel");
        $form->addButton(MagicCore::getInstance()->getConfig()->get("BACK-BTN"), 0, "textures/ui/icon_import");
        $form->addButton(MagicCore::getInstance()->getConfig()->get("TUTORIAL-ONE-BTN"), 0, "textures/ui/icon_crafting");
        $form->addButton(MagicCore::getInstance()->getConfig()->get("TUTORIAL-TWO-BTN"), 0, "textures/ui/icon_crafting");
        $form->addButton(MagicCore::getInstance()->getConfig()->get("TUTORIAL-THREE-BTN"), 0, "textures/ui/icon_crafting");
        $form->addButton(MagicCore::getInstance()->getConfig()->get("TUTORIAL-FOR-BTN"), 0, "textures/ui/icon_crafting");
        $form->addButton(MagicCore::getInstance()->getConfig()->get("TUTORIAL-FIVE-BTN"), 0, "textures/ui/icon_crafting");
        $sender->sendForm($form);
    }

    public function TutorialONE(Player $sender): void
    {
        $form = new SimpleForm(function (Player $sender, $data) {
            if ($data == null) {
            }
            switch ($data) {
                case 0;
                    break;
                case 1;
                    $this->INFOSIX($sender);
                    break;
            }
        });
        $form->setTitle(MagicCore::getInstance()->getConfig()->get("TUTORIAL-ONE-TITLE"));
        $form->setContent(MagicCore::getInstance()->getConfig()->get("TUTORIAL-ONE-CONTENT"));
        $form->addButton(MagicCore::getInstance()->getConfig()->get("EXIT-BTN"), 0, "textures/ui/cancel");
        $form->addButton(MagicCore::getInstance()->getConfig()->get("BACK-BTN"), 0, "textures/ui/icon_import");
        $sender->sendForm($form);
    }

    public function TutorialTWO(Player $sender): void
    {
        $form = new SimpleForm(function (Player $sender, $data) {
            if ($data == null) {
            }
            switch ($data) {
                case 0;
                    break;
                case 1;
                    $this->INFOSIX($sender);
                    break;
            }
        });
        $form->setTitle(MagicCore::getInstance()->getConfig()->get("TUTORIAL-TWO-TITLE"));
        $form->setContent(MagicCore::getInstance()->getConfig()->get("TUTORIAL-TWO-CONTENT"));
        $form->addButton(MagicCore::getInstance()->getConfig()->get("EXIT-BTN"), 0, "textures/ui/cancel");
        $form->addButton(MagicCore::getInstance()->getConfig()->get("BACK-BTN"), 0, "textures/ui/icon_import");
        $sender->sendForm($form);
    }

    public function TutorialTHREE(Player $sender): void
    {
        $form = new SimpleForm(function (Player $sender, $data) {
            if ($data == null) {
            }
            switch ($data) {
                case 0;
                    break;
                case 1;
                    $this->INFOSIX($sender);
                    break;
            }
        });
        $form->setTitle(MagicCore::getInstance()->getConfig()->get("TUTORIAL-THREE-TITLE"));
        $form->setContent(MagicCore::getInstance()->getConfig()->get("TUTORIAL-THREE-CONTENT"));
        $form->addButton(MagicCore::getInstance()->getConfig()->get("EXIT-BTN"), 0, "textures/ui/cancel");
        $form->addButton(MagicCore::getInstance()->getConfig()->get("BACK-BTN"), 0, "textures/ui/icon_import");
        $sender->sendForm($form);
    }

    public function TutorialFOR(Player $sender): void
    {
        $form = new SimpleForm(function (Player $sender, $data) {
            if ($data == null) {
            }
            switch ($data) {
                case 0;
                    break;
                case 1;
                    $this->INFOSIX($sender);
                    break;
            }
        });
        $form->setTitle(MagicCore::getInstance()->getConfig()->get("TUTORIAL-FOR-TITLE"));
        $form->setContent(MagicCore::getInstance()->getConfig()->get("TUTORIAL-FOR-CONTENT"));
        $form->addButton(MagicCore::getInstance()->getConfig()->get("EXIT-BTN"), 0, "textures/ui/cancel");
        $form->addButton(MagicCore::getInstance()->getConfig()->get("BACK-BTN"), 0, "textures/ui/icon_import");
        $sender->sendForm($form);
    }

    public function TutorialFIVE(Player $sender): void
    {
        $form = new SimpleForm(function (Player $sender, $data) {
            if ($data == null) {
            }
            switch ($data) {
                case 0;
                    break;
                case 1;
                    $this->INFOSIX($sender);
                    break;
            }
        });
        $form->setTitle(MagicCore::getInstance()->getConfig()->get("TUTORIAL-FIVE-TITLE"));
        $form->setContent(MagicCore::getInstance()->getConfig()->get("TUTORIAL-FIVE-CONTENT"));
        $form->addButton(MagicCore::getInstance()->getConfig()->get("EXIT-BTN"), 0, "textures/ui/cancel");
        $form->addButton(MagicCore::getInstance()->getConfig()->get("BACK-BTN"), 0, "textures/ui/icon_import");
        $sender->sendForm($form);
    }

    public function INFOSEVEN(Player $sender): void
    {
        $form = new SimpleForm(function (Player $sender, $data) {
            if ($data == null) {
            }
            switch ($data) {
                case 0;
                    break;
                case 1;
                    $sender->sendForm(new InformationForm());
                    break;
                case 2;
                    $this->RLONE($sender);
                    break;
                case 3;
                    $this->RLTWO($sender);
                    break;
                case 4;
                    $this->RLTHREE($sender);
                    break;
                case 5;
                    $this->RLFOR($sender);
                    break;
                case 6;
                    $this->RLFIVE($sender);
                    break;
                case 7;
                    $this->RLSIX($sender);
                    break;
            }
        });
        $form->setTitle(MagicCore::getInstance()->getConfig()->get("RL-TITLE-MENU"));
        $form->setContent(MagicCore::getInstance()->getConfig()->get("RL-CONTENT-MENU"));
        $form->addButton(MagicCore::getInstance()->getConfig()->get("EXIT-BTN"), 0, "textures/ui/cancel");
        $form->addButton(MagicCore::getInstance()->getConfig()->get("BACK-BTN"), 0, "textures/ui/icon_import");
        $form->addButton(MagicCore::getInstance()->getConfig()->get("RL-BTN-ONE"), 0, "textures/ui/icon_deals");
        $form->addButton(MagicCore::getInstance()->getConfig()->get("RL-BTN-TWO"), 0, "textures/ui/icon_deals");
        $form->addButton(MagicCore::getInstance()->getConfig()->get("RL-BTN-THREE"), 0, "textures/ui/icon_deals");
        $form->addButton(MagicCore::getInstance()->getConfig()->get("RL-BTN-FOR"), 0, "textures/ui/icon_deals");
        $form->addButton(MagicCore::getInstance()->getConfig()->get("RL-BTN-FIVE"), 0, "textures/ui/icon_deals");
        $form->addButton(MagicCore::getInstance()->getConfig()->get("RL-BTN-SIX"), 0, "textures/ui/icon_deals");
        $sender->sendForm($form);
    }

    public function RLONE(Player $sender): void
    {
        $form = new SimpleForm(function (Player $sender, $data) {
            if ($data == null) {
            }
            switch ($data) {
                case 0;
                    break;
                case 1;
                    $this->INFOSEVEN($sender);
                    break;
            }
        });
        $form->setTitle(MagicCore::getInstance()->getConfig()->get("RL-ONE-TITLE"));
        $form->setContent(MagicCore::getInstance()->getConfig()->get("RL-ONE-CONTENT"));
        $form->addButton(MagicCore::getInstance()->getConfig()->get("EXIT-BTN"), 0, "textures/ui/cancel");
        $form->addButton(MagicCore::getInstance()->getConfig()->get("BACK-BTN"), 0, "textures/ui/icon_import");
        $sender->sendForm($form);
    }

    public function RLTWO(Player $sender): void
    {
        $form = new SimpleForm(function (Player $sender, $data) {
            if ($data == null) {
            }
            switch ($data) {
                case 0;
                    break;
                case 1;
                    $this->INFOSEVEN($sender);
                    break;
            }
        });
        $form->setTitle(MagicCore::getInstance()->getConfig()->get("RL-TWO-TITLE"));
        $form->setContent(MagicCore::getInstance()->getConfig()->get("RL-TWO-CONTENT"));
        $form->addButton(MagicCore::getInstance()->getConfig()->get("EXIT-BTN"), 0, "textures/ui/cancel");
        $form->addButton(MagicCore::getInstance()->getConfig()->get("BACK-BTN"), 0, "textures/ui/icon_import");
        $sender->sendForm($form);
    }

    public function RLTHREE(Player $sender): void
    {
        $form = new SimpleForm(function (Player $sender, $data) {
            if ($data == null) {
            }
            switch ($data) {
                case 0;
                    break;
                case 1;
                    $this->INFOSEVEN($sender);
                    break;
            }
        });
        $form->setTitle(MagicCore::getInstance()->getConfig()->get("RL-THREE-TITLE"));
        $form->setContent(MagicCore::getInstance()->getConfig()->get("RL-THREE-CONTENT"));
        $form->addButton(MagicCore::getInstance()->getConfig()->get("EXIT-BTN"), 0, "textures/ui/cancel");
        $form->addButton(MagicCore::getInstance()->getConfig()->get("BACK-BTN"), 0, "textures/ui/icon_import");
        $sender->sendForm($form);
    }

    public function RLFOR(Player $sender): void
    {
        $form = new SimpleForm(function (Player $sender, $data) {
            if ($data == null) {
            }
            switch ($data) {
                case 0;
                    break;
                case 1;
                    $this->INFOSEVEN($sender);
                    break;
            }
        });
        $form->setTitle(MagicCore::getInstance()->getConfig()->get("RL-FOR-TITLE"));
        $form->setContent(MagicCore::getInstance()->getConfig()->get("RL-FOR-CONTENT"));
        $form->addButton(MagicCore::getInstance()->getConfig()->get("EXIT-BTN"), 0, "textures/ui/cancel");
        $form->addButton(MagicCore::getInstance()->getConfig()->get("BACK-BTN"), 0, "textures/ui/icon_import");
        $sender->sendForm($form);
    }

    public function RLFIVE(Player $sender): void
    {
        $form = new SimpleForm(function (Player $sender, $data) {
            if ($data == null) {
            }
            switch ($data) {
                case 0;
                    break;
                case 1;
                    $this->INFOSEVEN($sender);
                    break;
            }
        });
        $form->setTitle(MagicCore::getInstance()->getConfig()->get("RL-FIVE-TITLE"));
        $form->setContent(MagicCore::getInstance()->getConfig()->get("RL-FIVE-CONTENT"));
        $form->addButton(MagicCore::getInstance()->getConfig()->get("EXIT-BTN"), 0, "textures/ui/cancel");
        $form->addButton(MagicCore::getInstance()->getConfig()->get("BACK-BTN"), 0, "textures/ui/icon_import");
        $sender->sendForm($form);
    }

    public function RLSIX(Player $sender): void
    {
        $form = new SimpleForm(function (Player $sender, $data) {
            if ($data == null) {
            }
            switch ($data) {
                case 0;
                    break;
                case 1;
                    $this->INFOSEVEN($sender);
                    break;
            }
        });
        $form->setTitle(MagicCore::getInstance()->getConfig()->get("RL-SIX-TITLE"));
        $form->setContent(MagicCore::getInstance()->getConfig()->get("RL-SIX-CONTENT"));
        $form->addButton(MagicCore::getInstance()->getConfig()->get("EXIT-BTN"), 0, "textures/ui/cancel");
        $form->addButton(MagicCore::getInstance()->getConfig()->get("BACK-BTN"), 0, "textures/ui/icon_import");
        $sender->sendForm($form);
    }

    public function INFOEIGHT(Player $sender): void
    {
        $form = new SimpleForm(function (Player $sender, $data) {
            if ($data == null) {
            }
            switch ($data) {
                case 0;
                    break;
                case 1;
                    $sender->sendForm(new InformationForm());
                    break;
                case 2;
                    $this->SMONE($sender);
                    break;
                case 3;
                    $this->SMTWO($sender);
                    break;
                case 4;
                    $this->SMTHREE($sender);
                    break;
                case 5;
                    $this->SMFOR($sender);
                    break;
                case 6;
                    $this->SMFIVE($sender);
                    break;
            }
        });
        $form->setTitle(MagicCore::getInstance()->getConfig()->get("SM-TITLE-MENU"));
        $form->setContent(MagicCore::getInstance()->getConfig()->get("SM-CONTENT-MENU"));
        $form->addButton(MagicCore::getInstance()->getConfig()->get("EXIT-BTN"), 0, "textures/ui/cancel");
        $form->addButton(MagicCore::getInstance()->getConfig()->get("BACK-BTN"), 0, "textures/ui/icon_import");
        $form->addButton(MagicCore::getInstance()->getConfig()->get("SM-BTN-ONE"), 0, "textures/ui/book_cover");
        $form->addButton(MagicCore::getInstance()->getConfig()->get("SM-BTN-TWO"), 0, "textures/ui/book_cover");
        $form->addButton(MagicCore::getInstance()->getConfig()->get("SM-BTN-THREE"), 0, "textures/ui/book_cover");
        $form->addButton(MagicCore::getInstance()->getConfig()->get("SM-BTN-FOR"), 0, "textures/ui/book_cover");
        $form->addButton(MagicCore::getInstance()->getConfig()->get("SM-BTN-FIVE"), 0, "textures/ui/book_cover");
        $sender->sendForm($form);
    }

    public function SMONE(Player $sender): void
    {
        $form = new SimpleForm(function (Player $sender, $data) {
            if ($data == null) {
            }
            switch ($data) {
                case 0;
                    break;
                case 1;
                    $this->INFOEIGHT($sender);
                    break;
            }
        });
        $form->setTitle(MagicCore::getInstance()->getConfig()->get("SM-ONE-TITLE"));
        $form->setContent(MagicCore::getInstance()->getConfig()->get("SM-ONE-CONTENT"));
        $form->addButton(MagicCore::getInstance()->getConfig()->get("EXIT-BTN"), 0, "textures/ui/cancel");
        $form->addButton(MagicCore::getInstance()->getConfig()->get("BACK-BTN"), 0, "textures/ui/icon_import");
        $sender->sendForm($form);
    }

    public function SMTWO(Player $sender): void
    {
        $form = new SimpleForm(function (Player $sender, $data) {
            if ($data == null) {
            }
            switch ($data) {
                case 0;
                    break;
                case 1;
                    $this->INFOEIGHT($sender);
                    break;
            }
        });
        $form->setTitle(MagicCore::getInstance()->getConfig()->get("SM-TWO-TITLE"));
        $form->setContent(MagicCore::getInstance()->getConfig()->get("SM-TWO-CONTENT"));
        $form->addButton(MagicCore::getInstance()->getConfig()->get("EXIT-BTN"), 0, "textures/ui/cancel");
        $form->addButton(MagicCore::getInstance()->getConfig()->get("BACK-BTN"), 0, "textures/ui/icon_import");
        $sender->sendForm($form);
    }

    public function SMTHREE(Player $sender): void
    {
        $form = new SimpleForm(function (Player $sender, $data) {
            if ($data == null) {
            }
            switch ($data) {
                case 0;
                    break;
                case 1;
                    $this->INFOEIGHT($sender);
                    break;
            }
        });
        $form->setTitle(MagicCore::getInstance()->getConfig()->get("SM-THREE-TITLE"));
        $form->setContent(MagicCore::getInstance()->getConfig()->get("SM-THREE-CONTENT"));
        $form->addButton(MagicCore::getInstance()->getConfig()->get("EXIT-BTN"), 0, "textures/ui/cancel");
        $form->addButton(MagicCore::getInstance()->getConfig()->get("BACK-BTN"), 0, "textures/ui/icon_import");
        $sender->sendForm($form);
    }

    public function SMFOR(Player $sender): void
    {
        $form = new SimpleForm(function (Player $sender, $data) {
            if ($data == null) {
            }
            switch ($data) {
                case 0;
                    break;
                case 1;
                    $this->INFOEIGHT($sender);
                    break;
            }
        });
        $form->setTitle(MagicCore::getInstance()->getConfig()->get("SM-FOR-TITLE"));
        $form->setContent(MagicCore::getInstance()->getConfig()->get("SM-FOR-CONTENT"));
        $form->addButton(MagicCore::getInstance()->getConfig()->get("EXIT-BTN"), 0, "textures/ui/cancel");
        $form->addButton(MagicCore::getInstance()->getConfig()->get("BACK-BTN"), 0, "textures/ui/icon_import");
        $sender->sendForm($form);
    }

    public function SMFIVE(Player $sender): void
    {
        $form = new SimpleForm(function (Player $sender, $data) {
            if ($data == null) {
            }
            switch ($data) {
                case 0;
                    break;
                case 1;
                    $this->INFOEIGHT($sender);
                    break;
            }
        });
        $form->setTitle(MagicCore::getInstance()->getConfig()->get("SM-FIVE-TITLE"));
        $form->setContent(MagicCore::getInstance()->getConfig()->get("SM-FIVE-CONTENT"));
        $form->addButton(MagicCore::getInstance()->getConfig()->get("EXIT-BTN"), 0, "textures/ui/cancel");
        $form->addButton(MagicCore::getInstance()->getConfig()->get("BACK-BTN"), 0, "textures/ui/icon_import");
        $sender->sendForm($form);
    }

    public function INFONINE(Player $sender): void
    {
        $form = new SimpleForm(function (Player $sender, $data) {
            if ($data == null) {
            }
            switch ($data) {
                case 0;
                    break;
                case 1;
                    $sender->sendForm(new InformationForm());
                    break;
            }
        });
        $form->setTitle(MagicCore::getInstance()->getConfig()->get("TITLE-ANNOUNCEMENT"));
        $form->setContent(MagicCore::getInstance()->getConfig()->get("CONTENT-ANNOUNCEMENT"));
        $form->addButton(MagicCore::getInstance()->getConfig()->get("EXIT-BTN"), 0, "textures/ui/cancel");
        $form->addButton(MagicCore::getInstance()->getConfig()->get("BACK-BTN"), 0, "textures/ui/icon_import");
        $sender->sendForm($form);
    }

    public function INFOTEN(Player $sender): void
    {
        $form = new SimpleForm(function (Player $sender, $data) {
            if ($data == null) {
            }
            switch ($data) {
                case 0;
                    break;
                case 1;
                    $sender->sendForm(new InformationForm());
                    break;
            }
        });
        $form->setTitle(MagicCore::getInstance()->getConfig()->get("TITLE-EVENT"));
        $form->setContent(MagicCore::getInstance()->getConfig()->get("CONTENT-EVENT"));
        $form->addButton(MagicCore::getInstance()->getConfig()->get("EXIT-BTN"), 0, "textures/ui/cancel");
        $form->addButton(MagicCore::getInstance()->getConfig()->get("BACK-BTN"), 0, "textures/ui/icon_import");
        $sender->sendForm($form);
    }

    public function comingsoon(Player $sender): void
    {
        $form = new SimpleForm(function (Player $sender, $data) {
            if ($data == null) {
            }
            switch ($data) {
                case 0;
                    $sender->sendMessage("\n§8§lCOMING SOON!\n§r§7Pushkar will add more features to this plugin just be patient because this plugin is still not §a100%§7 perfect\n");
                    $sender->sendTitle("§8§lCOMING SOON!", "§cMore features will be added!");
                    break;
            }
        });
        $form->setTitle("§8§lCOMING SOON");
        $form->setContent("§c§lWARNING!\n§r§7you are not allowed to eSM-BTN-ONEdit this message on the config also u cant edit this page!\n\n§b§lINFO:\n§r§7report any bug/error to ItzFabn the creator of this plugin also please apologize if this plugin still bugging/error...");
        $form->addButton("§8§lCOMING SOON\n§r§8Tap for more info");
        $sender->sendForm($form);
    }
    public function emojis(Player $sender): void
    {
        $form = new SimpleForm(function (Player $sender, $data) {
            if ($data == null) {
            }
            switch ($data) {
                case 0;
                    break;
            }
        });
        $form->setTitle("§l§bEMOJIS");
        $form->setContent("§dHello §e" . $sender->getName() . "\n§dWelcome To MagicGames Emojis\n§dAvailability: §aFree For All Right Now\n\n§b:sword: = \n\n§b:skull: = \n\n§b:earth: = \n\n§b:portal: = \n\n§b:dice: = \n\n§b:candy: = \n\n§b:crown: = \n\n§b:star: = \n\n§b:diamond: \n\n§b:bruh: = \n\n§b:hehe: = \n\n§b:ooo: = \n\n§b:cry: = \n\n§b:stare: = \n\n§b:happy: = \n\n§b:angry: = \n\n§b:hmm: = \n\n§b:sus: = ");
        $form->addButton("§l§cEXIT\n§l§9»» §r§oTap To Exit", 1, "https://cdn-icons-png.flaticon.com/128/929/929416.png");
        $sender->sendForm($form);
    }

    public function profile(Player $player): void
    {
        $form = new SimpleForm(function (Player $player, $data) {
            if ($data == null) {
            }
            switch ($data) {
                case 0:
                    Server::getInstance()->dispatchCommand($player, "skills");
                    break;
                case 1:
                    break;
            }
        });
        /** @var \_64FF00\PurePerms\PurePerms $purePerms */
        $purePerms = Server::getInstance()->getPluginManager()->getPlugin("PurePerms");

        $form->setTitle("§l§bPROFILE");
        $form->setContent("§dHello §e" . $player->getName() . "\n\n§dWelcome To MagicGames Profile, Here You Can See Your Profile And Stats\n\n§bName: §a" . $player->getName() . "\n§bRank: §a" . $purePerms->getUserDataMgr()->getData($player)["group"] . "\n§bMoney: §a" . EconomyAPI::getInstance()->myMoney($player) . "\n§bPing: §a" . $player->getNetworkSession()->getPing() . "\n§bPosition: §a" . (int) $player->getPosition()->getX() . " " . (int) $player->getPosition()->getY() . " " . (int) $player->getPosition()->getZ() . "\n§bWorld: §a" . $player->getWorld()->getFolderName() . "\n§bHealth: §a" . (int) $player->getHealth() . "§a/" . $player->getMaxHealth() . "");
        $form->addButton("§l§bYOUR SKILLS\n§l§9»» §r§oTap To Open", 1, "https://cdn-icons-png.flaticon.com/128/2091/2091418.png");
        $form->addButton("§l§cEXIT\n§l§9»» §r§oTap To Exit", 1, "https://cdn-icons-png.flaticon.com/128/2698/2698776.png");
        $player->sendForm($form);
    }

    public function skin(Player $players): void
    {
        $list = [];
        foreach (Server::getInstance()->getOnlinePlayers() as $player) {
            $list[] = $player->getName();
        }
        $this->players[$players->getName()] = $list;
        $form = new CustomForm(function (Player $players, array $data = null) {
            if ($data == null) {
                return;
            }

            $dataSelected = Server::getInstance()->getPlayerExact($this->players[$players->getName()][$data[1]]);
            if (!$dataSelected instanceof Player) {
                return;
            }

            $otherSkin = $dataSelected->getSkin();
            $players->sendMessage(" §7You Stole §e{$dataSelected->getName()} §7Skin!");
            $players->setSkin($otherSkin);
            $players->sendSkin();
            $players->despawnFromAll();
            $players->spawnToAll();

            unset($this->players[$players->getName()]);
        });
        $form->setTitle("§3§lSKIN STEALER");
        $form->addLabel("§bSelect Player Skin");
        $form->addDropdown("", $this->players[$players->getName()]);
        $players->sendForm($form);
    }
}
