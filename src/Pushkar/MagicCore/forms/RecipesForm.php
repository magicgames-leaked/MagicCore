<?php

namespace Pushkar\MagicCore\forms;

use pocketmine\Server;
use jojoe77777\FormAPI\Form;
use dktapps\pmforms\FormIcon;
use dktapps\pmforms\MenuForm;
use pocketmine\player\Player;
use dktapps\pmforms\MenuOption;
use jojoe77777\FormAPI\SimpleForm;

class RecipesForm extends MenuForm
{
    public function __construct()
    {
        parent::__construct("is_dynamic&side_text§6RECIPES BOOK", "§bUse Only Custom Crafting Table To Craft Things,\n\n§bDo /invcraft", [
            new MenuOption("grid_tile§eMINION RECIPES", new FormIcon("https://cdn-icons-png.flaticon.com/128/891/891978.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("grid_tile§eARMOR RECIPES", new FormIcon("https://cdn-icons-png.flaticon.com/128/361/361761.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("grid_tile§eSWORD RECIPES", new FormIcon("https://i.imgur.com/EEaIm1N.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("grid_tile§eAXE RECIPES", new FormIcon("https://i.imgur.com/PcovRG3.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("grid_tile§ePICKAXE RECIPES", new FormIcon("https://i.imgur.com/Ao5AHLx.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("grid_tile§eRUNES RECIPES", new FormIcon("https://i.imgur.com/PEqPR8j.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("grid_tile§eITEMS RECIPES", new FormIcon("https://cdn-icons-png.flaticon.com/128/487/487551.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("grid_tile§eENCHANTED ITEMS", new FormIcon("https://cdn-icons-png.flaticon.com/128/3556/3556661.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("grid_tile§eFOOD RECIPES", new FormIcon("https://cdn-icons-png.flaticon.com/128/2921/2921822.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("grid_tile§eHOE RECIPES", new FormIcon("https://cdn-icons-png.flaticon.com/128/521/521021.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("grid_tile§eTALISMAN", new FormIcon("https://cdn-icons-png.flaticon.com/128/1625/1625674.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("grid_tile§eORE GENERATOR", new FormIcon("https://cdn-icons-png.flaticon.com/128/4831/4831062.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("grid_tile§eCUSTOM CRAFTING TABLE", new FormIcon("textures/blocks/crafting_table_top", FormIcon::IMAGE_TYPE_PATH))
        ], function (Player $sender, int $selected): void {
            switch ($selected) {
                case 0:
                    $this->minions($sender);
                    break;

                case 1:
                    $this->armors($sender);
                    break;

                case 2:
                    $this->sword($sender);
                    break;

                case 3:
                    $this->axe($sender);
                    break;

                case 4:
                    $this->pickaxe($sender);
                    break;

                case 5:
                    $this->runes($sender);
                    break;

                case 6:
                    $this->items($sender);
                    break;

                case 7:
                    $this->eblocks($sender);
                    break;

                case 8:
                    $this->food($sender);
                    break;

                case 9:
                    $this->hoe($sender);
                    break;

                case 10:
                    $sender->sendTitle("§r§l§eCOMMING SOON");
                    break;

                case 11:
                    $this->ore($sender);
                    break;

                case 12:
                    Server::getInstance()->dispatchCommand($sender, "invcraft");
                    break;
            }
        });
    }

    public function tools(Player $sender): Form
    {
        $form = new SimpleForm(function (Player $sender, int $data = null) {
            if ($data === null) {
                return;
            }
            switch ($data) {
                case 0:
                    $this->sword($sender);
                    break;

                case 1:
                    $this->axe($sender);
                    break;

                case 2:
                    $this->pickaxe($sender);
                    break;

                case 3:
                    $this->items($sender);
                    break;

                case 4:
                    $this->hoe($sender);
                    break;

                case 5:
                    $this->wand($sender);
                    break;

                case 6:
                    $sender->sendForm(new RecipesForm());
                    break;
            }
        });
        $form->setTitle("§l§6CUSTOM ITEMS RECIPES");
        $form->setContent("§dSelect The Which Tool Recipe You Want:");
        $form->addButton("§l§bSWORDS\n§9»» §r§6Tap To View", 1, "https://cdn-icons-png.flaticon.com/128/2466/2466942.png");
        $form->addButton("§l§bAXE\n§9»» §r§6Tap To View", 1, "https://cdn-icons-png.flaticon.com/128/6769/6769130.png");
        $form->addButton("§l§bPICKAXE\n§9»» §r§6Tap To View", 1, "https://i.imgur.com/l4cLq8v.png");
        $form->addButton("§l§bITEMS\n§9»» §r§6Tap To View", 1, "https://i.imgur.com/c4BNzS7.png");
        $form->addButton("§l§bHOE\n§9»» §r§6Tap To View", 1, "https://cdn-icons-png.flaticon.com/128/521/521021.png");
        $form->addButton("§l§bWANDS\n§9»» §r§6Tap To View", 1, "https://cdn-icons-png.flaticon.com/128/3204/3204021.png");
        $form->addButton("§l§aBACK\n§9»» §r§bTap To Go Back", 0, "textures/ui/icon_import");
        $sender->sendForm($form);
        return $form;
    }

    public function helpme(Player $sender): Form
    {
        $form = new SimpleForm(function (Player $sender, int $data = null) {
            if ($data === null) {
                return;
            }
            switch ($data) {
                case 0:
                    $sender->sendForm(new RecipesForm());
                    break;
            }
        });
        $name = $sender->getName();
        $form->setTitle("§l§6RECIPES HELP");
        $form->setContent("§bHi,§e $name \n\n§l§a» §6VIDEO MODE:§r §eFirst Go To Settings > Video > UI Profile > Classic§r\n\n§l§a» §6COMMAND:§r §eDo /customtable To Open Custom Table§r\n\n§l§a» §6ERROR:§r §eIf You Are Unable To Open Recipe Join Discord And See Recipe Channel");
        $form->addButton("§l§aBACK\n§9»» §r§bTap To Go Back", 0, "textures/ui/icon_import");
        $sender->sendForm($form);
        return $form;
    }

    public function minions(Player $sender): Form
    {
        $form = new SimpleForm(function (Player $sender, int $data = null) {
            if ($data === null) {
                return;
            }
            switch ($data) {
                case 0:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view minion1");
                    break;

                case 1:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view minion2");
                    break;

                case 2:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view minion3");
                    break;

                case 3:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view minion4");
                    break;

                case 4:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view minion5");
                    break;

                case 5:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view minion6");
                    break;

                case 6:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view minion7");
                    break;

                case 7:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view minion8");
                    break;

                case 8:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view minion9");
                    break;

                case 9:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view minion10");
                    break;

                case 10:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view minion11");
                    break;

                case 11:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view minion12");
                    break;

                case 12:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view minion13");
                    break;

                case 13:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view minion14");
                    break;

                case 14:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view minion15");
                    break;

                case 15:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view minion16");
                    break;

                case 16:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view minion17");
                    break;

                case 17:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view minion18");
                    break;

                case 18:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view minion19");
                    break;

                case 19:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view minion20");
                    break;

                case 20:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view minion21");
                    break;

                case 21:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view minion22");
                    break;

                case 22:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view minion23");
                    break;

                case 23:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view minion24");
                    break;

                case 24:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view minion25");
                    break;

                case 25:
                    $sender->sendForm(new RecipesForm());
                    break;
            }
        });
        $form->setTitle("§l§6MINION RECIPES");
        $form->setContent("§dSelect The Which Minion Recipe You Want:");
        $form->addButton("§l§bCOBBLESTONE MINION\n§9»» §r§6Tap To View", 1, "https://cdn-icons-png.flaticon.com/128/891/891978.png");
        $form->addButton("§l§bCOAL MINION\n§9»» §r§6Tap To View", 1, "https://cdn-icons-png.flaticon.com/128/891/891978.png");
        $form->addButton("§l§bIRON MINION\n§9»» §r§6Tap To View", 1, "https://cdn-icons-png.flaticon.com/128/891/891978.png");
        $form->addButton("§l§bGOLD MINION\n§9»» §r§6Tap To View", 1, "https://cdn-icons-png.flaticon.com/128/891/891978.png");
        $form->addButton("§l§bLAPIS MINION\n§9»» §r§6Tap To View", 1, "https://cdn-icons-png.flaticon.com/128/891/891978.png");
        $form->addButton("§l§bREDSTONE MINION\n§9»» §r§6Tap To View", 1, "https://cdn-icons-png.flaticon.com/128/891/891978.png");
        $form->addButton("§l§bDIAMOND MINION\n§9»» §r§6Tap To View", 1, "https://cdn-icons-png.flaticon.com/128/891/891978.png");
        $form->addButton("§l§bEMERALD MINION\n§9»» §r§6Tap To View", 1, "https://cdn-icons-png.flaticon.com/128/891/891978.png");
        $form->addButton("§l§bNETHER QUARTZ MINION\n§9»» §r§6Tap To View", 1, "https://cdn-icons-png.flaticon.com/128/891/891978.png");
        $form->addButton("§l§bNETHERRACK MINION\n§9»» §r§6Tap To View", 1, "https://cdn-icons-png.flaticon.com/128/891/891978.png");
        $form->addButton("§l§bENDSTONE MINION\n§9»» §r§6Tap To View", 1, "https://cdn-icons-png.flaticon.com/128/891/891978.png");
        $form->addButton("§l§bWHEAT MINION\n§9»» §r§6Tap To View", 1, "https://cdn-icons-png.flaticon.com/128/891/891978.png");
        $form->addButton("§l§bCARROT MINION\n§9»» §r§6Tap To View", 1, "https://cdn-icons-png.flaticon.com/128/891/891978.png");
        $form->addButton("§l§bPOTATO MINION\n§9»» §r§6Tap To View", 1, "https://cdn-icons-png.flaticon.com/128/891/891978.png");
        $form->addButton("§l§bMELON MINION\n§9»» §r§6Tap To View", 1, "https://cdn-icons-png.flaticon.com/128/891/891978.png");
        $form->addButton("§l§bPUMPKIN MINION\n§9»» §r§6Tap To View", 1, "https://cdn-icons-png.flaticon.com/128/891/891978.png");
        $form->addButton("§l§bDIRT MINION\n§9»» §r§6Tap To View", 1, "https://cdn-icons-png.flaticon.com/128/891/891978.png");
        $form->addButton("§l§bSAND MINION\n§9»» §r§6Tap To View", 1, "https://cdn-icons-png.flaticon.com/128/891/891978.png");
        $form->addButton("§l§bOAK LOG MINION\n§9»» §r§6Tap To View", 1, "https://cdn-icons-png.flaticon.com/128/891/891978.png");
        $form->addButton("§l§bACACIA LOG MINION\n§9»» §r§6Tap To View", 1, "https://cdn-icons-png.flaticon.com/128/891/891978.png");
        $form->addButton("§l§bBIRCH LOG MINION\n§9»» §r§6Tap To View", 1, "https://cdn-icons-png.flaticon.com/128/891/891978.png");
        $form->addButton("§l§bSPRUCE LOG MINION\n§9»» §r§6Tap To View", 1, "https://cdn-icons-png.flaticon.com/128/891/891978.png");
        $form->addButton("§l§bJUNGLE LOG MINION\n§9»» §r§6Tap To View", 1, "https://cdn-icons-png.flaticon.com/128/891/891978.png");
        $form->addButton("§l§bDARK OAK MINION\n§9»» §r§6Tap To View", 1, "https://cdn-icons-png.flaticon.com/128/891/891978.png");
        $form->addButton("§l§bSNOW MINION\n§9»» §r§6Tap To View", 1, "https://cdn-icons-png.flaticon.com/128/891/891978.png");
        $form->addButton("§l§aBACK\n§9»» §r§bTap To Go Back", 0, "textures/ui/icon_import");
        $sender->sendForm($form);
        return $form;
    }

    public function armors(Player $sender): Form
    {
        $form = new SimpleForm(function (Player $sender, int $data = null) {
            if ($data === null) {
                return;
            }
            switch ($data) {
                case 0:
                    $this->armor1($sender);
                    break;

                case 1:
                    $this->armor2($sender);
                    break;

                case 2:
                    $this->armor3($sender);
                    break;

                case 3:
                    $this->armor4($sender);
                    break;

                case 4:
                    $this->armor5($sender);
                    break;

                case 5:
                    $this->armor6($sender);
                    break;

                case 6:
                    $this->armor7($sender);
                    break;

                case 7:
                    $this->armor8($sender);
                    break;

                case 8:
                    $this->armor9($sender);
                    break;

                case 9:
                    $this->armor10($sender);
                    break;

                case 10:
                    $this->armor11($sender);
                    break;

                case 11:
                    $this->armor12($sender);
                    break;

                case 12:
                    $this->armor13($sender);
                    break;

                case 13:
                    $this->armor14($sender);
                    break;

                case 14:
                    $this->armor15($sender);
                    break;

                case 15:
                    $this->armor16($sender);
                    break;

                case 16:
                    $this->armor17($sender);
                    break;

                case 17:
                    $this->armor18($sender);
                    break;

                case 18:
                    $this->armor19($sender);
                    break;

                case 19:
                    $this->armor20($sender);
                    break;

                case 20:
                    $sender->sendForm(new RecipesForm());
                    break;
            }
        });
        $form->setTitle("§l§6ARMOR RECIPES");
        $form->setContent("§dSelect The Which Armor Recipe You Want:");
        $form->addButton("§l§bGOD ARMOR\n§9»» §r§6Tap To Open", 1, "https://cdn-icons-png.flaticon.com/128/6010/6010434.png");
        $form->addButton("§l§bMINER ARMOR\n§9»» §r§6Tap To Open", 1, "https://cdn-icons-png.flaticon.com/128/6010/6010434.png");
        $form->addButton("§l§bFARMER ARMOR\n§9»» §r§6Tap To Open", 1, "https://cdn-icons-png.flaticon.com/128/6010/6010434.png");
        $form->addButton("§l§bLAPIS ARMOR\n§9»» §r§6Tap To Open", 1, "https://cdn-icons-png.flaticon.com/128/6010/6010434.png");
        $form->addButton("§l§bEND ARMOR\n§9»» §r§6Tap To Open", 1, "https://cdn-icons-png.flaticon.com/128/6010/6010434.png");
        $form->addButton("§l§bGOLEM ARMOR\n§9»» §r§6Tap To Open", 1, "https://cdn-icons-png.flaticon.com/128/6010/6010434.png");
        $form->addButton("§l§bPUMPKIN ARMOR\n§9»» §r§6Tap To Open", 1, "https://cdn-icons-png.flaticon.com/128/6010/6010434.png");
        $form->addButton("§l§bNETHER ARMOR\n§9»» §r§6Tap To Open", 1, "https://cdn-icons-png.flaticon.com/128/6010/6010434.png");
        $form->addButton("§l§bOAK ARMOR\n§9»» §r§6Tap To Open", 1, "https://cdn-icons-png.flaticon.com/128/6010/6010434.png");
        $form->addButton("§l§bICE ARMOR\n§9»» §r§6Tap To Open", 1, "https://cdn-icons-png.flaticon.com/128/6010/6010434.png");
        $form->addButton("§l§bASSASSIN ARMOR\n§9»» §r§6Tap To Open", 1, "https://cdn-icons-png.flaticon.com/128/6010/6010434.png");
        $form->addButton("§l§bTANK ARMOR\n§9»» §r§6Tap To Open", 1, "https://cdn-icons-png.flaticon.com/128/6010/6010434.png");
        $form->addButton("§l§bWISE ARMOR\n§9»» §r§6Tap To Open", 1, "https://cdn-icons-png.flaticon.com/128/6010/6010434.png");
        $form->addButton("§l§bEMERALD ARMOR\n§9»» §r§6Tap To Open", 1, "https://cdn-icons-png.flaticon.com/128/6010/6010434.png");
        $form->addButton("§l§bREDSTONE ARMOR\n§9»» §r§6Tap To Open", 1, "https://cdn-icons-png.flaticon.com/128/6010/6010434.png");
        $form->addButton("§l§bUNSTABLE ARMOR\n§9»» §r§6Tap To Open", 1, "https://cdn-icons-png.flaticon.com/128/6010/6010434.png");
        $form->addButton("§l§bSPIDER ARMOR\n§9»» §r§6Tap To Open", 1, "https://cdn-icons-png.flaticon.com/128/6010/6010434.png");
        $form->addButton("§l§bDIGGER ARMOR\n§9»» §r§6Tap To Open", 1, "https://cdn-icons-png.flaticon.com/128/6010/6010434.png");
        $form->addButton("§l§bTECHNO ARMOR\n§9»» §r§6Tap To Open", 1, "https://cdn-icons-png.flaticon.com/128/6010/6010434.png");
        $form->addButton("§l§bLIQUED ARMOR\n§9»» §r§6Tap To Open", 1, "https://cdn-icons-png.flaticon.com/128/6010/6010434.png");
        $form->addButton("§l§aBACK\n§9»» §r§bTap To Go Back", 0, "textures/ui/icon_import");
        $sender->sendForm($form);
        return $form;
    }

    public function eblocks(Player $sender): Form
    {
        $form = new SimpleForm(function (Player $sender, int $data = null) {
            if ($data === null) {
                return;
            }
            switch ($data) {
                case 0:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view ec1");
                    break;

                case 1:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view ec2");
                    break;

                case 2:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view ec3");
                    break;

                case 3:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view ec4");
                    break;

                case 4:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view ec5");
                    break;

                case 5:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view ec6");
                    break;

                case 6:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view ec7");
                    break;

                case 7:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view ec8");
                    break;

                case 8:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view ec9");
                    break;

                case 9:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view ec10");
                    break;

                case 10:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view ec11");
                    break;

                case 11:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view ec12");
                    break;

                case 12:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view ec13");
                    break;

                case 13:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view ec14");
                    break;

                case 14:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view ec15");
                    break;

                case 15:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view ec16");
                    break;

                case 16:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view ec17");
                    break;

                case 17:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view ec18");
                    break;

                case 18:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view ec19");
                    break;

                case 19:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view ec20");
                    break;

                case 20:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view ec21");
                    break;

                case 21:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view ec22");
                    break;

                case 22:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view ec23");
                    break;

                case 23:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view ec24");
                    break;

                case 24:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view ec25");
                    break;

                case 25:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view ec26");
                    break;

                case 26:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view ec27");
                    break;

                case 27:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view ec28");
                    break;

                case 28:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view ec29");
                    break;

                case 29:
                    $sender->sendForm(new RecipesForm());
                    break;
            }
        });
        $form->setTitle("§l§6ENCHANTED BLOCKS RECIPES");
        $form->setContent("§dSelect The Which Enchanted Item Recipe You Want:");
        $form->addButton("§l§bENCHANTED COBBLESTONE\n§9»» §r§6Tap To View", 0, "textures/blocks/cobblestone");
        $form->addButton("§l§bENCHANTED COAL\n§9»» §r§6Tap To View", 0, "textures/items/coal");
        $form->addButton("§l§bENCHANTED IRON\n§9»» §r§6Tap To View", 0, "textures/items/iron_ingot");
        $form->addButton("§l§bENCHANTED GOLD\n§9»» §r§6Tap To View", 0, "textures/items/gold_ingot");
        $form->addButton("§l§bENCHANTED LAPIS\n§9»» §r§6Tap To View", 0, "textures/items/dye_powder_blue");
        $form->addButton("§l§bENCHANTED REDSTONE\n§9»» §r§6Tap To View", 0, "textures/items/redstone_dust");
        $form->addButton("§l§bENCHANTED DIAMOND\n§9»» §r§6Tap To View", 0, "textures/items/diamond");
        $form->addButton("§l§bENCHANTED EMERALD\n§9»» §r§6Tap To View", 0, "textures/items/emerald");
        $form->addButton("§l§bENCHANTED NETHER QUARTZ\n§9»» §r§6Tap To View", 0, "textures/items/quartz");
        $form->addButton("§l§bENCHANTED NETHERRACK\n§9»» §r§6Tap To View", 0, "textures/blocks/netherrack");
        $form->addButton("§l§bENCHANTED ENDSTONE\n§9»» §r§6Tap To View", 0, "textures/blocks/end_stone");
        $form->addButton("§l§bENCHANTED WHEAT\n§9»» §r§6Tap To View", 0, "textures/items/wheat");
        $form->addButton("§l§bENCHANTED CARROT\n§9»» §r§6Tap To View", 0, "textures/items/carrot");
        $form->addButton("§l§bENCHANTED POTATO\n§9»» §r§6Tap To View", 0, "textures/items/potato");
        $form->addButton("§l§bENCHANTED MELON\n§9»» §r§6Tap To View", 0, "textures/blocks/melon_side");
        $form->addButton("§l§bENCHANTED PUMPKIN\n§9»» §r§6Tap To View", 0, "textures/blocks/pumpkin_side");
        $form->addButton("§l§bENCHANTED DIRT\n§9»» §r§6Tap To View", 0, "textures/blocks/dirt");
        $form->addButton("§l§bENCHANTED SAND\n§9»» §r§6Tap To View", 0, "textures/blocks/sand");
        $form->addButton("§l§bENCHANTED OAK LOG\n§9»» §r§6Tap To View", 0, "textures/blocks/log_oak");
        $form->addButton("§l§bENCHANTED ACACIA LOG\n§9»» §r§6Tap To View", 0, "textures/blocks/log_acacia");
        $form->addButton("§l§bENCHANTED BIRCH LOG\n§9»» §r§6Tap To View", 0, "textures/blocks/log_birch");
        $form->addButton("§l§bENCHANTED SPRUCE LOG\n§9»» §r§6Tap To View", 0, "textures/blocks/log_spruce");
        $form->addButton("§l§bENCHANTED JUNGLE LOG\n§9»» §r§6Tap To View", 0, "textures/blocks/log_jungle");
        $form->addButton("§l§bENCHANTED DARK OAK LOG\n§9»» §r§6Tap To View", 0, "textures/blocks/log_big_oak");
        $form->addButton("§l§bENCHANTED STEAK\n§9»» §r§6Tap To View", 0, "textures/items/beef_cooked");
        $form->addButton("§l§bENCHANTED CHICKEN\n§9»» §r§6Tap To View", 0, "textures/items/chicken_cooked");
        $form->addButton("§l§bENCHANTED MUTTON\n§9»» §r§6Tap To View", 0, "textures/items/mutton_cooked");
        $form->addButton("§l§bENCHANTED PORKCHOP\n§9»» §r§6Tap To View", 0, "textures/items/porkchop_cooked");
        $form->addButton("§l§bENCHANTED SNOW\n§9»» §r§6Tap To View", 0, "textures/blocks/snow");
        $form->addButton("§l§aBACK\n§9»» §r§bTap To Go Back", 0, "textures/ui/icon_import");
        $sender->sendForm($form);
        return $form;
    }

    public function armor1(Player $sender): Form
    {
        $form = new SimpleForm(function (Player $sender, int $data = null) {
            if ($data === null) {
                return;
            }
            switch ($data) {
                case 0:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view helmet1");
                    break;

                case 1:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view chest1");
                    break;

                case 2:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view leg1");
                    break;

                case 3:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view boot1");
                    break;

                case 4:
                    $this->armors($sender);
                    break;
            }
        });
        $form->setTitle("§l§6GOD ARMOR RECIPE");
        $form->setContent("§dSelect The Which God Armor Piece Recipe You Want:");
        $form->addButton("§l§bGOD HELMET\n§9»» §r§6Tap To View", 0, "textures/items/gold_helmet");
        $form->addButton("§l§bGOD CHESTPLATE\n§9»» §r§6Tap To View", 0, "textures/items/gold_chestplate");
        $form->addButton("§l§bGOD LEGGINGS\n§9»» §r§6Tap To View", 0, "textures/items/gold_leggings");
        $form->addButton("§l§bGOD BOOTS\n§9»» §r§6Tap To View", 0, "textures/items/gold_boots");
        $form->addButton("§l§aBACK\n§9»» §r§bTap To Go Back", 0, "textures/ui/icon_import");
        $sender->sendForm($form);
        return $form;
    }

    public function armor2(Player $sender): Form
    {
        $form = new SimpleForm(function (Player $sender, int $data = null) {
            if ($data === null) {
                return;
            }
            switch ($data) {
                case 0:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view helmet2");
                    break;

                case 1:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view chest2");
                    break;

                case 2:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view leg2");
                    break;

                case 3:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view boot2");
                    break;

                case 4:
                    $this->armors($sender);
                    break;
            }
        });
        $form->setTitle("§l§6MINER ARMOR RECIPE");
        $form->setContent("§dSelect The Which Miner Armor Piece Recipe You Want:");
        $form->addButton("§l§bMINER HELMET\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_helmet");
        $form->addButton("§l§bMINER CHESTPLATE\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_chestplate");
        $form->addButton("§l§bMINER LEGGINGS\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_leggings");
        $form->addButton("§l§bMINER BOOTS\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_boots");
        $form->addButton("§l§aBACK\n§9»» §r§bTap To Go Back", 0, "textures/ui/icon_import");
        $sender->sendForm($form);
        return $form;
    }

    public function armor3(Player $sender): Form
    {


        $form = new SimpleForm(function (Player $sender, int $data = null) {
            if ($data === null) {
                return;
            }
            switch ($data) {
                case 0:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view helmet3");
                    break;

                case 1:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view chest3");
                    break;

                case 2:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view leg3");
                    break;

                case 3:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view boot3");
                    break;

                case 4:
                    $this->armors($sender);
                    break;
            }
        });
        $form->setTitle("§l§6FARMER ARMOR RECIPE");
        $form->setContent("§dSelect The Which Farmer Armor Piece Recipe You Want:");
        $form->addButton("§l§bFARMER HELMET\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_helmet");
        $form->addButton("§l§bFARMER CHESTPLATE\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_chestplate");
        $form->addButton("§l§bFARMER LEGGINGS\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_leggings");
        $form->addButton("§l§bFARMER BOOTS\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_boots");
        $form->addButton("§l§aBACK\n§9»» §r§bTap To Go Back", 0, "textures/ui/icon_import");
        $sender->sendForm($form);
        return $form;
    }

    public function armor4(Player $sender): Form
    {


        $form = new SimpleForm(function (Player $sender, int $data = null) {
            if ($data === null) {
                return;
            }
            switch ($data) {
                case 0:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view helmet4");
                    break;

                case 1:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view chest4");
                    break;

                case 2:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view leg4");
                    break;

                case 3:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view boot4");
                    break;

                case 4:
                    $this->armors($sender);
                    break;
            }
        });
        $form->setTitle("§l§6LAPIS ARMOR RECIPE");
        $form->setContent("§dSelect The Which Lapis Armor Piece Recipe You Want:");
        $form->addButton("§l§bLAPIS HELMET\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_helmet");
        $form->addButton("§l§bLAPIS CHESTPLATE\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_chestplate");
        $form->addButton("§l§bLAPIS LEGGINGS\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_leggings");
        $form->addButton("§l§bLAPIS BOOTS\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_boots");
        $form->addButton("§l§aBACK\n§9»» §r§bTap To Go Back", 0, "textures/ui/icon_import");
        $sender->sendForm($form);
        return $form;
    }

    public function armor5(Player $sender): Form
    {


        $form = new SimpleForm(function (Player $sender, int $data = null) {
            if ($data === null) {
                return;
            }
            switch ($data) {
                case 0:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view helmet5");
                    break;

                case 1:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view chest5");
                    break;

                case 2:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view leg5");
                    break;

                case 3:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view boot5");
                    break;

                case 4:
                    $this->armors($sender);
                    break;
            }
        });
        $form->setTitle("§l§6END ARMOR RECIPE");
        $form->setContent("§dSelect The Which End Armor Piece Recipe You Want:");
        $form->addButton("§l§bEND HELMET\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_helmet");
        $form->addButton("§l§bEND CHESTPLATE\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_chestplate");
        $form->addButton("§l§bEND LEGGINGS\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_leggings");
        $form->addButton("§l§bEND BOOTS\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_boots");
        $form->addButton("§l§aBACK\n§9»» §r§bTap To Go Back", 0, "textures/ui/icon_import");
        $sender->sendForm($form);
        return $form;
    }

    public function armor6(Player $sender): Form
    {


        $form = new SimpleForm(function (Player $sender, int $data = null) {
            if ($data === null) {
                return;
            }
            switch ($data) {
                case 0:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view helmet6");
                    break;

                case 1:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view chest6");
                    break;

                case 2:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view leg6");
                    break;

                case 3:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view boot6");
                    break;

                case 4:
                    $this->armors($sender);
                    break;
            }
        });
        $form->setTitle("§l§6GOLEM ARMOR RECIPE");
        $form->setContent("§dSelect The Which Golem Armor Piece Recipe You Want:");
        $form->addButton("§l§bGOLEM HELMET\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_helmet");
        $form->addButton("§l§bGOLEM CHESTPLATE\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_chestplate");
        $form->addButton("§l§bGOLEM LEGGINGS\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_leggings");
        $form->addButton("§l§bGOLEM BOOTS\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_boots");
        $form->addButton("§l§aBACK\n§9»» §r§bTap To Go Back", 0, "textures/ui/icon_import");
        $sender->sendForm($form);
        return $form;
    }

    public function armor7(Player $sender): Form
    {


        $form = new SimpleForm(function (Player $sender, int $data = null) {
            if ($data === null) {
                return;
            }
            switch ($data) {
                case 0:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view helmet7");
                    break;

                case 1:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view chest7");
                    break;

                case 2:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view leg7");
                    break;

                case 3:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view boot7");
                    break;

                case 4:
                    $this->armors($sender);
                    break;
            }
        });
        $form->setTitle("§l§6PUMPKIN ARMOR RECIPE");
        $form->setContent("§dSelect The Which Pumpkin Armor Piece Recipe You Want:");
        $form->addButton("§l§bPUMPKIN HELMET\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_helmet");
        $form->addButton("§l§bPUMPKIN CHESTPLATE\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_chestplate");
        $form->addButton("§l§bPUMPKIN LEGGINGS\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_leggings");
        $form->addButton("§l§bPUMPKIN BOOTS\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_boots");
        $form->addButton("§l§aBACK\n§9»» §r§bTap To Go Back", 0, "textures/ui/icon_import");
        $sender->sendForm($form);
        return $form;
    }

    public function armor8(Player $sender): Form
    {


        $form = new SimpleForm(function (Player $sender, int $data = null) {
            if ($data === null) {
                return;
            }
            switch ($data) {
                case 0:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view helmet8");
                    break;

                case 1:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view chest8");
                    break;

                case 2:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view leg8");
                    break;

                case 3:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view boot8");
                    break;

                case 4:
                    $this->armors($sender);
                    break;
            }
        });
        $form->setTitle("§l§6NETHER ARMOR RECIPE");
        $form->setContent("§dSelect The Which Nether Armor Piece Recipe You Want:");
        $form->addButton("§l§bNETHER HELMET\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_helmet");
        $form->addButton("§l§bNETHER CHESTPLATE\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_chestplate");
        $form->addButton("§l§bNETHER LEGGINGS\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_leggings");
        $form->addButton("§l§bNETHER BOOTS\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_boots");
        $form->addButton("§l§aBACK\n§9»» §r§bTap To Go Back", 0, "textures/ui/icon_import");
        $sender->sendForm($form);
        return $form;
    }

    public function armor9(Player $sender): Form
    {


        $form = new SimpleForm(function (Player $sender, int $data = null) {
            if ($data === null) {
                return;
            }
            switch ($data) {
                case 0:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view helmet9");
                    break;

                case 1:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view chest9");
                    break;

                case 2:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view leg9");
                    break;

                case 3:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view boot9");
                    break;

                case 4:
                    $this->armors($sender);
                    break;
            }
        });
        $form->setTitle("§l§6OAK ARMOR RECIPE");
        $form->setContent("§dSelect The Which Oak Armor Piece Recipe You Want:");
        $form->addButton("§l§bOAK HELMET\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_helmet");
        $form->addButton("§l§bOAK CHESTPLATE\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_chestplate");
        $form->addButton("§l§bOAK LEGGINGS\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_leggings");
        $form->addButton("§l§bOAK BOOTS\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_boots");
        $form->addButton("§l§aBACK\n§9»» §r§bTap To Go Back", 0, "textures/ui/icon_import");
        $sender->sendForm($form);
        return $form;
    }

    public function armor10(Player $sender): Form
    {


        $form = new SimpleForm(function (Player $sender, int $data = null) {
            if ($data === null) {
                return;
            }
            switch ($data) {
                case 0:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view helmet10");
                    break;

                case 1:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view chest10");
                    break;

                case 2:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view leg10");
                    break;

                case 3:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view boot10");
                    break;

                case 4:
                    $this->armors($sender);
                    break;
            }
        });
        $form->setTitle("§l§6ICE ARMOR RECIPE");
        $form->setContent("§dSelect The Which Ice Armor Piece Recipe You Want:");
        $form->addButton("§l§bICE HELMET\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_helmet");
        $form->addButton("§l§bICE CHESTPLATE\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_chestplate");
        $form->addButton("§l§bICE LEGGINGS\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_leggings");
        $form->addButton("§l§bICE BOOTS\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_boots");
        $form->addButton("§l§aBACK\n§9»» §r§bTap To Go Back", 0, "textures/ui/icon_import");
        $sender->sendForm($form);
        return $form;
    }

    public function armor11(Player $sender): Form
    {


        $form = new SimpleForm(function (Player $sender, int $data = null) {
            if ($data === null) {
                return;
            }
            switch ($data) {
                case 0:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view helmet11");
                    break;

                case 1:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view chest11");
                    break;

                case 2:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view leg11");
                    break;

                case 3:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view boot11");
                    break;

                case 4:
                    $this->armors($sender);
                    break;
            }
        });
        $form->setTitle("§l§6ASSASSIN ARMOR RECIPE");
        $form->setContent("§dSelect The Which Assassin Armor Piece Recipe You Want:");
        $form->addButton("§l§bASSASSIN HELMET\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_helmet");
        $form->addButton("§l§bASSASSIN CHESTPLATE\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_chestplate");
        $form->addButton("§l§bASSASSIN LEGGINGS\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_leggings");
        $form->addButton("§l§bASSASSIN BOOTS\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_boots");
        $form->addButton("§l§aBACK\n§9»» §r§bTap To Go Back", 0, "textures/ui/icon_import");
        $sender->sendForm($form);
        return $form;
    }

    public function armor12(Player $sender): Form
    {


        $form = new SimpleForm(function (Player $sender, int $data = null) {
            if ($data === null) {
                return;
            }
            switch ($data) {
                case 0:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view helmet12");
                    break;

                case 1:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view chest12");
                    break;

                case 2:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view leg12");
                    break;

                case 3:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view boot12");
                    break;

                case 4:
                    $this->armors($sender);
                    break;
            }
        });
        $form->setTitle("§l§6TANK ARMOR RECIPE");
        $form->setContent("§dSelect The Which Tank Armor Piece Recipe You Want:");
        $form->addButton("§l§bTANK HELMET\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_helmet");
        $form->addButton("§l§bTANK CHESTPLATE\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_chestplate");
        $form->addButton("§l§bTANK LEGGINGS\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_leggings");
        $form->addButton("§l§bTANK BOOTS\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_boots");
        $form->addButton("§l§aBACK\n§9»» §r§bTap To Go Back", 0, "textures/ui/icon_import");
        $sender->sendForm($form);
        return $form;
    }

    public function armor13(Player $sender): Form
    {


        $form = new SimpleForm(function (Player $sender, int $data = null) {
            if ($data === null) {
                return;
            }
            switch ($data) {
                case 0:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view helmet13");
                    break;

                case 1:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view chest13");
                    break;

                case 2:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view leg13");
                    break;

                case 3:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view boot13");
                    break;

                case 4:
                    $this->armors($sender);
                    break;
            }
        });
        $form->setTitle("§l§6WISE ARMOR RECIPE");
        $form->setContent("§dSelect The Which Wise Armor Piece Recipe You Want:");
        $form->addButton("§l§bWISE HELMET\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_helmet");
        $form->addButton("§l§bWISE CHESTPLATE\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_chestplate");
        $form->addButton("§l§bWISE LEGGINGS\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_leggings");
        $form->addButton("§l§bWISE BOOTS\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_boots");
        $form->addButton("§l§aBACK\n§9»» §r§bTap To Go Back", 0, "textures/ui/icon_import");
        $sender->sendForm($form);
        return $form;
    }

    public function armor14(Player $sender): Form
    {


        $form = new SimpleForm(function (Player $sender, int $data = null) {
            if ($data === null) {
                return;
            }
            switch ($data) {
                case 0:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view helmet14");
                    break;

                case 1:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view chest14");
                    break;

                case 2:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view leg14");
                    break;

                case 3:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view boot14");
                    break;

                case 4:
                    $this->armors($sender);
                    break;
            }
        });
        $form->setTitle("§l§6EMERALD ARMOR RECIPE");
        $form->setContent("§dSelect The Which Emerald Armor Piece Recipe You Want:");
        $form->addButton("§l§bEMERALD HELMET\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_helmet");
        $form->addButton("§l§bEMERALD CHESTPLATE\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_chestplate");
        $form->addButton("§l§bEMERALD LEGGINGS\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_leggings");
        $form->addButton("§l§bEMERALD BOOTS\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_boots");
        $form->addButton("§l§aBACK\n§9»» §r§bTap To Go Back", 0, "textures/ui/icon_import");
        $sender->sendForm($form);
        return $form;
    }

    public function armor15(Player $sender): Form
    {


        $form = new SimpleForm(function (Player $sender, int $data = null) {
            if ($data === null) {
                return;
            }
            switch ($data) {
                case 0:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view helmet15");
                    break;

                case 1:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view chest15");
                    break;

                case 2:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view leg15");
                    break;

                case 3:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view boot15");
                    break;

                case 4:
                    $this->armors($sender);
                    break;
            }
        });
        $form->setTitle("§l§6REDSTONE ARMOR RECIPE");
        $form->setContent("§dSelect The Which Redstone Armor Piece Recipe You Want:");
        $form->addButton("§l§bREDSTONE HELMET\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_helmet");
        $form->addButton("§l§bREDSTONE CHESTPLATE\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_chestplate");
        $form->addButton("§l§bREDSTONE LEGGINGS\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_leggings");
        $form->addButton("§l§bREDSTONE BOOTS\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_boots");
        $form->addButton("§l§aBACK\n§9»» §r§bTap To Go Back", 0, "textures/ui/icon_import");
        $sender->sendForm($form);
        return $form;
    }

    public function armor16(Player $sender): Form
    {


        $form = new SimpleForm(function (Player $sender, int $data = null) {
            if ($data === null) {
                return;
            }
            switch ($data) {
                case 0:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view helmet16");
                    break;

                case 1:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view chest16");
                    break;

                case 2:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view leg16");
                    break;

                case 3:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view boot16");
                    break;

                case 4:
                    $this->armors($sender);
                    break;
            }
        });
        $form->setTitle("§l§6UNSTABLE ARMOR RECIPE");
        $form->setContent("§dSelect The Which Unstable Armor Piece Recipe You Want:");
        $form->addButton("§l§bUNSTABLE HELMET\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_helmet");
        $form->addButton("§l§bUNSTABLE CHESTPLATE\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_chestplate");
        $form->addButton("§l§bUNSTABLE LEGGINGS\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_leggings");
        $form->addButton("§l§bUNSTABLE BOOTS\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_boots");
        $form->addButton("§l§aBACK\n§9»» §r§bTap To Go Back", 0, "textures/ui/icon_import");
        $sender->sendForm($form);
        return $form;
    }

    public function armor17(Player $sender): Form
    {


        $form = new SimpleForm(function (Player $sender, int $data = null) {
            if ($data === null) {
                return;
            }
            switch ($data) {
                case 0:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view helmet17");
                    break;

                case 1:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view chest17");
                    break;

                case 2:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view leg17");
                    break;

                case 3:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view boot17");
                    break;

                case 4:
                    $this->armors($sender);
                    break;
            }
        });
        $form->setTitle("§l§6SPIDER ARMOR RECIPE");
        $form->setContent("§dSelect The Which Spider Armor Piece Recipe You Want:");
        $form->addButton("§l§bSPIDER HELMET\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_helmet");
        $form->addButton("§l§bSPIDER CHESTPLATE\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_chestplate");
        $form->addButton("§l§bSPIDER LEGGINGS\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_leggings");
        $form->addButton("§l§bSPIDER BOOTS\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_boots");
        $form->addButton("§l§aBACK\n§9»» §r§bTap To Go Back", 0, "textures/ui/icon_import");
        $sender->sendForm($form);
        return $form;
    }

    public function armor18(Player $sender): Form
    {


        $form = new SimpleForm(function (Player $sender, int $data = null) {
            if ($data === null) {
                return;
            }
            switch ($data) {
                case 0:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view helmet18");
                    break;

                case 1:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view chest18");
                    break;

                case 2:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view leg18");
                    break;

                case 3:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view boot18");
                    break;

                case 4:
                    $this->armors($sender);
                    break;
            }
        });
        $form->setTitle("§l§6DIGGER ARMOR RECIPE");
        $form->setContent("§dSelect The Which Digger Armor Piece Recipe You Want:");
        $form->addButton("§l§bDIGGER HELMET\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_helmet");
        $form->addButton("§l§bDIGGER CHESTPLATE\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_chestplate");
        $form->addButton("§l§bDIGGER LEGGINGS\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_leggings");
        $form->addButton("§l§bDIGGER BOOTS\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_boots");
        $form->addButton("§l§aBACK\n§9»» §r§bTap To Go Back", 0, "textures/ui/icon_import");
        $sender->sendForm($form);
        return $form;
    }

    public function armor19(Player $sender): Form
    {


        $form = new SimpleForm(function (Player $sender, int $data = null) {
            if ($data === null) {
                return;
            }
            switch ($data) {
                case 0:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view helmet19");
                    break;

                case 1:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view chest19");
                    break;

                case 2:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view leg19");
                    break;

                case 3:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view boot19");
                    break;

                case 4:
                    $this->armors($sender);
                    break;
            }
        });
        $form->setTitle("§l§6TECHNO ARMOR RECIPE");
        $form->setContent("§dSelect The Which Techno Armor Piece Recipe You Want:");
        $form->addButton("§l§bTECHNO HELMET\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_helmet");
        $form->addButton("§l§bTECHNO CHESTPLATE\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_chestplate");
        $form->addButton("§l§bTECHNO LEGGINGS\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_leggings");
        $form->addButton("§l§bTECHNO BOOTS\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_boots");
        $form->addButton("§l§aBACK\n§9»» §r§bTap To Go Back", 0, "textures/ui/icon_import");
        $sender->sendForm($form);
        return $form;
    }

    public function armor20(Player $sender): Form
    {


        $form = new SimpleForm(function (Player $sender, int $data = null) {
            if ($data === null) {
                return;
            }
            switch ($data) {
                case 0:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view helmet20");
                    break;

                case 1:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view chest20");
                    break;

                case 2:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view leg20");
                    break;

                case 3:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view boot20");
                    break;

                case 4:
                    $this->armors($sender);
                    break;
            }
        });
        $form->setTitle("§l§6LIQUED ARMOR RECIPE");
        $form->setContent("§dSelect The Which Liqued Armor Piece Recipe You Want:");
        $form->addButton("§l§bLIQUED HELMET\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_helmet");
        $form->addButton("§l§bLIQUED CHESTPLATE\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_chestplate");
        $form->addButton("§l§bLIQUED LEGGINGS\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_leggings");
        $form->addButton("§l§bLIQUED BOOTS\n§9»» §r§6Tap To View", 0, "textures/items/chainmail_boots");
        $form->addButton("§l§aBACK\n§9»» §r§bTap To Go Back", 0, "textures/ui/icon_import");
        $sender->sendForm($form);
        return $form;
    }

    public function ore(Player $sender): Form
    {
        $form = new SimpleForm(function (Player $sender, int $data = null) {
            if ($data === null) {
                return;
            }
            switch ($data) {
                case 0:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view ore1");
                    break;

                case 1:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view ore2");
                    break;

                case 2:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view ore3");
                    break;

                case 3:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view ore4");
                    break;

                case 4:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view ore5");
                    break;

                case 5:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view ore6");
                    break;

                case 6:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view ore7");
                    break;

                case 7:
                    $sender->sendForm(new RecipesForm());
                    break;
            }
        });
        $form->setTitle("§l§6ORE SPAWNER RECIPES");
        $form->setContent("§bSelect The Which Ore Spawner Recipe You Want:");
        $form->addButton("§l§bCOAL SPAWNER\n§9»» §r§6Tap To View", 0, "textures/items/coal");
        $form->addButton("§l§bIRON SPAWNER\n§9»» §r§6Tap To View", 0, "textures/items/iron_ingot");
        $form->addButton("§l§bGOLD SPAWNER\n§9»» §r§6Tap To View", 0, "textures/items/gold_ingot");
        $form->addButton("§l§bLAPIS SPAWNER\n§9»» §r§6Tap To View", 0, "textures/items/dye_powder_blue");
        $form->addButton("§l§bREDSTONE SPAWNER\n§9»» §r§6Tap To View", 0, "textures/items/redstone_dust");
        $form->addButton("§l§bDIAMOND SPAWNER\n§9»» §r§6Tap To View", 0, "textures/items/diamond");
        $form->addButton("§l§bEMERALD SPAWNER\n§9»» §r§6Tap To View", 0, "textures/items/emerald");
        $form->addButton("§l§aBACK\n§9»» §r§bTap To Go Back", 0, "textures/ui/icon_import");
        $sender->sendForm($form);
        return $form;
    }

    public function sword(Player $sender): Form
    {
        $form = new SimpleForm(function (Player $sender, int $data = null) {
            if ($data === null) {
                return;
            }
            switch ($data) {
                case 0:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view sword1");
                    break;
                case 1:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view sword2");
                    break;
                case 2:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view sword3");
                    break;
                case 3:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view sword4");
                    break;
                case 4:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view sword5");
                    break;
                case 5:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view sword6");
                    break;
                case 6:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view sword7");
                    break;
                case 7:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view sword8");
                    break;
                case 8:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view sword9");
                    break;
                case 9:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view sword10");
                    break;
                case 10:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view sword11");
                    break;
                case 11:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view sword12");
                    break;
                case 12:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view sword13");
                    break;
                case 13:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view sword14");
                    break;
                case 14:
                    $sender->sendForm(new RecipesForm());
                    break;
            }
        });
        $form->setTitle("§l§6CUSTOM SWORD RECIPES");
        $form->setContent("§bSelect The Recipe You Want To Craft:");
        $form->addButton("§l§bASPECT OF THE END\n§9»» §r§6Tap To View", 0, "textures/items/sword/aspect_of_the_end");
        $form->addButton("§l§bELUCIDATOR\n§9»» §r§6Tap To View", 0, "textures/items/sword/elucidator");
        $form->addButton("§l§bGOLEM SWORD\n§9»» §r§6Tap To View", 0, "textures/items/sword/golem_sword");
        $form->addButton("§l§bLEAPING SWORD\n§9»» §r§6Tap To View", 0, "textures/items/sword/leaping_sword");
        $form->addButton("§l§bMIDAS SWORD\n§9»» §r§6Tap To View", 0, "textures/items/sword/midas_sword");
        $form->addButton("§l§bPOOCH SWORD\n§9»» §r§6Tap To View", 0, "textures/items/sword/pooch_sword");
        $form->addButton("§l§bROGUE SWORD\n§9»» §r§6Tap To View", 0, "textures/items/sword/rogue_sword");
        $form->addButton("§l§bSHAMAN SWORD\n§9»» §r§6Tap To View", 0, "textures/items/sword/shaman_sword");
        $form->addButton("§l§bSILVER FANG\n§9»» §r§6Tap To View", 0, "textures/items/sword/silver_fang");
        $form->addButton("§l§bSPIRIT SWORD\n§9»» §r§6Tap To View", 0, "textures/items/sword/spirit_sword");
        $form->addButton("§l§bTACTICIAN SWORD\n§9»» §r§6Tap To View", 0, "textures/items/sword/tactician_sword");
        $form->addButton("§l§bTHICK TACTICIAN SWORD\n§9»» §r§6Tap To View", 0, "textures/items/sword/thick_tactician_sword");
        $form->addButton("§l§bYETI SWORD\n§9»» §r§6Tap To View", 0, "textures/items/sword/yeti_sword");
        $form->addButton("§l§bZOMBIE SWORD\n§9»» §r§6Tap To View", 0, "textures/items/sword/zombie_sword");
        $form->addButton("§l§aBACK\n§9»» §r§bTap To Go Back", 0, "textures/ui/icon_import");
        $sender->sendForm($form);
        return $form;
    }

    public function axe(Player $sender): Form
    {
        $form = new SimpleForm(function (Player $sender, int $data = null) {
            if ($data === null) {
                return;
            }
            switch ($data) {
                case 0:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view axe1");
                    break;
                case 1:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view axe2");
                    break;
                case 2:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view axe3");
                    break;
                case 3:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view axe4");
                    break;
                case 4:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view axe5");
                    break;
                case 5:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view axe6");
                    break;
                case 6:
                    $sender->sendForm(new RecipesForm());
                    break;
            }
        });
        $form->setTitle("§l§6CUSTOM AXE RECIPES");
        $form->setContent("§bSelect The Recipe You Want To Craft:");
        $form->addButton("§l§bFROZEN SCYTHE\n§9»» §r§6Tap To View", 0, "textures/items/axe/frozen_scythe");
        $form->addButton("§l§bJUNGLE AXE\n§9»» §r§6Tap To View", 0, "textures/items/axe/jungle_axe");
        $form->addButton("§l§bMUSHROOM AXE\n§9»» §r§6Tap To View", 0, "textures/items/axe/mushroom_cow_axe");
        $form->addButton("§l§bPROMISING AXE\n§9»» §r§6Tap To View", 0, "textures/items/axe/promising_axe");
        $form->addButton("§l§bRAIDER AXE\n§9»» §r§6Tap To View", 0, "textures/items/axe/raider_axe");
        $form->addButton("§l§bSCULPTOR AXE\n§9»» §r§6Tap To View", 0, "textures/items/axe/sculptor_axe");
        $form->addButton("§l§aBACK\n§9»» §r§bTap To Go Back", 0, "textures/ui/icon_import");
        $sender->sendForm($form);
        return $form;
    }

    public function hoe(Player $sender): Form
    {
        $form = new SimpleForm(function (Player $sender, int $data = null) {
            if ($data === null) {
                return;
            }
            switch ($data) {
                case 0:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view hoe1");
                    break;
                case 1:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view hoe2");
                    break;
                case 2:
                    $sender->sendForm(new RecipesForm());
                    break;
            }
        });
        $form->setTitle("§l§6CUSTOM HOE RECIPES");
        $form->setContent("§bSelect The Recipe You Want To Craft:");
        $form->addButton("§l§bHOE OF TILLING\n§9»» §r§6Tap To View", 0, "textures/items/hoe/hoe_of_tilling");
        $form->addButton("§l§bHOE OF GREATER TILLING\n§9»» §r§6Tap To View", 0, "textures/items/hoe/hoe_of_greater_tilling");
        $form->addButton("§l§aBACK\n§9»» §r§bTap To Go Back", 0, "textures/ui/icon_import");
        $sender->sendForm($form);
        return $form;
    }

    public function pickaxe(Player $sender): Form
    {
        $form = new SimpleForm(function (Player $sender, int $data = null) {
            if ($data === null) {
                return;
            }
            switch ($data) {
                case 0:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view pick1");
                    break;
                case 1:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view pick2");
                    break;
                case 2:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view pick3");
                    break;
                case 3:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view pick4");
                    break;
                case 4:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view pick5");
                    break;
                case 5:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view pick6");
                    break;
                case 6:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view pick7");
                    break;
                case 7:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view pick8");
                    break;
                case 8:
                    $sender->sendForm(new RecipesForm());
                    break;
            }
        });
        $form->setTitle("§l§6CUSTOM PICKAXE RECIPES");
        $form->setContent("§bSelect The Recipe You Want To Craft:");
        $form->addButton("§l§bPICKAXE BOULDER\n§9»» §r§6Tap To View", 0, "textures/items/pickaxe/PickaxeBoulder");
        $form->addButton("§l§bPICKAXE DOLPHIN\n§9»» §r§6Tap To View", 0, "textures/items/pickaxe/PickaxeDolphin");
        $form->addButton("§l§bPICKAXE DRAGON\n§9»» §r§6Tap To View", 0, "textures/items/pickaxe/PickaxeDragon");
        $form->addButton("§l§bPICKAXE ERUPTION\n§9»» §r§6Tap To View", 0, "textures/items/pickaxe/PickaxeEruption");
        $form->addButton("§l§bPICKAXE FLAME\n§9»» §r§6Tap To View", 0, "textures/items/pickaxe/PickaxeFlame");
        $form->addButton("§l§bPICKAXE JACKPOT\n§9»» §r§6Tap To View", 0, "textures/items/pickaxe/PickaxeJackpot");
        $form->addButton("§l§bPICKAXE LAVA\n§9»» §r§6Tap To View", 0, "textures/items/pickaxe/PickaxeLava");
        $form->addButton("§l§bREDSTONE PICKAXE\n§9»» §r§6Tap To View", 0, "textures/items/pickaxe/redstone_pickaxe");
        $form->addButton("§l§aBACK\n§9»» §r§bTap To Go Back", 0, "textures/ui/icon_import");
        $sender->sendForm($form);
        return $form;
    }

    public function items(Player $sender): Form
    {
        $form = new SimpleForm(function (Player $sender, int $data = null) {
            if ($data === null) {
                return;
            }
            switch ($data) {
                case 0:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view item1");
                    break;

                case 1:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view item2");
                    break;

                case 2:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view item3");
                    break;

                case 3:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view item4");
                    break;

                case 4:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view item5");
                    break;

                case 5:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view item6");
                    break;

                case 6:
                    $sender->sendForm(new RecipesForm());
                    break;
            }
        });
        $form->setTitle("§l§6CUSTOM ITEMS RECIPES");
        $form->setContent("§bSelect The Which Item Recipe You Want:");
        $form->addButton("§l§bDRAGON'S BREATH\n§9»» §r§6Tap To View", 0, "textures/items/dragons_breath");
        $form->addButton("§l§bINFINITE WATER\n§9»» §r§6Tap To Get", 0, "textures/items/bucket_water");
        $form->addButton("§l§bINFINITE LAVA\n§9»» §r§6Tap To Get", 0, "textures/items/bucket_lava");
        $form->addButton("§l§bPIGGY BANK\n§9»» §r§6Tap To Get", 0, "textures/items/other/piggy_bank");
        $form->addButton("§l§bBAG\n§9»» §r§6Tap To Get", 0, "textures/items/other/bag");
        $form->addButton("§l§bPROFILE\n§9»» §r§6Tap To Get", 0, "textures/items/other/Passport");
        $form->addButton("§l§aBACK\n§9»» §r§bTap To Go Back", 0, "textures/ui/icon_import");
        $sender->sendForm($form);
        return $form;
    }

    public function wand(Player $sender): Form
    {
        $form = new SimpleForm(function (Player $sender, int $data = null) {
            if ($data === null) {
                return;
            }
            switch ($data) {
                case 0:
                    $sender->sendTitle("§rgrid_tile§eCOMMING SOON");
                    break;

                case 1:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view wand2");
                    break;

                case 2:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view wand3");
                    break;

                case 3:
                    $sender->sendForm(new RecipesForm());
                    break;
            }
        });
        $form->setTitle("§l§6WANDS RECIPES");
        $form->setContent("§bSelect The Recipe You Want To Craft:");
        $form->addButton("§l§bBUILDER WAND\n§9»» §r§6Tap To View", 0, "textures/items/wand/builders_wand");
        $form->addButton("§l§bSELL WAND\n§9»» §r§6Tap To View", 0, "textures/items/wand/sell_wand");
        $form->addButton("§l§bSMELT WAND\n§9»» §r§6Tap To View", 0, "textures/items/wand/melt_wand");
        $form->addButton("§l§aBACK\n§9»» §r§bTap To Go Back", 0, "textures/ui/icon_import");
        $sender->sendForm($form);
        return $form;
    }

    public function food(Player $sender): Form
    {
        $form = new SimpleForm(function (Player $sender, int $data = null) {
            if ($data === null) {
                return;
            }
            switch ($data) {
                case 0:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view food1");
                    break;
                case 1:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view food2");
                    break;
                case 2:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view food3");
                    break;
                case 3:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view food4");
                    break;
                case 4:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view food5");
                    break;
                case 5:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view food6");
                    break;
                case 6:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view food7");
                    break;
                case 7:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view food8");
                    break;
                case 8:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view food9");
                    break;
                case 9:
                    $sender->sendForm(new RecipesForm());
                    break;
            }
        });
        $form->setTitle("§l§6CUSTOM FOOD RECIPES");
        $form->setContent("§bSelect The Recipe You Want To Craft:");
        $form->addButton("§l§bBURGER\n§9»» §r§6Tap To View", 0, "textures/items/food/burger");
        $form->addButton("§l§bCHRISTMAS PUDDING\n§9»» §r§6Tap To View", 0, "textures/items/food/christmas_pudding");
        $form->addButton("§l§bHOTDOG\n§9»» §r§6Tap To View", 0, "textures/items/food/hotdog");
        $form->addButton("§l§bICE CREAME\n§9»» §r§6Tap To View", 0, "textures/items/food/ice-cream");
        $form->addButton("§l§bKFC CHICKEN\n§9»» §r§6Tap To View", 0, "textures/items/food/kfc_chicken");
        $form->addButton("§l§bLOLIPOP\n§9»» §r§6Tap To View", 0, "textures/items/food/lolipop");
        $form->addButton("§l§bPIZZA\n§9»» §r§6Tap To View", 0, "textures/items/food/pizza");
        $form->addButton("§l§bSANDWICH\n§9»» §r§6Tap To View", 0, "textures/items/food/sandwich");
        $form->addButton("§l§bCUP CAKE\n§9»» §r§6Tap To View", 0, "textures/items/food/yellowcupcake");
        $form->addButton("§l§aBACK\n§9»» §r§bTap To Go Back", 0, "textures/ui/icon_import");
        $sender->sendForm($form);
        return $form;
    }
    public function runes(Player $sender): Form
    {
        $form = new SimpleForm(function (Player $sender, int $data = null) {
            if ($data === null) {
                return;
            }
            switch ($data) {
                case 0:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view rune1");
                    break;

                case 1:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view rune2");
                    break;

                case 2:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view rune3");
                    break;

                case 3:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view rune4");
                    break;

                case 4:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view rune5");
                    break;

                case 5:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view rune6");
                    break;

                case 6:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view rune7");
                    break;

                case 7:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view rune8");
                    break;

                case 8:
                    $sender->sendForm(new RecipesForm());
                    break;
            }
        });
        $form->setTitle("§l§6RUNES RECIPES");
        $form->setContent("§bSelect The Recipe You Want To Craft:");
        $form->addButton("§l§bHOT RUNE\n§9»» §r§6Tap To View", 0, "textures/items/runes/hot_rune");
        $form->addButton("§l§bICE RUNE\n§9»» §r§6Tap To View", 0, "textures/items/runes/ice_rune");
        $form->addButton("§l§bLAVA RUNE\n§9»» §r§6Tap To View", 0, "textures/items/runes/lava_rune");
        $form->addButton("§l§bHEART RUNE\n§9»» §r§6Tap To View", 0, "textures/items/runes/hearts_rune");
        $form->addButton("§l§bRAINBOW RUNE\n§9»» §r§6Tap To View", 0, "textures/items/runes/rainbow_rune");
        $form->addButton("§l§bZAP RUNE\n§9»» §r§6Tap To View", 0, "textures/items/runes/zap_rune");
        $form->addButton("§l§bGOLDEN RUNE\n§9»» §r§6Tap To View", 0, "textures/items/runes/golden_rune");
        $form->addButton("§l§bSNOW RUNE\n§9»» §r§6Tap To View", 0, "textures/items/runes/snow_rune");
        $form->addButton("§l§aBACK\n§9»» §r§bTap To Go Back", 0, "textures/ui/icon_import");
        $sender->sendForm($form);
        return $form;
    }
}
