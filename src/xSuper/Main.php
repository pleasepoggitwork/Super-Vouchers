<?php

declare(strict_types=1);

namespace xSuper;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;
use xSuper\commands\FixVCommand;
use xSuper\commands\FlyVCommand;
use xSuper\commands\NickVCommand;
use xSuper\commands\FeedVCommand;
use xSuper\commands\HealVCommand;
use xSuper\commands\TopVCommand;
use xSuper\commands\FixAllVCommand;
use xSuper\commands\ColorChatVCommand;
use xSuper\commands\AntiAfkVCommand;
use xSuper\commands\BackVCommand;
use xSuper\commands\SuicideVCommand;
use xSuper\commands\NearVCommand;
use xSuper\commands\CondenseVCommand;
use xSuper\commands\CompassVCommand;
use xSuper\commands\ClearInvVCommand;
use xSuper\commands\KitZeusV;
use xSuper\commands\KitKronosV;
use xSuper\commands\KitHadesV;
use xSuper\commands\KitGodV;
use xSuper\commands\KitDemigodV;
use xSuper\commands\DemigodRank;
use xSuper\commands\GodRank;
use xSuper\commands\HadesRank;
use xSuper\commands\KronosRank;
use xSuper\commands\ZeusRank;
use CortexPE\Commando\exception\HookAlreadyRegistered;
use CortexPE\Commando\PacketHooker;
use xSuper\commands\CommonSpawnerC;
use xSuper\commands\UncommonSpawnerC;
use xSuper\commands\RareSpawnerC;
use xSuper\commands\EpicSpawnerC;
use xSuper\Utilities\Utils;
use pocketmine\item\Item;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\IntTag;
use pocketmine\item\enchantment\Enchantment;
use pocketmine\item\enchantment\EnchantmentInstance;
use xSuper\EventListener;

class Main extends PluginBase
{

    /**
     * @var Main
     */
    public static $instance;

    /**
     * @throws HookAlreadyRegistered
     */


    public function onEnable(): void
    {
        self::$instance = $this;
        $this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);

        if (!PacketHooker::isRegistered()) PacketHooker::register($this);
        $this->getServer()->getCommandMap()->register("fixv", new FixVCommand($this, "fixv", " "));
        $this->getServer()->getCommandMap()->register("clearinvv", new ClearInvVCommand($this, "clearinvv", " "));
        $this->getServer()->getCommandMap()->register("zeusv", new KitZeusV($this, "zeusv", " "));
        $this->getServer()->getCommandMap()->register("kronosv", new KitKronosV($this, "kronosv", " "));
        $this->getServer()->getCommandMap()->register("hadesv", new KitHadesV($this, "hadesv", " "));
        $this->getServer()->getCommandMap()->register("godv", new KitGodV($this, "godv", " "));
        $this->getServer()->getCommandMap()->register("demigodv", new KitDemigodV($this, "demigodv", " "));
        $this->getServer()->getCommandMap()->register("compassv", new CompassVCommand($this, "compassv", " "));
        $this->getServer()->getCommandMap()->register("condensev", new CondenseVCommand($this, "condensev", " "));
        $this->getServer()->getCommandMap()->register("suicidev", new SuicideVCommand($this, "suicidev", " "));
        $this->getServer()->getCommandMap()->register("nearv", new NearVCommand($this, "nearv", " "));
        $this->getServer()->getCommandMap()->register("backv", new BackVCommand($this, "backv", " "));
        $this->getServer()->getCommandMap()->register("colorchatv", new ColorChatVCommand($this, "colorchatv", " "));
        $this->getServer()->getCommandMap()->register("antiafkv", new AntiAfkVCommand($this, "antiafkv", " "));
        $this->getServer()->getCommandMap()->register("flyv", new FlyVCommand($this, "flyv", " "));
        $this->getServer()->getCommandMap()->register("fixallv", new FixAllVCommand($this, "fixallv", " "));
        $this->getServer()->getCommandMap()->register("topv", new TopVCommand($this, "topv", " "));
        $this->getServer()->getCommandMap()->register("nickv", new NickVCommand($this, "nickv", " "));
        $this->getServer()->getCommandMap()->register("feedv", new FeedVCommand($this, "feedv", " "));
        $this->getServer()->getCommandMap()->register("healv", new HealVCommand($this, "healv", " "));
        $this->getServer()->getCommandMap()->register("demigodrv", new DemigodRank($this, "demigodrv", " "));
        $this->getServer()->getCommandMap()->register("godrv", new GodRank($this, "godrv", " "));
        $this->getServer()->getCommandMap()->register("hadesrv", new HadesRank($this, "hadesrv", " "));
        $this->getServer()->getCommandMap()->register("kronosrv", new KronosRank($this, "kronosrv", " "));
        $this->getServer()->getCommandMap()->register("zeusrv", new ZeusRank($this, "zeusrv", " "));
        $this->getServer()->getCommandMap()->register("commonsc", new CommonSpawnerC($this, "commonsc", " "));
        $this->getServer()->getCommandMap()->register("uncommonsc", new UncommonSpawnerC($this, "uncommonsc", " "));
        $this->getServer()->getCommandMap()->register("raresc", new RareSpawnerC($this, "raresc", " "));
        $this->getServer()->getCommandMap()->register("epicsc", new EpicSpawnerC($this, "epicsc", " "));
    }

    public static function getInstance(): Main
    {
        return self::$instance;
    }

    public function getSpawner(string $name, int $amount): Item
    {
        $name = strtolower($name);
        $name = str_replace(" ", "", $name);
        $entityID = Utils::getEntityIDFromName($name);

        $nbt = new CompoundTag("", [
            new IntTag("EntityID", (int)$entityID)
        ]);

        $spawner = Item::get(Item::MOB_SPAWNER, 0, $amount, $nbt);
        $spawnerName = Utils::getEntityNameFromID((int)$entityID) . " Spawner";
        $spawner->setCustomName(TextFormat::RESET . $spawnerName);

        return $spawner;
    }
}