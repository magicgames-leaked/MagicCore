<?php

namespace Pushkar\MagicCore\forms;

use pocketmine\Server;
use jojoe77777\FormAPI\Form;
use dktapps\pmforms\FormIcon;
use dktapps\pmforms\MenuForm;
use pocketmine\player\Player;
use dktapps\pmforms\MenuOption;
use pocketmine\item\ItemFactory;
use Pushkar\MagicCore\MagicCore;
use pocketmine\item\VanillaItems;
use jojoe77777\FormAPI\SimpleForm;
use pocketmine\data\bedrock\EnchantmentIdMap;
use pocketmine\item\enchantment\EnchantmentInstance;
use DaPigGuy\PiggyCustomEnchants\PiggyCustomEnchants;
use DaPigGuy\PiggyCustomEnchants\CustomEnchantManager;
use pocketmine\item\enchantment\StringToEnchantmentParser;

class ItemsForm extends MenuForm
{
    private EnchantmentInstance $fakeEnchant;

    public function __construct()
    {
        /** @phpstan-ignore-next-line */
        $this->fakeEnchant = new EnchantmentInstance(EnchantmentIdMap::getInstance()->fromId(MagicCore::FAKE_ENCH_ID));

        parent::__construct("§l§6RECIPES BOOK", "§bUse Only Custom Crafting Table To Craft Things, Do /customtable", [
            new MenuOption("§l§eMINION RECIPES\n§9»» §r§6Tap To Open", new FormIcon("https://cdn-icons-png.flaticon.com/128/891/891978.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("§l§eARMOR RECIPES\n§9»» §r§6Tap To Open", new FormIcon("https://cdn-icons-png.flaticon.com/128/361/361761.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("§l§eSWORD RECIPES\n§9»» §r§6Tap To Open", new FormIcon("https://cdn-icons-png.flaticon.com/128/2466/2466942.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("§l§eAXE RECIPES\n§9»» §r§6Tap To Open", new FormIcon("https://cdn-icons-png.flaticon.com/128/6769/6769130.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("§l§ePICKAXE RECIPES\n§9»» §r§6Tap To Open", new FormIcon("https://i.imgur.com/l4cLq8v.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("§l§eITEMS RECIPES\n§9»» §r§6Tap To Open", new FormIcon("https://cdn-icons-png.flaticon.com/128/487/487551.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("§l§eENCHANTED ITEMS\n§9»» §r§6Tap To Open", new FormIcon("https://cdn-icons-png.flaticon.com/128/3556/3556661.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("§l§eFOOD RECIPES\n§9»» §r§6Tap To Open", new FormIcon("https://cdn-icons-png.flaticon.com/128/2921/2921822.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("§l§eHOE RECIPES\n§9»» §r§6Tap To Open", new FormIcon("https://cdn-icons-png.flaticon.com/128/521/521021.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("§l§eWAND RECIPES\n§9»» §r§6Tap To Open", new FormIcon("https://cdn-icons-png.flaticon.com/128/3204/3204021.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("§l§eTALISMAN\n§9»» §r§6Tap To Open", new FormIcon("https://cdn-icons-png.flaticon.com/128/1625/1625674.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("§l§eORE GENERATOR\n§9»» §r§6Tap To Open", new FormIcon("https://cdn-icons-png.flaticon.com/128/4831/4831062.png", FormIcon::IMAGE_TYPE_URL)),
            new MenuOption("§l§cClose\n§9»» §r§cTap To Close", new FormIcon("textures/blocks/obsidian", FormIcon::IMAGE_TYPE_PATH))
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
                    $this->items($sender);
                    break;

                case 6:
                    $this->eblocks($sender);
                    break;

                case 7:
                    $this->food($sender);
                    break;

                case 8:
                    $this->hoe($sender);
                    break;

                case 9:
                    $this->rune($sender);
                    break;

                case 10:
                    $sender->sendTitle("§r§l§eCOMMING SOON");
                    break;

                case 11:
                    $this->ore($sender);
                    break;

                case 12:
                    break;
            }
        });
    }

    public function minions(Player $sender): Form
    {
        $form = new SimpleForm(function (Player $sender, int $data = null) {
            if ($data === null) {
                return;
            }
            switch ($data) {
                case 0:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view minion");
                    break;

                case 1:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view minion");
                    break;

                case 2:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view minion");
                    break;

                case 3:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view minion");
                    break;

                case 4:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view minion");
                    break;

                case 5:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view minion");
                    break;

                case 6:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view minion");
                    break;

                case 7:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view minion");
                    break;

                case 8:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view minion");
                    break;

                case 9:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view minion");
                    break;

                case 10:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view minion");
                    break;

                case 11:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view minion");
                    break;

                case 12:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view minion");
                    break;

                case 13:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view minion");
                    break;

                case 14:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view minion");
                    break;

                case 15:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view minion");
                    break;

                case 16:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view minion");
                    break;

                case 17:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view minion");
                    break;

                case 18:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view minion");
                    break;

                case 19:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view minion");
                    break;

                case 20:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view minion");
                    break;

                case 21:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view minion");
                    break;

                case 22:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view minion");
                    break;

                case 23:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view minion");
                    break;

                case 24:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view minion");
                    break;

                case 25:
                    $sender->sendForm(new ItemsForm());
                    break;
            }
        });
        $form->setTitle("§l§6MINION RECIPES");
        $form->setContent("§dSelect The Which Minion Recipe You Want:");
        $form->addButton("§l§dCOBBLESTONE MINION\n§9»» §r§6Tap To View", 1, "https://cdn-icons-png.flaticon.com/128/891/891978.png");
        $form->addButton("§l§dCOAL MINION\n§9»» §r§6Tap To View", 1, "https://cdn-icons-png.flaticon.com/128/891/891978.png");
        $form->addButton("§l§dIRON MINION\n§9»» §r§6Tap To View", 1, "https://cdn-icons-png.flaticon.com/128/891/891978.png");
        $form->addButton("§l§dGOLD MINION\n§9»» §r§6Tap To View", 1, "https://cdn-icons-png.flaticon.com/128/891/891978.png");
        $form->addButton("§l§dLAPIS MINION\n§9»» §r§6Tap To View", 1, "https://cdn-icons-png.flaticon.com/128/891/891978.png");
        $form->addButton("§l§dREDSTONE MINION\n§9»» §r§6Tap To View", 1, "https://cdn-icons-png.flaticon.com/128/891/891978.png");
        $form->addButton("§l§dDIAMOND MINION\n§9»» §r§6Tap To View", 1, "https://cdn-icons-png.flaticon.com/128/891/891978.png");
        $form->addButton("§l§dEMERALD MINION\n§9»» §r§6Tap To View", 1, "https://cdn-icons-png.flaticon.com/128/891/891978.png");
        $form->addButton("§l§dNETHER QUARTZ MINION\n§9»» §r§6Tap To View", 1, "https://cdn-icons-png.flaticon.com/128/891/891978.png");
        $form->addButton("§l§dNETHERRACK MINION\n§9»» §r§6Tap To View", 1, "https://cdn-icons-png.flaticon.com/128/891/891978.png");
        $form->addButton("§l§dENDSTONE MINION\n§9»» §r§6Tap To View", 1, "https://cdn-icons-png.flaticon.com/128/891/891978.png");
        $form->addButton("§l§dWHEAT MINION\n§9»» §r§6Tap To View", 1, "https://cdn-icons-png.flaticon.com/128/891/891978.png");
        $form->addButton("§l§dCARROT MINION\n§9»» §r§6Tap To View", 1, "https://cdn-icons-png.flaticon.com/128/891/891978.png");
        $form->addButton("§l§dPOTATO MINION\n§9»» §r§6Tap To View", 1, "https://cdn-icons-png.flaticon.com/128/891/891978.png");
        $form->addButton("§l§dMELON MINION\n§9»» §r§6Tap To View", 1, "https://cdn-icons-png.flaticon.com/128/891/891978.png");
        $form->addButton("§l§dPUMPKIN MINION\n§9»» §r§6Tap To View", 1, "https://cdn-icons-png.flaticon.com/128/891/891978.png");
        $form->addButton("§l§dDIRT MINION\n§9»» §r§6Tap To View", 1, "https://cdn-icons-png.flaticon.com/128/891/891978.png");
        $form->addButton("§l§dSAND MINION\n§9»» §r§6Tap To View", 1, "https://cdn-icons-png.flaticon.com/128/891/891978.png");
        $form->addButton("§l§dOAK LOG MINION\n§9»» §r§6Tap To View", 1, "https://cdn-icons-png.flaticon.com/128/891/891978.png");
        $form->addButton("§l§dACACIA LOG MINION\n§9»» §r§6Tap To View", 1, "https://cdn-icons-png.flaticon.com/128/891/891978.png");
        $form->addButton("§l§dBIRCH LOG MINION\n§9»» §r§6Tap To View", 1, "https://cdn-icons-png.flaticon.com/128/891/891978.png");
        $form->addButton("§l§dSPRUCE LOG MINION\n§9»» §r§6Tap To View", 1, "https://cdn-icons-png.flaticon.com/128/891/891978.png");
        $form->addButton("§l§dJUNGLE LOG MINION\n§9»» §r§6Tap To View", 1, "https://cdn-icons-png.flaticon.com/128/891/891978.png");
        $form->addButton("§l§dDARK OAK MINION\n§9»» §r§6Tap To View", 1, "https://cdn-icons-png.flaticon.com/128/891/891978.png");
        $form->addButton("§l§dSNOW MINION\n§9»» §r§6Tap To View", 1, "https://cdn-icons-png.flaticon.com/128/891/891978.png");
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
            $ca = $sender->getName();
            switch ($data) {
                case 0:
                    Server::getInstance()->dispatchCommand($sender, "customarmor God full $ca");
                    break;

                case 1:
                    Server::getInstance()->dispatchCommand($sender, "customarmor Miner full $ca");
                    break;

                case 2:
                    Server::getInstance()->dispatchCommand($sender, "customarmor Farmer full $ca");
                    break;

                case 3:
                    Server::getInstance()->dispatchCommand($sender, "customarmor Lapis full $ca");
                    break;

                case 4:
                    Server::getInstance()->dispatchCommand($sender, "customarmor End full $ca");
                    break;

                case 5:
                    Server::getInstance()->dispatchCommand($sender, "customarmor Golem full $ca");
                    break;

                case 6:
                    Server::getInstance()->dispatchCommand($sender, "customarmor Pumpkin full $ca");
                    break;

                case 7:
                    Server::getInstance()->dispatchCommand($sender, "customarmor Nether full $ca");
                    break;

                case 8:
                    Server::getInstance()->dispatchCommand($sender, "customarmor Oak full $ca");
                    break;

                case 9:
                    Server::getInstance()->dispatchCommand($sender, "customarmor Ice full $ca");
                    break;

                case 10:
                    Server::getInstance()->dispatchCommand($sender, "customarmor Assassin full $ca");
                    break;

                case 11:
                    Server::getInstance()->dispatchCommand($sender, "customarmor Tank full $ca");
                    break;

                case 12:
                    Server::getInstance()->dispatchCommand($sender, "customarmor Wise full $ca");
                    break;

                case 13:
                    Server::getInstance()->dispatchCommand($sender, "customarmor Emerald full $ca");
                    break;

                case 14:
                    Server::getInstance()->dispatchCommand($sender, "customarmor Redstone full $ca");
                    break;

                case 15:
                    Server::getInstance()->dispatchCommand($sender, "customarmor Unstable full $ca");
                    break;

                case 16:
                    Server::getInstance()->dispatchCommand($sender, "customarmor Spider full $ca");
                    break;

                case 17:
                    Server::getInstance()->dispatchCommand($sender, "customarmor Digger full $ca");
                    break;

                case 18:
                    Server::getInstance()->dispatchCommand($sender, "customarmor Techno full $ca");
                    break;

                case 19:
                    Server::getInstance()->dispatchCommand($sender, "customarmor Liqued full $ca");
                    break;

                case 20:
                    Server::getInstance()->dispatchCommand($sender, "customarmor Piginity full $ca");
                    break;

                case 21:
                    Server::getInstance()->dispatchCommand($sender, "customarmor Frosved full $ca");
                    break;

                case 22:
                    Server::getInstance()->dispatchCommand($sender, "customarmor Fur full $ca");
                    break;

                case 23:
                    Server::getInstance()->dispatchCommand($sender, "customarmor Lucario full $ca");
                    break;

                case 24:
                    Server::getInstance()->dispatchCommand($sender, "customarmor Lucid full $ca");
                    break;

                case 25:
                    Server::getInstance()->dispatchCommand($sender, "customarmor Wise full $ca");
                    break;

                case 26:
                    Server::getInstance()->dispatchCommand($sender, "customarmor Magma full $ca");
                    break;

                case 27:
                    Server::getInstance()->dispatchCommand($sender, "customarmor Coal full $ca");
                    break;

                case 28:
                    Server::getInstance()->dispatchCommand($sender, "customarmor Superior full $ca");
                    break;

                case 29:
                    Server::getInstance()->dispatchCommand($sender, "customarmor Speeder full $ca");
                    break;
                case 20:
                    $sender->sendForm(new ItemsForm());
                    break;
            }
        });
        $form->setTitle("§l§6ARMOR RECIPES");
        $form->setContent("§dSelect The Which Armor Recipe You Want:");
        $form->addButton("§l§dGOD ARMOR\n§9»» §r§6Tap To Open", 1, "https://cdn-icons-png.flaticon.com/128/6010/6010434.png");
        $form->addButton("§l§dMINER ARMOR\n§9»» §r§6Tap To Open", 1, "https://cdn-icons-png.flaticon.com/128/6010/6010434.png");
        $form->addButton("§l§dFARMER ARMOR\n§9»» §r§6Tap To Open", 1, "https://cdn-icons-png.flaticon.com/128/6010/6010434.png");
        $form->addButton("§l§dLAPIS ARMOR\n§9»» §r§6Tap To Open", 1, "https://cdn-icons-png.flaticon.com/128/6010/6010434.png");
        $form->addButton("§l§dEND ARMOR\n§9»» §r§6Tap To Open", 1, "https://cdn-icons-png.flaticon.com/128/6010/6010434.png");
        $form->addButton("§l§dGOLEM ARMOR\n§9»» §r§6Tap To Open", 1, "https://cdn-icons-png.flaticon.com/128/6010/6010434.png");
        $form->addButton("§l§dPUMPKIN ARMOR\n§9»» §r§6Tap To Open", 1, "https://cdn-icons-png.flaticon.com/128/6010/6010434.png");
        $form->addButton("§l§dNETHER ARMOR\n§9»» §r§6Tap To Open", 1, "https://cdn-icons-png.flaticon.com/128/6010/6010434.png");
        $form->addButton("§l§dOAK ARMOR\n§9»» §r§6Tap To Open", 1, "https://cdn-icons-png.flaticon.com/128/6010/6010434.png");
        $form->addButton("§l§dICE ARMOR\n§9»» §r§6Tap To Open", 1, "https://cdn-icons-png.flaticon.com/128/6010/6010434.png");
        $form->addButton("§l§dASSASSIN ARMOR\n§9»» §r§6Tap To Open", 1, "https://cdn-icons-png.flaticon.com/128/6010/6010434.png");
        $form->addButton("§l§dTANK ARMOR\n§9»» §r§6Tap To Open", 1, "https://cdn-icons-png.flaticon.com/128/6010/6010434.png");
        $form->addButton("§l§dWISE ARMOR\n§9»» §r§6Tap To Open", 1, "https://cdn-icons-png.flaticon.com/128/6010/6010434.png");
        $form->addButton("§l§dEMERALD ARMOR\n§9»» §r§6Tap To Open", 1, "https://cdn-icons-png.flaticon.com/128/6010/6010434.png");
        $form->addButton("§l§dREDSTONE ARMOR\n§9»» §r§6Tap To Open", 1, "https://cdn-icons-png.flaticon.com/128/6010/6010434.png");
        $form->addButton("§l§dUNSTABLE ARMOR\n§9»» §r§6Tap To Open", 1, "https://cdn-icons-png.flaticon.com/128/6010/6010434.png");
        $form->addButton("§l§dSPIDER ARMOR\n§9»» §r§6Tap To Open", 1, "https://cdn-icons-png.flaticon.com/128/6010/6010434.png");
        $form->addButton("§l§dDIGGER ARMOR\n§9»» §r§6Tap To Open", 1, "https://cdn-icons-png.flaticon.com/128/6010/6010434.png");
        $form->addButton("§l§dTECHNO ARMOR\n§9»» §r§6Tap To Open", 1, "https://cdn-icons-png.flaticon.com/128/6010/6010434.png");
        $form->addButton("§l§dLIQUED ARMOR\n§9»» §r§6Tap To Open", 1, "https://cdn-icons-png.flaticon.com/128/6010/6010434.png");
        $form->addButton("§l§dPIGINITY ARMOR\n§9»» §r§6Tap To Open", 1, "https://cdn-icons-png.flaticon.com/128/6010/6010434.png");
        $form->addButton("§l§dFROSVED ARMOR\n§9»» §r§6Tap To Open", 1, "https://cdn-icons-png.flaticon.com/128/6010/6010434.png");
        $form->addButton("§l§dFUR ARMOR\n§9»» §r§6Tap To Open", 1, "https://cdn-icons-png.flaticon.com/128/6010/6010434.png");
        $form->addButton("§l§dLUCARIO ARMOR\n§9»» §r§6Tap To Open", 1, "https://cdn-icons-png.flaticon.com/128/6010/6010434.png");
        $form->addButton("§l§dLUCID ARMOR\n§9»» §r§6Tap To Open", 1, "https://cdn-icons-png.flaticon.com/128/6010/6010434.png");
        $form->addButton("§l§dWISE ARMOR\n§9»» §r§6Tap To Open", 1, "https://cdn-icons-png.flaticon.com/128/6010/6010434.png");
        $form->addButton("§l§dMAGMA ARMOR\n§9»» §r§6Tap To Open", 1, "https://cdn-icons-png.flaticon.com/128/6010/6010434.png");
        $form->addButton("§l§dCOAL ARMOR\n§9»» §r§6Tap To Open", 1, "https://cdn-icons-png.flaticon.com/128/6010/6010434.png");
        $form->addButton("§l§dSUPERIOR ARMOR\n§9»» §r§6Tap To Open", 1, "https://cdn-icons-png.flaticon.com/128/6010/6010434.png");
        $form->addButton("§l§dSPEEDER ARMOR\n§9»» §r§6Tap To Open", 1, "https://cdn-icons-png.flaticon.com/128/6010/6010434.png");
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
                    $item = ItemFactory::getInstance()->get(4, 0, 64);
                    $item->addEnchantment($this->fakeEnchant);
                    $item->getNamedTag()->setString("enchantedblock", "cobble");
                    $item->setCustomName("§r§eEnchanted Cobblestone\n§7Use It To Craft Minion And Custom Armor\n\n§d§lUNCOMMON");
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;

