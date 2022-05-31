<?php

namespace Pushkar\MagicCore\managers;

use pocketmine\Server;
use Pushkar\MagicCore\commands\IDCommand;
use Pushkar\MagicCore\commands\FlyCommand;
use Pushkar\MagicCore\commands\HubCommand;
use Pushkar\MagicCore\commands\XyzCommand;
use Pushkar\MagicCore\commands\FeedCommand;
use Pushkar\MagicCore\commands\BitsCommand;
use Pushkar\MagicCore\commands\HealCommand;
use Pushkar\MagicCore\commands\HideCommand;
use Pushkar\MagicCore\commands\NickCommand;
use Pushkar\MagicCore\commands\SizeCommand;
use Pushkar\MagicCore\commands\SkinCommand;
use Pushkar\MagicCore\commands\WarpCommand;
use Pushkar\MagicCore\commands\DianaCommand;
use Pushkar\MagicCore\commands\EmojiCommand;
use Pushkar\MagicCore\commands\EventCommand;
use Pushkar\MagicCore\commands\ItemsCommand;
use Pushkar\MagicCore\commands\JerryCommand;
use Pushkar\MagicCore\commands\RulesCommand;
use Pushkar\MagicCore\commands\SpeedCommand;
use Pushkar\MagicCore\commands\BazaarCommand;
use Pushkar\MagicCore\commands\LiftuiCommand;
use Pushkar\MagicCore\commands\RepairCommand;
use Pushkar\MagicCore\commands\SellUiCommand;
use Pushkar\MagicCore\commands\VanishCommand;
use Pushkar\MagicCore\commands\VisionCommand;
use Pushkar\MagicCore\commands\VaultUICommand;
use Pushkar\MagicCore\commands\DiscordCommand;
use Pushkar\MagicCore\commands\EnchantCommand;
use Pushkar\MagicCore\commands\ProfileCommand;
use Pushkar\MagicCore\commands\RecipesCommand;
use Pushkar\MagicCore\commands\ServersCommand;
use Pushkar\MagicCore\commands\FeaturesCommand;
use Pushkar\MagicCore\commands\VoucherCommand;
use Pushkar\MagicCore\commands\InvClearCommand;
use Pushkar\MagicCore\commands\RanklistCommand;
use Pushkar\MagicCore\commands\RankshopCommand;
use Pushkar\MagicCore\commands\SettingsCommand;
use Pushkar\MagicCore\commands\ChangelogCommand;
use Pushkar\MagicCore\commands\StafflistCommand;
use Pushkar\MagicCore\commands\TotorialsCommand;
use Pushkar\MagicCore\commands\InformationCommand;
use Pushkar\MagicCore\commands\SocialmediaCommand;
use Pushkar\MagicCore\commands\GiverankCommand;
use Pushkar\MagicCore\commands\AnnouncementCommand;
use Pushkar\MagicCore\commands\CommunityShopCommand;

final class CommandManager
{
    public static function initalize(): void
    {
        foreach (self::getCommands() as $key => $value) {
            Server::getInstance()->getCommandMap()->register($key, $value);
        }
    }

    public static function getCommands(): array
    {
        return [
            "bazaar" => new BazaarCommand(),
            "feed" => new FeedCommand(),
            "heal" => new HealCommand(),
            "id" => new IDCommand(),
            "vanish" => new VanishCommand(),
            "warp" => new WarpCommand(),
            "hide" => new HideCommand(),
            "hub" => new HubCommand(),
            "items" => new ItemsCommand(),
            "diana" => new DianaCommand(),
            "fly" => new FlyCommand(),
            "speed" => new SpeedCommand(),
            "vision" => new VisionCommand(),
            "invclear" => new InvClearCommand(),
            "announcement" => new AnnouncementCommand(),
            "changelog" => new ChangelogCommand(),
            "discord" => new DiscordCommand(),
            "enchantui" => new EnchantCommand(),
            "features" => new FeaturesCommand(),
            "event" => new EventCommand(),
            "information" => new InformationCommand(),
            "liftui" => new LiftuiCommand(),
            "nick" => new NickCommand(),
            "ranklist" => new RanklistCommand(),
            "repair" => new RepairCommand(),
            "rules" => new RulesCommand(),
            "size" => new SizeCommand(),
            "skin" => new SkinCommand(),
            "recipes" => new RecipesCommand(),
            "servers" => new ServersCommand(),
            "settings" => new SettingsCommand(),
            "socialmedia" => new SocialmediaCommand(),
            "stafflist" => new StafflistCommand(),
            "totorials" => new TotorialsCommand(),
            "xyz" => new XyzCommand(),
            "sellui" => new SellUiCommand(),
            "jerry" => new JerryCommand(),
            "emoji" => new EmojiCommand(),
            "rankshop" => new RankshopCommand(),
            "vaultui" => new VaultUICommand(),
            "bits" => new BitsCommand(),
            "communityshop" => new CommunityShopCommand(),
            "voucher" => new VoucherCommand(),
            "giverank" => new GiverankCommand(),
            "profile" => new ProfileCommand()
        ];
    }
}
