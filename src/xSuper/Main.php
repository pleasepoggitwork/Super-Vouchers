<?php

declare(strict_types=1);

namespace xSuper;

use pocketmine\plugin\PluginBase;
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
use CortexPE\Commando\exception\HookAlreadyRegistered;
use CortexPE\Commando\PacketHooker;
use xSuper\EventListener;

class Main extends PluginBase
{

    /**
     * @throws HookAlreadyRegistered
     * @throws MissingProviderDependencyException
     * @throws UnknownProviderException
     */

    public function onEnable(): void
    {
        $this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);

        if (!PacketHooker::isRegistered()) PacketHooker::register($this);
        $this->getServer()->getCommandMap()->register("fixv", new FixVCommand($this, "fixv", " "));
        $this->getServer()->getCommandMap()->register("clearinvv", new ClearInvVCommand($this, "clearinvv", " "));
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
    }
}