                case 1:
                    $item = ItemFactory::getInstance()->get(263, 0, 64);
                    $item->addEnchantment($this->fakeEnchant);
                    $item->getNamedTag()->setString("enchanteditem", "coal");
                    $item->setCustomName("§r§eEnchanted Coal\n§7Use It To Craft Minion And Custom Armor\n\n§l§9RARE");
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;

                case 2:
                    $item = ItemFactory::getInstance()->get(265, 0, 64);
                    $item->addEnchantment($this->fakeEnchant);
                    $item->getNamedTag()->setString("enchanteditem", "iron");
                    $item->setCustomName("§r§eEnchanted Iron\n§7Use It To Craft Minion And Custom Armor\n\n§l§9RARE");
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;

                case 3:
                    $item = ItemFactory::getInstance()->get(266, 0, 64);
                    $item->addEnchantment($this->fakeEnchant);
                    $item->getNamedTag()->setString("enchanteditem", "gold");
                    $item->setCustomName("§r§eEnchanted Gold\n§7Use It To Craft Minion And Custom Armor\n\n§l§9RARE");
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;

                case 4:
                    $item = ItemFactory::getInstance()->get(351, 4, 64);
                    $item->addEnchantment($this->fakeEnchant);
                    $item->getNamedTag()->setString("enchanteditem", "lapis");
                    $item->setCustomName("§r§eEnchanted Lapis\n§7Use It To Craft Minion And Custom Armor\n\n§l§9RARE");
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;

