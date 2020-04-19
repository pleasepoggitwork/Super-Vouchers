<?php

declare(strict_types=1);

namespace xSuper\commands;

use xSuper\Main;
use CortexPE\Commando\BaseCommand;
use pocketmine\command\CommandSender;
use pocketmine\item\Item;
use pocketmine\Player;
use pocketmine\utils\TextFormat;
use CortexPE\Commando\args\RawStringArgument;
use pocketmine\Server;
use pocketmine\nbt\tag\ListTag;
use pocketmine\nbt\tag\StringTag;


class CommonSpawnerC extends BaseCommand
{
    /** @var RankV */
    private $plugin;

    public function __construct(Main $plugin, string $name, string $description = "", array $aliases = [])
    {
        $this->plugin = $plugin;
        parent::__construct($name, $description, $aliases);
    }

    protected function prepare(): void
    {
        $this->setPermission("rankv.command.use");
        $this->registerArgument(0, new RawStringArgument("player", true));
    }

    public function onRun(CommandSender $sender, string $aliasUsed, array $args): void
    {

        if ($sender->hasPermission("rankv.command.use")) {
            if (count($args) === 1) {
                $player = $args["player"];
                $target = \pocketmine\Server::getInstance()->getPlayer($player);
                if ($target instanceof Player) {
                    $item = Item::get(Item::CHEST);
                    $item->setCustomName(TextFormat::BOLD . TextFormat::GREEN . "Common Spawner" . TextFormat::BOLD . TextFormat::WHITE . " Crate");
                    $lore = [
                        TextFormat::GRAY . "Right-Click to open this crate to",
                        TextFormat::GRAY . "get its rewards!",
                        " ",
                        TextFormat::BOLD . TextFormat::AQUA . "Rewards:",
                        TextFormat::RESET .TextFormat::WHITE . "* 25x Wolf Spawner",
                        TextFormat::WHITE . "* 25x Sheep Spawner",
                        TextFormat::WHITE . "* 25x Mooshroom Spawner",
                        TextFormat::WHITE . "* 25x Pig Spawner",
                        " ",
                        TextFormat::BOLD . TextFormat::RED . "Warning" . TextFormat::RESET . TextFormat::GRAY . ": Please make sure you have",
                        TextFormat::GRAY . "at least " . TextFormat::AQUA . "4 " . TextFormat::GRAY . "inventory slots open!"
                    ];
                    $item->setLore($lore);
                    $item->getNamedTag()->setInt("commons", 1);
                    $inventory = $target->getInventory();
                    $item->setNamedTagEntry(new ListTag(Item::TAG_ENCH));
                    if ($inventory->canAddItem($item)) {
                        $inventory->addItem($item);
                        return;
                    }
                } else {
                    $sender->sendMessage("Sorry, " . $args["player"] . " is not online!");
                }
            } else {
                $sender->sendMessage("Usage: /commonsc <player>");
            }
        } else {
            $sender->sendMessage("You don't have permission to use this command.");
        }
    }
}
