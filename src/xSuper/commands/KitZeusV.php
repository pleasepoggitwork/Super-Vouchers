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


class KitZeusV extends BaseCommand
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
                    $item = Item::get(Item::PAINTING);
                    $item->setCustomName(TextFormat::BOLD . TextFormat::AQUA . "Zeus Kit" . TextFormat::BOLD . TextFormat::WHITE . " Voucher");
                    $lore = [
                        TextFormat::GRAY . "Right-Click to redeem the " . TextFormat::AQUA . "zeus kit" . TextFormat::GRAY . ",",
                        TextFormat::GRAY . "and gain all the kit's items!"
                    ];
                    $item->setLore($lore);
                    $item->getNamedTag()->setInt("zeusv", 1);
                    $item->setNamedTagEntry(new ListTag(Item::TAG_ENCH));
                    $inventory = $target->getInventory();
                    if ($inventory->canAddItem($item)) {
                        $inventory->addItem($item);
                        return;
                    }
                } else {
                    $sender->sendMessage("Sorry, " . $args["player"] . " is not online!");
                }
            } else {
                $sender->sendMessage("Usage: /zeusv <player>");
            }
        } else {
            $sender->sendMessage("You don't have permission to use this command.");
        }
    }
}