                case 5:
                    $item = ItemFactory::getInstance()->get(331, 0, 64);
                    $item->addEnchantment($this->fakeEnchant);
                    $item->getNamedTag()->setString("enchanteditem", "redstone");
                    $item->setCustomName("§r§eEnchanted Redstone\n§7Use It To Craft Minion And Custom Armor\n\n§l§9RARE");
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;

                case 6:
                    $item = ItemFactory::getInstance()->get(264, 0, 64);
                    $item->addEnchantment($this->fakeEnchant);
                    $item->getNamedTag()->setString("enchanteditem", "diamond");
                    $item->setCustomName("§r§eEnchanted Diamond\n§7Use It To Craft Minion And Custom Armor\n\n§l§9RARE");
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;

                case 7:
                    $item = ItemFactory::getInstance()->get(388, 0, 64);
                    $item->addEnchantment($this->fakeEnchant);
                    $item->getNamedTag()->setString("enchanteditem", "emerald");
                    $item->setCustomName("§r§eEnchanted Emerald\n§7Use It To Craft Minion And Custom Armor\n\n§l§9RARE");
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;

                case 8:
                    $item = ItemFactory::getInstance()->get(406, 0, 64);
                    $item->addEnchantment($this->fakeEnchant);
                    $item->getNamedTag()->setString("enchanteditem", "quartz");
                    $item->setCustomName("§r§eEnchanted Quartz\n§7Use It To Craft Minion And Custom Armor\n\n§l§9RARE");
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;

                case 9:
                    $item = ItemFactory::getInstance()->get(87, 0, 64);
                    $item->addEnchantment($this->fakeEnchant);
                    $item->getNamedTag()->setString("enchantedblock", "netherrack");
                    $item->setCustomName("§r§eEnchanted Netherack\n§7Use It To Craft Minion And Custom Armor\n\n§9§lEPIC");
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;

                case 10:
                    $item = ItemFactory::getInstance()->get(121, 0, 64);
                    $item->addEnchantment($this->fakeEnchant);
                    $item->getNamedTag()->setString("enchantedblock", "endstone");
                    $item->setCustomName("§r§eEnchanted End Stone\n§7Use It To Craft Minion And Custom Armor\n\n§9§lEPIC");
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;

                case 11:
                    $item = ItemFactory::getInstance()->get(296, 0, 64);
                    $item->addEnchantment($this->fakeEnchant);
                    $item->getNamedTag()->setString("enchanteditem", "wheat");
                    $item->setCustomName("§r§eEnchanted Wheat\n§7Use It To Craft Minion And Custom Armor\n\n§d§lEPIC");
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;

                case 12:
                    $item = ItemFactory::getInstance()->get(391, 0, 64);
                    $item->addEnchantment($this->fakeEnchant);
                    $item->getNamedTag()->setString("enchantedblock", "carrot");
                    $item->setCustomName("§r§eEnchanted Carrot\n§7Use It To Craft Minion And Custom Armor\n\n§d§lEPIC");
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;

                case 13:
                    $item = ItemFactory::getInstance()->get(392, 0, 64);
                    $item->addEnchantment($this->fakeEnchant);
                    $item->getNamedTag()->setString("enchantedblock", "potato");
                    $item->setCustomName("§r§eEnchanted Potato\n§7Use It To Craft Minion And Custom Armor\n\n§d§lEPIC");
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;


                case 14:
                    $item = ItemFactory::getInstance()->get(103, 0, 64);
                    $item->addEnchantment($this->fakeEnchant);
                    $item->getNamedTag()->setString("enchantedblock", "melon");
                    $item->setCustomName("§r§eEnchanted Melon\n§7Use It To Craft Minion And Custom Armor\n\n§d§lEPIC");
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;

                case 15:
                    $item = ItemFactory::getInstance()->get(86, 0, 64);
                    $item->addEnchantment($this->fakeEnchant);
                    $item->getNamedTag()->setString("enchantedblock", "pumpkin");
                    $item->setCustomName("§r§eEnchanted Pumpkin\n§7Use It To Craft Minion And Custom Armor\n\n§d§lEPIC");
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;

                case 16:
                    $item = ItemFactory::getInstance()->get(3, 0, 64);
                    $item->addEnchantment($this->fakeEnchant);
                    $item->getNamedTag()->setString("enchantedblock", "dirt");
                    $item->setCustomName("§r§eEnchanted Dirt Block\n§7Use It To Craft Minion And Custom Armor\n\n§d§lEPIC");
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;

                case 17:
                    $item = ItemFactory::getInstance()->get(12, 0, 64);
                    $item->addEnchantment($this->fakeEnchant);
                    $item->getNamedTag()->setString("enchantedblock", "sand");
                    $item->setCustomName("§r§eEnchanted Sand Block\n§7Use It To Craft Minion And Custom Armor\n\n§d§lEPIC");
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;

                case 18:
                    $item = ItemFactory::getInstance()->get(17, 0, 64);
                    $item->addEnchantment($this->fakeEnchant);
                    $item->getNamedTag()->setString("enchantedblock", "oak");
                    $item->setCustomName("§r§eEnchanted Oak Logs\n§7Use It To Craft Minion And Custom Armor\n\n§d§lEPIC");
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;

                case 19:
                    $item = ItemFactory::getInstance()->get(162, 0, 64);
                    $item->addEnchantment($this->fakeEnchant);
                    $item->getNamedTag()->setString("enchantedblock", "acacia");
                    $item->setCustomName("§r§eEnchanted Acacia Log\n§7Use It To Craft Minion And Custom Armor\n\n§d§lEPIC");
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;

                case 20:
                    $item = ItemFactory::getInstance()->get(17, 2, 64);
                    $item->addEnchantment($this->fakeEnchant);
                    $item->getNamedTag()->setString("enchantedblock", "birch");
                    $item->setCustomName("§r§eEnchanted Birch Log\n§7Use It To Craft Minion And Custom Armor\n\n§d§lEPIC");
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;


                case 21:
                    $item = ItemFactory::getInstance()->get(17, 1, 64);
                    $item->addEnchantment($this->fakeEnchant);
                    $item->getNamedTag()->setString("enchantedblock", "spruce");
                    $item->setCustomName("§r§eEnchanted Spruce Log\n§7Use It To Craft Minion And Custom Armor\n\n§d§lEPIC");
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;

                case 22:
                    $item = ItemFactory::getInstance()->get(17, 3, 64);
                    $item->addEnchantment($this->fakeEnchant);
                    $item->getNamedTag()->setString("enchantedblock", "junglelog");
                    $item->setCustomName("§r§eEnchanted Jungle Log\n§7Use It To Craft Minion And Custom Armor\n\n§d§lEPIC");
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;

                case 23:
                    $item = ItemFactory::getInstance()->get(162, 1, 64);
                    $item->addEnchantment($this->fakeEnchant);
                    $item->getNamedTag()->setString("enchantedblock", "darkoak");
                    $item->setCustomName("§r§eEnchanted Dark Oak Log\n§7Use It To Craft Minion And Custom Armor\n\n§d§lEPIC");
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;


                case 24:
                    $item = ItemFactory::getInstance()->get(363, 0, 64);
                    $item->addEnchantment($this->fakeEnchant);
                    $item->getNamedTag()->setString("enchantedfood", "steak");
                    $item->setCustomName("§r§eEnchanted Steak\n§7Use It To Craft Minion And Custom Armor\n\n§d§lEPIC");
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;

                case 25:
                    $item = ItemFactory::getInstance()->get(365, 0, 64);
                    $item->addEnchantment($this->fakeEnchant);
                    $item->getNamedTag()->setString("enchantedfood", "chicken");
                    $item->setCustomName("§r§eEnchanted Chicken\n§7Use It To Craft Minion And Custom Armor\n\n§d§lEPIC");
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;

                case 26:
                    $item = ItemFactory::getInstance()->get(423, 0, 64);
                    $item->addEnchantment($this->fakeEnchant);
                    $item->getNamedTag()->setString("enchantedfood", "mutton");
                    $item->setCustomName("§r§eEnchanted Mutton\n§7Use It To Craft Minion And Custom Armor\n\n§d§lEPIC");
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;

                case 27:
                    $item = ItemFactory::getInstance()->get(80, 0, 64);
                    $item->addEnchantment($this->fakeEnchant);
                    $item->getNamedTag()->setString("enchantedblock", "snow");
                    $item->setCustomName("§r§eEnchanted Snow Block\n§7Use It To Craft Minion And Custom Armor\n\n§d§lEPIC");
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;

                case 28:
                    $sender->sendForm(new ItemsForm());
                    break;
            }
        });
        $form->setTitle("§l§6ENCHANTED BLOCKS RECIPES");
        $form->setContent("§dSelect The Which Enchanted Item Recipe You Want:");
        $form->addButton("§l§dENCHANTED COBBLESTONE\n§9»» §r§6Tap To View", 0, "textures/blocks/cobblestone");
        $form->addButton("§l§dENCHANTED COAL\n§9»» §r§6Tap To View", 0, "textures/items/coal");
        $form->addButton("§l§dENCHANTED IRON\n§9»» §r§6Tap To View", 0, "textures/items/iron_ingot");
        $form->addButton("§l§dENCHANTED GOLD\n§9»» §r§6Tap To View", 0, "textures/items/gold_ingot");
        $form->addButton("§l§dENCHANTED LAPIS\n§9»» §r§6Tap To View", 0, "textures/items/dye_powder_blue");
        $form->addButton("§l§dENCHANTED REDSTONE\n§9»» §r§6Tap To View", 0, "textures/items/redstone_dust");
        $form->addButton("§l§dENCHANTED DIAMOND\n§9»» §r§6Tap To View", 0, "textures/items/diamond");
        $form->addButton("§l§dENCHANTED EMERALD\n§9»» §r§6Tap To View", 0, "textures/items/emerald");
        $form->addButton("§l§dENCHANTED NETHER QUARTZ\n§9»» §r§6Tap To View", 0, "textures/items/quartz");
        $form->addButton("§l§dENCHANTED NETHERRACK\n§9»» §r§6Tap To View", 0, "textures/blocks/netherrack");
        $form->addButton("§l§dENCHANTED ENDSTONE\n§9»» §r§6Tap To View", 0, "textures/blocks/end_stone");
        $form->addButton("§l§dENCHANTED WHEAT\n§9»» §r§6Tap To View", 0, "textures/items/wheat");
        $form->addButton("§l§dENCHANTED CARROT\n§9»» §r§6Tap To View", 0, "textures/items/carrot");
        $form->addButton("§l§dENCHANTED POTATO\n§9»» §r§6Tap To View", 0, "textures/items/potato");
        $form->addButton("§l§dENCHANTED MELON\n§9»» §r§6Tap To View", 0, "textures/blocks/melon_side");
        $form->addButton("§l§dENCHANTED PUMPKIN\n§9»» §r§6Tap To View", 0, "textures/blocks/pumpkin_side");
        $form->addButton("§l§dENCHANTED DIRT\n§9»» §r§6Tap To View", 0, "textures/blocks/dirt");
        $form->addButton("§l§dENCHANTED SAND\n§9»» §r§6Tap To View", 0, "textures/blocks/sand");
        $form->addButton("§l§dENCHANTED OAK LOG\n§9»» §r§6Tap To View", 0, "textures/blocks/log_oak");
        $form->addButton("§l§dENCHANTED ACACIA LOG\n§9»» §r§6Tap To View", 0, "textures/blocks/log_acacia");
        $form->addButton("§l§dENCHANTED BIRCH LOG\n§9»» §r§6Tap To View", 0, "textures/blocks/log_birch");
        $form->addButton("§l§dENCHANTED SPRUCE LOG\n§9»» §r§6Tap To View", 0, "textures/blocks/log_spruce");
        $form->addButton("§l§dENCHANTED JUNGLE LOG\n§9»» §r§6Tap To View", 0, "textures/blocks/log_jungle");
        $form->addButton("§l§dENCHANTED DARK OAK LOG\n§9»» §r§6Tap To View", 0, "textures/blocks/log_big_oak");
        $form->addButton("§l§dENCHANTED STEAK\n§9»» §r§6Tap To View", 0, "textures/items/beef_cooked");
        $form->addButton("§l§dENCHANTED CHICKEN\n§9»» §r§6Tap To View", 0, "textures/items/chicken_cooked");
        $form->addButton("§l§dENCHANTED MUTTON\n§9»» §r§6Tap To View", 0, "textures/items/mutton_cooked");
        $form->addButton("§l§dENCHANTED SNOW\n§9»» §r§6Tap To View", 0, "textures/blocks/snow");
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
                    Server::getInstance()->dispatchCommand($sender, "invcraft view minion");
                    break;

                case 1:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view minion");
                    break;

                case 2:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view minion");
                    break;

                case 3:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view minion");
                    break;

                case 4:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view minion");
                    break;

                case 5:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view minion");
                    break;

                case 6:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view minion");
                    break;

                case 7:
                    $sender->sendForm(new ItemsForm());
                    break;
            }
        });
        $form->setTitle("§l§6ORE SPAWNER RECIPES");
        $form->setContent("§bSelect The Which Ore Spawner Recipe You Want:");
        $form->addButton("§l§dCOAL SPAWNER\n§9»» §r§6Tap To View", 0, "textures/items/coal");
        $form->addButton("§l§dIRON SPAWNER\n§9»» §r§6Tap To View", 0, "textures/items/iron_ingot");
        $form->addButton("§l§dGOLD SPAWNER\n§9»» §r§6Tap To View", 0, "textures/items/gold_ingot");
        $form->addButton("§l§dLAPIS SPAWNER\n§9»» §r§6Tap To View", 0, "textures/items/dye_powder_blue");
        $form->addButton("§l§dREDSTONE SPAWNER\n§9»» §r§6Tap To View", 0, "textures/items/redstone_dust");
        $form->addButton("§l§dDIAMOND SPAWNER\n§9»» §r§6Tap To View", 0, "textures/items/diamond");
        $form->addButton("§l§dEMERALD SPAWNER\n§9»» §r§6Tap To View", 0, "textures/items/emerald");
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

            $enchantmentData = [];
            switch ($data) {
                case 0:
                    $item = ItemFactory::getInstance()->get(1038, 0, 1);
                    $item->addEnchantment($this->fakeEnchant);
                    $item->setCustomName("§l§6ASPECT OF THE END");
                    $item->setLore(["§r§8+§c  40 Damage\n\n§r§eItem Ability: Teleporting §l§eRIGHT CLICK§r\n§r§bRight Click To Teleport In\n§r§bClicked Block Like A Enderman.\n§r§eCooldown: §f5 seconds\n\n§r§l§9RARE"]);
                    $item->getNamedTag()->setString("aspect_of_the_end", "sword");
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;
                case 1:
                    $item = ItemFactory::getInstance()->get(1039, 0, 1);
                    $item->addEnchantment($this->fakeEnchant);
                    $item->setCustomName("§l§6ELUCIDATOR");
                    $item->setLore(["§r§8+§c  30 Damage\n\n§r§eItem Ability: Auto Pickup §l§eRIGHT CLICK§r\n§rIf You Kill Any Mob Item Drop Will\n§rAutomatically Come In Your Inventory\n\n§r§l§dRARE"]);
                    $item->getNamedTag()->setString("elucidator", "sword");
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;
                case 2:
                    $item = ItemFactory::getInstance()->get(1041, 0, 1);
                    $item->addEnchantment($this->fakeEnchant);
                    $item->setCustomName("§l§6GOLEM SWORD");
                    $item->setLore(["§r§8+§c  55 Damage\n\n§r§eItem Ability: Explosion §l§eRIGHT CLICK§r\n§rRight Click To Explosion\n§r§eCooldown: §f5 seconds\n\n§r§l§dRARE"]);
                    $item->getNamedTag()->setString("golem_sword", "sword");
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;
                case 3:
                    $item = ItemFactory::getInstance()->get(1042, 0, 1);
                    $item->addEnchantment($this->fakeEnchant);
                    $item->setCustomName("§l§6LEAPING SWORD");
                    $item->setLore(["§r§8+§c  12 Damage\n\n§r§eItem Ability: Leaping §l§eRIGHT CLICK§r\n§rRight Click To Get Jump Boost Like A Rabbit\n§r§eCooldown: §f5 seconds\n\n§r§l§dRARE"]);
                    $item->getNamedTag()->setString("leaping_sword", "sword");
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;
                case 4:
                    $item = ItemFactory::getInstance()->get(1043, 0, 1);
                    $item->addEnchantment($this->fakeEnchant);
                    $item->setCustomName("§l§6MIDAS SWORD");
                    $item->setLore(["§r§8+§c  60 Damage\n\n§r§l§dRARE"]);
                    $item->getNamedTag()->setString("midas_sword", "sword");
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;
                case 5:
                    $item = ItemFactory::getInstance()->get(1044, 0, 1);
                    $item->addEnchantment($this->fakeEnchant);
                    $item->setCustomName("§l§6POOCH SWORD");
                    $item->setLore(["§r§8+§c  30 Damage\n\n§r§l§dRARE"]);
                    $item->getNamedTag()->setString("pooch_sword", "sword");
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;
                case 6:
                    $item = ItemFactory::getInstance()->get(1047, 0, 1);
                    $enchantmentData["name"] = "smelting";
                    $enchantmentData["level"] = 1;
                    $enchantment = StringToEnchantmentParser::getInstance()->parse($enchantmentData["name"]) ?? ((($plugin = Server::getInstance()->getPluginManager()->getPlugin("PiggyCustomEnchants")) instanceof PiggyCustomEnchants && $plugin->isEnabled()) ? CustomEnchantManager::getEnchantmentByName($enchantmentData["name"]) : null);
                    if ($enchantment !== null) $item->addEnchantment(new EnchantmentInstance($enchantment, $enchantmentData["level"]));
                    $item->setCustomName("§l§6ROGUE SWORD");
                    $item->setLore(["§r§8+§c  70 Damage\n\n§r§eItem Ability: Auto Smelt §l§eRIGHT CLICK§r\n§rAutomatically Smealt Item When Kill Any Mob\n\n§r§l§dRARE"]);
                    $item->getNamedTag()->setString("rogue_sword", "sword");
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;
                case 7:
                    $item = ItemFactory::getInstance()->get(1048, 0, 1);
                    $item->addEnchantment($this->fakeEnchant);
                    $item->setCustomName("§l§6SHAMAN SWORD");
                    $item->setLore(["§r§8+§c  100 Damage\n\n§r§l§dRARE"]);
                    $item->getNamedTag()->setString("shaman_sword", "sword");
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;
                case 8:
                    $item = ItemFactory::getInstance()->get(1049, 0, 1);
                    $item->addEnchantment($this->fakeEnchant);
                    $item->setCustomName("§l§6SILVER FANG");
                    $item->setLore(["§r§8+§c  5 Damage\n\n§r§l§aUNCOMMON"]);
                    $item->getNamedTag()->setString("silver_fang", "sword");
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;
                case 9:
                    $item = ItemFactory::getInstance()->get(1050, 0, 1);
                    $item->addEnchantment($this->fakeEnchant);
                    $item->setCustomName("§l§6SPIRIT SWORD");
                    $item->setLore(["§r§8+§c  60 Damage\n\n§r§l§dRARE"]);
                    $item->getNamedTag()->setString("spirit_sword", "sword");
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;
                case 10:
                    $item = ItemFactory::getInstance()->get(1037, 0, 1);
                    $item->addEnchantment($this->fakeEnchant);
                    $item->setCustomName("§l§6TACTICIAN SWORD");
                    $item->setLore(["§r§8+§c  70 Damage\n\n§r§l§dRARE"]);
                    $item->getNamedTag()->setString("tactician_sword", "sword");
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;
                case 11:
                    $item = ItemFactory::getInstance()->get(1051, 0, 1);
                    $item->addEnchantment($this->fakeEnchant);
                    $item->setCustomName("§l§6THICK TACTICIAN SWORD");
                    $item->setLore(["§r§8+§c  90 Damage\n\n§r§l§dRARE"]);
                    $item->getNamedTag()->setString("thick_tactician_sword", "sword");
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;
                case 12:
                    $item = ItemFactory::getInstance()->get(1052, 0, 1);
                    $item->addEnchantment($this->fakeEnchant);
                    $item->setCustomName("§l§6YETI SWORD");
                    $item->setLore(["§r§8+§c  60 Damage\n\n§r§l§dRARE"]);
                    $item->getNamedTag()->setString("yeti_sword", "sword");
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;
                case 13:
                    $item = ItemFactory::getInstance()->get(1053, 0, 1);
                    $item->addEnchantment($this->fakeEnchant);
                    $item->setCustomName("§l§6ZOMBIE SWORD");
                    $item->setLore(["§r§8+§c  80 Damage\n\n§r§l§dRARE"]);
                    $item->getNamedTag()->setString("zombie_sword", "sword");
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;
                case 14:
                    $sender->sendForm(new ItemsForm());
                    break;
            }
        });
        $form->setTitle("§l§6CUSTOM SWORD RECIPES");
        $form->setContent("§bSelect The Recipe You Want To Craft:");
        $form->addButton("§l§dASPECT OF THE END\n§9»» §r§6Tap To View", 0, "textures/items/sword/aspect_of_the_end");
        $form->addButton("§l§dELUCIDATOR\n§9»» §r§6Tap To View", 0, "textures/items/sword/elucidator");
        $form->addButton("§l§dGOLEM SWORD\n§9»» §r§6Tap To View", 0, "textures/items/sword/golem_sword");
        $form->addButton("§l§dLEAPING SWORD\n§9»» §r§6Tap To View", 0, "textures/items/sword/leaping_sword");
        $form->addButton("§l§dMIDAS SWORD\n§9»» §r§6Tap To View", 0, "textures/items/sword/midas_sword");
        $form->addButton("§l§dPOOCH SWORD\n§9»» §r§6Tap To View", 0, "textures/items/sword/pooch_sword");
        $form->addButton("§l§dROGUE SWORD\n§9»» §r§6Tap To View", 0, "textures/items/sword/rogue_sword");
        $form->addButton("§l§dSHAMAN SWORD\n§9»» §r§6Tap To View", 0, "textures/items/sword/shaman_sword");
        $form->addButton("§l§dSILVER FANG\n§9»» §r§6Tap To View", 0, "textures/items/sword/silver_fang");
        $form->addButton("§l§dSPIRIT SWORD\n§9»» §r§6Tap To View", 0, "textures/items/sword/spirit_sword");
        $form->addButton("§l§dTACTICIAN SWORD\n§9»» §r§6Tap To View", 0, "textures/items/sword/tactician_sword");
        $form->addButton("§l§dTHICK TACTICIAN SWORD\n§9»» §r§6Tap To View", 0, "textures/items/sword/thick_tactician_sword");
        $form->addButton("§l§dYETI SWORD\n§9»» §r§6Tap To View", 0, "textures/items/sword/yeti_sword");
        $form->addButton("§l§dZOMBIE SWORD\n§9»» §r§6Tap To View", 0, "textures/items/sword/zombie_sword");
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

            $enchantmentData = [];
            switch ($data) {
                case 0:
                    $item = ItemFactory::getInstance()->get(1040, 0, 1);
                    $item->addEnchantment($this->fakeEnchant);
                    $item->setCustomName("§l§6FROZEN SCYTHE");
                    $item->setLore(["§r§8+§c  30 Efficiency\n\n§r§l§dRARE"]);
                    $item->getNamedTag()->setString("frozen_scythe", "axe");
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;
                case 1:
                    $item = ItemFactory::getInstance()->get(1085, 0, 1);
                    $enchantmentData["name"] = "lumberjack";
                    $enchantmentData["level"] = 1;
                    $enchantment = StringToEnchantmentParser::getInstance()->parse($enchantmentData["name"]) ?? ((($plugin = Server::getInstance()->getPluginManager()->getPlugin("PiggyCustomEnchants")) instanceof PiggyCustomEnchants && $plugin->isEnabled()) ? CustomEnchantManager::getEnchantmentByName($enchantmentData["name"]) : null);
                    if ($enchantment !== null) $item->addEnchantment(new EnchantmentInstance($enchantment, $enchantmentData["level"]));
                    $item->setCustomName("§l§6JUNGLE AXE");
                    $item->setLore(["§r§8+§c  8 Efficiency\n\n§r§eItem Ability: Break Connected Log §l§eRIGHT CLICK§r\n§rSneak And Breaks All Logs Connected To Each Other\n\n§r§l§dRARE"]);
                    $item->getNamedTag()->setString("jungle_axe", "axe");
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;
                case 2:
                    $item = ItemFactory::getInstance()->get(1086, 0, 1);
                    $item->addEnchantment($this->fakeEnchant);
                    $item->setCustomName("§l§6MUSHROOM COW AXE");
                    $item->setLore(["§r§8+§c  12 Efficiency\n\n§r§l§dRARE"]);
                    $item->getNamedTag()->setString("mushroom_cow_axe", "axe");
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;
                case 3:
                    $item = ItemFactory::getInstance()->get(1045, 0, 1);
                    $item->addEnchantment($this->fakeEnchant);
                    $item->setCustomName("§l§6PROMISING AXE");
                    $item->setLore(["§r§8+§c  15 Efficiency\n\n§r§l§dRARE"]);
                    $item->getNamedTag()->setString("promising_axe", "axe");
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;
                case 4:
                    $item = ItemFactory::getInstance()->get(1046, 0, 1);
                    $item->addEnchantment($this->fakeEnchant);
                    $item->setCustomName("§l§6RAIDER AXE");
                    $item->setLore(["§r§8+§c  20 Efficiency\n\n§r§l§dRARE"]);
                    $item->getNamedTag()->setString("raider_axe", "axe");
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;
                case 5:
                    $item = ItemFactory::getInstance()->get(1087, 0, 1);
                    $item->addEnchantment($this->fakeEnchant);
                    $item->setCustomName("§l§6SCULPTOR AXE");
                    $item->setLore(["§r§8+§c  18 Efficiency\n\n§r§l§dRARE"]);
                    $item->getNamedTag()->setString("sculptor_axe", "axe");
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;
                case 6:
                    $sender->sendForm(new ItemsForm());
                    break;
            }
        });
        $form->setTitle("§l§6CUSTOM AXE RECIPES");
        $form->setContent("§bSelect The Recipe You Want To Craft:");
        $form->addButton("§l§dFROZEN SCYTHE\n§9»» §r§6Tap To View", 0, "textures/items/axe/frozen_scythe");
        $form->addButton("§l§dJUNGLE AXE\n§9»» §r§6Tap To View", 0, "textures/items/axe/jungle_axe");
        $form->addButton("§l§dMUSHROOM AXE\n§9»» §r§6Tap To View", 0, "textures/items/axe/mushroom_cow_axe");
        $form->addButton("§l§dPROMISING AXE\n§9»» §r§6Tap To View", 0, "textures/items/axe/promising_axe");
        $form->addButton("§l§dRAIDER AXE\n§9»» §r§6Tap To View", 0, "textures/items/axe/raider_axe");
        $form->addButton("§l§dSCULPTOR AXE\n§9»» §r§6Tap To View", 0, "textures/items/axe/sculptor_axe");
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

            $enchantmentData = [];
            switch ($data) {
                case 0:
                    $item = ItemFactory::getInstance()->get(1088, 0, 1);
                    $enchantmentData["name"] = "farmer";
                    $enchantmentData["level"] = 1;
                    $enchantment = StringToEnchantmentParser::getInstance()->parse($enchantmentData["name"]) ?? ((($plugin = Server::getInstance()->getPluginManager()->getPlugin("PiggyCustomEnchants")) instanceof PiggyCustomEnchants && $plugin->isEnabled()) ? CustomEnchantManager::getEnchantmentByName($enchantmentData["name"]) : null);
                    if ($enchantment !== null) $item->addEnchantment(new EnchantmentInstance($enchantment, $enchantmentData["level"]));
                    $item->setCustomName("§l§6HOE OF TILLING");
                    $item->setLore(["§r§8+§c  12 Efficiency\n\n§r§eItem Ability: Farmer §l§eRIGHT CLICK§r\n§rAutomatically replaces seeds when crop is broken.\n\n§r§l§dRARE"]);
                    $item->getNamedTag()->setString("hoe_of_tilling", "hoe");
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;
                case 1:
                    $item = ItemFactory::getInstance()->get(1089, 0, 1);
                    $enchantmentData["name"] = "fertilizer";
                    $enchantmentData["level"] = 1;
                    $enchantment = StringToEnchantmentParser::getInstance()->parse($enchantmentData["name"]) ?? ((($plugin = Server::getInstance()->getPluginManager()->getPlugin("PiggyCustomEnchants")) instanceof PiggyCustomEnchants && $plugin->isEnabled()) ? CustomEnchantManager::getEnchantmentByName($enchantmentData["name"]) : null);
                    if ($enchantment !== null) $item->addEnchantment(new EnchantmentInstance($enchantment, $enchantmentData["level"]));
                    $item->setCustomName("§l§6HOE OF FERTILIZER");
                    $item->setLore(["§r§8+§c  12 Efficiency\n\n§r§eItem Ability: Fertilizer §l§eRIGHT CLICK§r\n§rAutomatically Tile 5x5 At Once\n\n§r§l§dRARE"]);
                    $item->getNamedTag()->setString("hoe_of_greater_tilling", "hoe");
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;
                case 2:
                    $sender->sendForm(new ItemsForm());
                    break;
            }
        });
        $form->setTitle("§l§6CUSTOM HOE RECIPES");
        $form->setContent("§bSelect The Recipe You Want To Craft:");
        $form->addButton("§l§dHOE OF TILLING\n§9»» §r§6Tap To View", 0, "textures/items/hoe/hoe_of_tilling");
        $form->addButton("§l§dHOE OF FERTILIZER\n§9»» §r§6Tap To View", 0, "textures/items/hoe/hoe_of_greater_tilling");
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

            $enchantmentData = [];
            switch ($data) {
                case 0:
                    $item = ItemFactory::getInstance()->get(1003, 0, 1);
                    $item->addEnchantment($this->fakeEnchant);
                    $item->setCustomName("§l§6BOULDER PICKAXE");
                    $item->setLore(["§r§8+§c  20 Efficiency\n\n§r§l§dRARE"]);
                    $item->getNamedTag()->setString("PickaxeBoulder", "pickaxe");
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;
                case 1:
                    $item = ItemFactory::getInstance()->get(1006, 0, 1);
                    $enchantmentData["name"] = "oxygenate";
                    $enchantmentData["level"] = 1;
                    $enchantment = StringToEnchantmentParser::getInstance()->parse($enchantmentData["name"]) ?? ((($plugin = Server::getInstance()->getPluginManager()->getPlugin("PiggyCustomEnchants")) instanceof PiggyCustomEnchants && $plugin->isEnabled()) ? CustomEnchantManager::getEnchantmentByName($enchantmentData["name"]) : null);
                    if ($enchantment !== null) $item->addEnchantment(new EnchantmentInstance($enchantment, $enchantmentData["level"]));
                    $item->setCustomName("§l§6DOLPHIN PICKAXE");
                    $item->setLore(["§r§8+§c  12 Efficiency\n\n§r§eItem Ability: Oxygenate §l§eRIGHT CLICK§r\n§rGain Water Breathing while item is held\n\n§r§l§dRARE"]);
                    $item->getNamedTag()->setString("PickaxeDolphin", "pickaxe");
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;
                case 2:
                    $item = ItemFactory::getInstance()->get(1004, 0, 1);
                    $enchantmentData["name"] = "driller";
                    $enchantmentData["level"] = 1;
                    $enchantment = StringToEnchantmentParser::getInstance()->parse($enchantmentData["name"]) ?? ((($plugin = Server::getInstance()->getPluginManager()->getPlugin("PiggyCustomEnchants")) instanceof PiggyCustomEnchants && $plugin->isEnabled()) ? CustomEnchantManager::getEnchantmentByName($enchantmentData["name"]) : null);
                    if ($enchantment !== null) $item->addEnchantment(new EnchantmentInstance($enchantment, $enchantmentData["level"]));
                    $item->setCustomName("§l§6DRAGON PICKAXE");
                    $item->setLore(["§r§8+§c  18 Efficiency\n\n§r§eItem Ability: Driller §l§eRIGHT CLICK§r\n§rDrills a 3 by 3 hole.\n\n§r§l§dRARE"]);
                    $item->getNamedTag()->setString("PickaxeDragon", "pickaxe");
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;
                case 3:
                    $item = ItemFactory::getInstance()->get(1000, 0, 1);
                    $item->addEnchantment($this->fakeEnchant);
                    $item->setCustomName("§l§6ERUPTION PICKAXE");
                    $enchantmentData["name"] = "haste";
                    $enchantmentData["level"] = 3;
                    $enchantment = StringToEnchantmentParser::getInstance()->parse($enchantmentData["name"]) ?? ((($plugin = Server::getInstance()->getPluginManager()->getPlugin("PiggyCustomEnchants")) instanceof PiggyCustomEnchants && $plugin->isEnabled()) ? CustomEnchantManager::getEnchantmentByName($enchantmentData["name"]) : null);
                    if ($enchantment !== null) $item->addEnchantment(new EnchantmentInstance($enchantment, $enchantmentData["level"]));
                    $item->setLore(["§r§8+§c  16 Efficiency\n\n§r§eItem Ability: Haste §l§eRIGHT CLICK§r\n§rYou Will Get Haste 3\n\n§r§l§dRARE"]);
                    $item->getNamedTag()->setString("PickaxeEruption", "pickaxe");
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;
                case 4:
                    $item = ItemFactory::getInstance()->get(1001, 0, 1);
                    $enchantmentData["name"] = "smelting";
                    $enchantmentData["level"] = 1;
                    $enchantment = StringToEnchantmentParser::getInstance()->parse($enchantmentData["name"]) ?? ((($plugin = Server::getInstance()->getPluginManager()->getPlugin("PiggyCustomEnchants")) instanceof PiggyCustomEnchants && $plugin->isEnabled()) ? CustomEnchantManager::getEnchantmentByName($enchantmentData["name"]) : null);
                    if ($enchantment !== null) $item->addEnchantment(new EnchantmentInstance($enchantment, $enchantmentData["level"]));
                    $item->setCustomName("§l§6FLAME PICKAXE");
                    $item->setLore(["§r§8+§c  9 Efficiency\n\n§r§eItem Ability: Smealting §l§eRIGHT CLICK§r\n§rGrants chance to increase ore tier.\n\n§r§l§dRARE"]);
                    $item->getNamedTag()->setString("PickaxeFlame", "pickaxe");
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;
                case 5:
                    $item = ItemFactory::getInstance()->get(1005, 0, 1);
                    $enchantmentData["name"] = "jackpot";
                    $enchantmentData["level"] = 1;
                    $enchantment = StringToEnchantmentParser::getInstance()->parse($enchantmentData["name"]) ?? ((($plugin = Server::getInstance()->getPluginManager()->getPlugin("PiggyCustomEnchants")) instanceof PiggyCustomEnchants && $plugin->isEnabled()) ? CustomEnchantManager::getEnchantmentByName($enchantmentData["name"]) : null);
                    if ($enchantment !== null) $item->addEnchantment(new EnchantmentInstance($enchantment, $enchantmentData["level"]));
                    $item->setCustomName("§l§JACKPOT PICKAXE");
                    $item->setLore(["§r§8+§c  25 Efficiency\n\n§r§eItem Ability: Jackpot §l§eRIGHT CLICK§r\n§rGrants chance to increase ore tier.\n\n§r§l§dRARE"]);
                    $item->getNamedTag()->setString("PickaxeBoulder", "pickaxe");
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;
                case 6:
                    $item = ItemFactory::getInstance()->get(1002, 0, 1);
                    $item->addEnchantment($this->fakeEnchant);
                    $item->setCustomName("§l§6LAVE PICKAXE");
                    $item->setLore(["§r§8+§c  30 Efficiency\n\n§r§l§dRARE"]);
                    $item->getNamedTag()->setString("PickaxeBoulder", "pickaxe");
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;
                case 7:
                    $item = ItemFactory::getInstance()->get(1007, 0, 1);
                    $item->addEnchantment($this->fakeEnchant);
                    $item->setCustomName("§l§6JUNGLE PICKAXE");
                    $item->setLore(["§r§8+§c  15 Efficiency\n\n§r§l§dRARE"]);
                    $item->getNamedTag()->setString("junglepickaxe", "pickaxe");
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;
                case 8:
                    $sender->sendForm(new ItemsForm());
                    break;
            }
        });
        $form->setTitle("§l§6CUSTOM PICKAXE RECIPES");
        $form->setContent("§bSelect The Recipe You Want To Craft:");
        $form->addButton("§l§dPICKAXE BOULDER\n§9»» §r§6Tap To View", 0, "textures/items/pickaxe/PickaxeBoulder");
        $form->addButton("§l§dPICKAXE DOLPHIN\n§9»» §r§6Tap To View", 0, "textures/items/pickaxe/PickaxeDolphin");
        $form->addButton("§l§dPICKAXE DRAGON\n§9»» §r§6Tap To View", 0, "textures/items/pickaxe/PickaxeDragon");
        $form->addButton("§l§dPICKAXE ERUPTION\n§9»» §r§6Tap To View", 0, "textures/items/pickaxe/PickaxeEruption");
        $form->addButton("§l§dPICKAXE FLAME\n§9»» §r§6Tap To View", 0, "textures/items/pickaxe/PickaxeFlame");
        $form->addButton("§l§dPICKAXE JACKPOT\n§9»» §r§6Tap To View", 0, "textures/items/pickaxe/PickaxeJackpot");
        $form->addButton("§l§dPICKAXE LAVA\n§9»» §r§6Tap To View", 0, "textures/items/pickaxe/PickaxeLava");
        $form->addButton("§l§dJUNGLE PICKAXE\n§9»» §r§6Tap To View", 0, "textures/items/pickaxe/redstone_pickaxe");
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
                    $item = ItemFactory::getInstance()->get(437, 0, 64);
                    $item->addEnchantment($this->fakeEnchant);
                    $item->setCustomName("§r§e§lDRAGON BREATH");
                    $item->setLore(["§7Use It To Craft Custom Items\n\n§d§lEPIC"]);
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;

                case 1:
                    $item = ItemFactory::getInstance()->get(61, 0, 64);
                    $item->addEnchantment($this->fakeEnchant);
                    $item->setCustomName("§r§l§eSUPER SMELTER");
                    $item->setLore(["§r§7Use This Super Smelter For Enable\n§r§7Smelter Upgrade In Your Any Minion.\n\n§r§l§eLEGENDARY"]);
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;

                case 2:
                    $item = ItemFactory::getInstance()->get(23, 0, 64);
                    $item->addEnchantment($this->fakeEnchant);
                    $item->setCustomName("§r§e§lSUPER COMPACTER");
                    $item->setLore(["§r§7Use This Super Compacter For Enable\n§r§7Compacter Upgrade In Your Any Minion.\n\n§r§l§eLEGENDARY"]);
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;

                case 3:
                    $item = ItemFactory::getInstance()->get(137, 0, 64);
                    $item->addEnchantment($this->fakeEnchant);
                    $item->setCustomName("§r§e§lSUPER EXPANDER");
                    $item->setLore(["§r§7Use This Super Expander For Enable\n§r§7Expander Upgrade In Your Any Minion.\n\n§r§l§eLEGENDARY"]);
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;

                case 4:
                    $item = VanillaItems::WATER_BUCKET();
                    $item->addEnchantment($this->fakeEnchant);
                    $item->setCustomName("§r§b§lINFINITE WATER");
                    $item->getNamedTag()->setString("infi_bucket", "item");
                    $item->setLore(["§r§7Right Click/Tap To Place Water\n\n§r§l§fUNCOMMON"]);
                    $sender->getInventory()->addItem($item);
                    break;

                case 5:
                    $item = VanillaItems::LAVA_BUCKET();
                    $item->addEnchantment($this->fakeEnchant);
                    $item->setCustomName("§r§c§lINFINITE LAVA");
                    $item->getNamedTag()->setString("infi_bucket", "item");
                    $item->setLore(["§r§7Right Click/Tap To Place Lava\n\n§r§l§fUNCOMMON"]);
                    $sender->getInventory()->addItem($item);
                    break;

                case 6:
                    $item = ItemFactory::getInstance()->get(1092, 0, 1);
                    $item->addEnchantment($this->fakeEnchant);
                    $item->setCustomName("§r§e§lBANK");
                    $item->getNamedTag()->setString("bank", "item");
                    $item->setLore(["§r§7Access Your Bank From Any Time And Anywhere\n\n§r§l§fUNCOMMON"]);
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;

                case 7:
                    $item = ItemFactory::getInstance()->get(1090, 0, 1);
                    $item->addEnchantment($this->fakeEnchant);
                    $item->setCustomName("§r§e§lBAG");
                    $item->getNamedTag()->setString("bag", "item");
                    $item->setLore(["§r§7Access Your Vault From Anywhere Anytime!\n\n§r§l§fUNCOMMON"]);
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;

                case 8:
                    $item = ItemFactory::getInstance()->get(1035, 0, 1);
                    $item->addEnchantment($this->fakeEnchant);
                    $item->setCustomName("§r§e§lPROFILE");
                    $item->getNamedTag()->setString("profile", "item");
                    $item->setLore(["§r§7View Your Profile On Server\n\n§r§l§fCOMMON"]);
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;

                case 9:
                    $sender->sendForm(new ItemsForm());
            }
        });
        $form->setTitle("§l§6CUSTOM ITEMS RECIPES");
        $form->setContent("§bSelect The Which Item Recipe You Want:");
        $form->addButton("§l§dDRAGON'S BREATH\n§9»» §r§6Tap To View", 0, "textures/items/dragons_breath");
        $form->addButton("§l§dSUPER SMELTER\n§9»» §r§6Tap To Get", 0, "textures/blocks/furnace_front_off");
        $form->addButton("§l§dSUPER COMPACTER\n§9»» §r§6Tap To Get", 0, "textures/blocks/dispenser_front_horizontal");
        $form->addButton("§l§dSUPER EXPANDER\n§9»» §r§6Tap To Get", 0, "textures/blocks/command_block");
        $form->addButton("§l§dINFINITE WATER\n§9»» §r§6Tap To Get", 0, "textures/items/bucket_water");
        $form->addButton("§l§dINFINITE LAVA\n§9»» §r§6Tap To Get", 0, "textures/items/bucket_lava");
        $form->addButton("§l§dPIGGY BANK\n§9»» §r§6Tap To Get", 0, "textures/items/other/piggy_bank");
        $form->addButton("§l§dBAG\n§9»» §r§6Tap To Get", 0, "textures/items/other/bag");
        $form->addButton("§l§dPROFILE\n§9»» §r§6Tap To Get", 0, "textures/items/other/Passport");
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
                    Server::getInstance()->dispatchCommand($sender, "invcraft view minion");
                    break;

                case 1:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view minion");
                    break;

                case 2:
                    Server::getInstance()->dispatchCommand($sender, "invcraft view minion");
                    break;

                case 3:
                    $sender->sendForm(new ItemsForm());
                    break;
            }
        });
        $form->setTitle("§l§6WANDS RECIPES");
        $form->setContent("§bSelect The Recipe You Want To Craft:");
        $form->addButton("§l§dBUILDER WAND\n§9»» §r§6Tap To View", 0, "textures/items/wand/builders_wand");
        $form->addButton("§l§dSELL WAND\n§9»» §r§6Tap To View", 0, "textures/items/wand/sell_wand");
        $form->addButton("§l§dSMELT WAND\n§9»» §r§6Tap To View", 0, "textures/items/wand/melt_wand");
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
                    $item = ItemFactory::getInstance()->get(1071, 0, 64);
                    $item->setCustomName("§r§e§lBURGER");
                    $item->setLore(["§r§8+§b  3 Food\n§r§8+§b  1 Saturation\n\n§r§l§aUNCOMMON"]);
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;
                case 1:
                    $item = ItemFactory::getInstance()->get(1072, 0, 64);
                    $item->setCustomName("§r§e§lCHRISTMAS PUDDING");
                    $item->setLore(["§r§8+§b  5 Food\n§r§8+§b  2 Saturation\n\n§r§l§aUNCOMMON"]);
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;
                case 2:
                    $item = ItemFactory::getInstance()->get(1073, 0, 64);
                    $item->setCustomName("§r§e§lHOTDOG");
                    $item->setLore(["§r§8+§b  2 Food\n§r§8+§b  1 Saturation\n\n§r§l§aUNCOMMON"]);
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;
                case 3:
                    $item = ItemFactory::getInstance()->get(1074, 0, 64);
                    $item->setCustomName("§r§e§lICE CREAME");
                    $item->setLore(["§r§8+§b  1 Food\n§r§8+§b  0.5 Saturation\n\n§r§l§aUNCOMMON"]);
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;
                case 4:
                    $item = ItemFactory::getInstance()->get(1075, 0, 64);
                    $item->setCustomName("§r§e§lKFC CHICKEN");
                    $item->setLore(["§r§8+§b  5 Food\n§r§8+§b  3 Saturation\n\n§r§l§aUNCOMMON"]);
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;
                case 5:
                    $item = ItemFactory::getInstance()->get(1076, 0, 64);
                    $item->setCustomName("§r§e§lLOLIPOP");
                    $item->setLore(["§r§8+§b  1 Food\n§r§8+§b  0.1 Saturation\n\n§r§l§aUNCOMMON"]);
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;
                case 6:
                    $item = ItemFactory::getInstance()->get(1077, 0, 64);
                    $item->setCustomName("§r§e§lPIZZA");
                    $item->setLore(["§r§8+§b  6 Food\n§r§8+§b  3 Saturation\n\n§r§l§aUNCOMMON"]);
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;
                case 7:
                    $item = ItemFactory::getInstance()->get(1078, 0, 64);
                    $item->setCustomName("§r§e§lSANDWICH");
                    $item->setLore(["§r§8+§b  2 Food\n§r§8+§b  1 Saturation\n\n§r§l§aUNCOMMON"]);
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;
                case 8:
                    $item = ItemFactory::getInstance()->get(1079, 0, 64);
                    $item->setCustomName("§r§e§lCUP CAKE");
                    $item->setLore(["§r§8+§b  2 Food\n§r§8+§b  1 Saturation\n\n§r§l§aUNCOMMON"]);
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;
                case 9:
                    $sender->sendForm(new ItemsForm());
                    break;
            }
        });
        $form->setTitle("§l§6CUSTOM FOOD RECIPES");
        $form->setContent("§bSelect The Recipe You Want To Craft:");
        $form->addButton("§l§dBURGER\n§9»» §r§6Tap To View", 0, "textures/items/food/burger");
        $form->addButton("§l§dCHRISTMAS PUDDING\n§9»» §r§6Tap To View", 0, "textures/items/food/christmas_pudding");
        $form->addButton("§l§dHOTDOG\n§9»» §r§6Tap To View", 0, "textures/items/food/hotdog");
        $form->addButton("§l§dICE CREAME\n§9»» §r§6Tap To View", 0, "textures/items/food/ice-cream");
        $form->addButton("§l§dKFC CHICKEN\n§9»» §r§6Tap To View", 0, "textures/items/food/kfc_chicken");
        $form->addButton("§l§dLOLIPOP\n§9»» §r§6Tap To View", 0, "textures/items/food/lolipop");
        $form->addButton("§l§dPIZZA\n§9»» §r§6Tap To View", 0, "textures/items/food/pizza");
        $form->addButton("§l§dSANDWICH\n§9»» §r§6Tap To View", 0, "textures/items/food/sandwich");
        $form->addButton("§l§dCUP CAKE\n§9»» §r§6Tap To View", 0, "textures/items/food/yellowcupcake");
        $form->addButton("§l§aBACK\n§9»» §r§bTap To Go Back", 0, "textures/ui/icon_import");
        $sender->sendForm($form);
        return $form;
    }
    public function rune(Player $sender): Form
    {
        $form = new SimpleForm(function (Player $sender, int $data = null) {
            if ($data === null) {
                return;
            }
            switch ($data) {
                case 0:
                    $item = ItemFactory::getInstance()->get(1015, 0, 1);
                    $item->addEnchantment($this->fakeEnchant);
                    $item->setCustomName("§r§e§l HOT RUNE");
                    $item->setLore(["§r§7Use This To Craft Custom Items.\n\n§r§l§eLEGENDARY"]);
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;

                case 1:
                    $item = ItemFactory::getInstance()->get(1016, 0, 1);
                    $item->addEnchantment($this->fakeEnchant);
                    $item->setCustomName("§r§e§l ICE RUNE");
                    $item->setLore(["§r§7Use This To Craft Custom Items.\n\n§r§l§eLEGENDARY"]);
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;

                case 2:
                    $item = ItemFactory::getInstance()->get(1017, 0, 1);
                    $item->addEnchantment($this->fakeEnchant);
                    $item->setCustomName("§r§e§l LAVA RUNE");
                    $item->setLore(["§r§7Use This To Craft Custom Items.\n\n§r§l§eLEGENDARY"]);
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;

                case 3:
                    $item = ItemFactory::getInstance()->get(1014, 0, 1);
                    $item->addEnchantment($this->fakeEnchant);
                    $item->setCustomName("§r§e§l HEART RUNE");
                    $item->setLore(["§r§7Use This To Craft Custom Items.\n\n§r§l§eLEGENDARY"]);
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;
                case 4:
                    $item = ItemFactory::getInstance()->get(1021, 0, 1);
                    $item->addEnchantment($this->fakeEnchant);
                    $item->setCustomName("§r§e§l RAINBOW RUNE");
                    $item->setLore(["§r§7Use This To Craft Custom Items.\n\n§r§l§eLEGENDARY"]);
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;
                case 5:
                    $item = ItemFactory::getInstance()->get(1027, 0, 1);
                    $item->addEnchantment($this->fakeEnchant);
                    $item->setCustomName("§r§e§l ZAP RUNE");
                    $item->setLore(["§r§7Use This To Craft Custom Items.\n\n§r§l§eLEGENDARY"]);
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;
                case 6:
                    $item = ItemFactory::getInstance()->get(1013, 0, 1);
                    $item->addEnchantment($this->fakeEnchant);
                    $item->setCustomName("§r§e§l GOLDEN RUNE");
                    $item->setLore(["§r§7Use This To Craft Custom Items.\n\n§r§l§eLEGENDARY"]);
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;
                case 7:
                    $item = ItemFactory::getInstance()->get(1023, 0, 1);
                    $item->addEnchantment($this->fakeEnchant);
                    $item->setCustomName("§r§e§l SNOW RUNE");
                    $item->setLore(["§r§7Use This To Craft Custom Items.\n\n§r§l§eLEGENDARY"]);
                    $inv = $sender->getInventory();
                    $inv->addItem($item);
                    break;
                case 8:
                    $sender->sendForm(new ItemsForm());
                    break;
            }
        });
        $form->setTitle("§l§6WANDS RECIPES");
        $form->setContent("§bSelect The Recipe You Want To Craft:");
        $form->addButton("§l§dHot\n§9»» §r§6Tap To View", 0, "textures/items/wand/builders_wand");
        $form->addButton("§l§dice\n§9»» §r§6Tap To View", 0, "textures/items/wand/sell_wand");
        $form->addButton("§l§dlava\n§9»» §r§6Tap To View", 0, "textures/items/wand/melt_wand");
        $form->addButton("§l§dheart\n§9»» §r§6Tap To View", 0, "textures/items/wand/melt_wand");
        $form->addButton("§l§drainbow\n§9»» §r§6Tap To View", 0, "textures/items/wand/melt_wand");
        $form->addButton("§l§dzap\n§9»» §r§6Tap To View", 0, "textures/items/wand/melt_wand");
        $form->addButton("§l§dgolden\n§9»» §r§6Tap To View", 0, "textures/items/wand/melt_wand");
        $form->addButton("§l§dsnow\n§9»» §r§6Tap To View", 0, "textures/items/wand/melt_wand");
        $form->addButton("§l§aBACK\n§9»» §r§bTap To Go Back", 0, "textures/ui/icon_import");
        $sender->sendForm($form);
        return $form;
    }
}
