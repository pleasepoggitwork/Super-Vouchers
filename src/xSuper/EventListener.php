<?php

declare(strict_types=1);

namespace xSuper;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\command\PluginIdentifiableCommand;
use pocketmine\item\enchantment\Enchantment;
use pocketmine\item\enchantment\EnchantmentInstance;
use pocketmine\item\Item;
use pocketmine\utils\TextFormat;
use _64FF00\PurePerms\PurePerms;
use _64FF00\PurePerms\data\UserDataManager;
use pocketmine\permission\Permission;
use pocketmine\Server;

class EventListener implements Listener
{
    /** @var RankV */
    private $plugin;

    public function __construct(Main $plugin)
    {
        $this->plugin = $plugin;
    }

    public function onPlayerInteractEvent(PlayerInteractEvent $event): void
    {
        $pureperms = Server::getInstance()->getPluginManager()->getPlugin('PurePerms');
        $item = $event->getItem();
        $player = $event->getPlayer();
        if ($item->getId() !== Item::PAPER) return;
        if ($item->getNamedTag()->hasTag("fixv")) {
            if ($player->hasPermission("essentials.repair.use")) {
                $player->sendMessage(TextFormat::GRAY . "You already have access to the " . TextFormat::AQUA . "/fix " . TextFormat::GRAY . "command!");
            } else {
                $usrdmg = $pureperms->getUserDataMgr();
                $usrdmg->setPermission($player, "essentials.repair.use");
                $inventory = $player->getInventory();
                $inventory->removeItem($inventory->getItemInHand()->pop());
                $player->sendMessage(TextFormat::GRAY . "You have successfully redeemed access to the " . TextFormat::AQUA . "/fix " . TextFormat::GRAY . "command!");
            }
        }
        if ($item->getNamedTag()->hasTag("feedv")) {
            if ($player->hasPermission("essentials.feed.use")) {
                $player->sendMessage(TextFormat::GRAY . "You already have access to the " . TextFormat::AQUA . "/feed " . TextFormat::GRAY . "command!");
            } else {
                $usrdmg = $pureperms->getUserDataMgr();
                $usrdmg->setPermission($player, "essentials.feed.use");
                $inventory = $player->getInventory();
                $inventory->removeItem($inventory->getItemInHand()->pop());
                $player->sendMessage(TextFormat::GRAY . "You have successfully redeemed access to the " . TextFormat::AQUA . "/feed " . TextFormat::GRAY . "command!");
            }
        }
        if ($item->getNamedTag()->hasTag("flyv")) {
            if ($player->hasPermission("essentials.fly.use")) {
                $player->sendMessage(TextFormat::GRAY . "You already have access to the " . TextFormat::AQUA . "/fly " . TextFormat::GRAY . "command!");
            } else {
                $usrdmg = $pureperms->getUserDataMgr();
                $usrdmg->setPermission($player, "essentials.fly.use");
                $inventory = $player->getInventory();
                $inventory->removeItem($inventory->getItemInHand()->pop());
                $player->sendMessage(TextFormat::GRAY . "You have successfully redeemed access to the " . TextFormat::AQUA . "/fly " . TextFormat::GRAY . "command!");
            }
        }
        if ($item->getNamedTag()->hasTag("healv")) {
            if ($player->hasPermission("essentials.heal.use")) {
                $player->sendMessage(TextFormat::GRAY . "You already have access to the " . TextFormat::AQUA . "/heal " . TextFormat::GRAY . "command!");
            } else {
                $usrdmg = $pureperms->getUserDataMgr();
                $usrdmg->setPermission($player, "essentials.heal.use");
                $inventory = $player->getInventory();
                $inventory->removeItem($inventory->getItemInHand()->pop());
                $player->sendMessage(TextFormat::GRAY . "You have successfully redeemed access to the " . TextFormat::AQUA . "/heal " . TextFormat::GRAY . "command!");
            }
        }
        if ($item->getNamedTag()->hasTag("nickv")) {
            if ($player->hasPermission("essentials.nick.use")) {
                $player->sendMessage(TextFormat::GRAY . "You already have access to the " . TextFormat::AQUA . "/nick " . TextFormat::GRAY . "command!");
            } else {
                $usrdmg = $pureperms->getUserDataMgr();
                $usrdmg->setPermission($player, "essentials.nick.use");
                $inventory = $player->getInventory();
                $inventory->removeItem($inventory->getItemInHand()->pop());
                $player->sendMessage(TextFormat::GRAY . "You have successfully redeemed access to the " . TextFormat::AQUA . "/nick " . TextFormat::GRAY . "command!");
            }
        }
        if ($item->getNamedTag()->hasTag("topv")) {
            if ($player->hasPermission("essentials.top")) {
                $player->sendMessage(TextFormat::GRAY . "You already have access to the " . TextFormat::AQUA . "/top " . TextFormat::GRAY . "command!");
            } else {
                $usrdmg = $pureperms->getUserDataMgr();
                $usrdmg->setPermission($player, "essentials.top");
                $inventory = $player->getInventory();
                $inventory->removeItem($inventory->getItemInHand()->pop());
                $player->sendMessage(TextFormat::GRAY . "You have successfully redeemed access to the " . TextFormat::AQUA . "/top " . TextFormat::GRAY . "command!");
            }
        }
        if ($item->getNamedTag()->hasTag("fixallv")) {
            if ($player->hasPermission("essentials.repair.all")) {
                $player->sendMessage(TextFormat::GRAY . "You already have access to the " . TextFormat::AQUA . "/fix all " . TextFormat::GRAY . "command!");
            } else {
                $usrdmg = $pureperms->getUserDataMgr();
                $usrdmg->setPermission($player, "essentials.repair.all");
                $inventory = $player->getInventory();
                $inventory->removeItem($inventory->getItemInHand()->pop());
                $player->sendMessage(TextFormat::GRAY . "You have successfully redeemed access to the " . TextFormat::AQUA . "/fix all " . TextFormat::GRAY . "command!");
            }
        }
        if ($item->getNamedTag()->hasTag("colorchatv")) {
            if ($player->hasPermission("essentials.colorchat")) {
                $player->sendMessage(TextFormat::GRAY . "You already have access to " . TextFormat::AQUA . "color chat!");
            } else {
                $usrdmg = $pureperms->getUserDataMgr();
                $usrdmg->setPermission($player, "essentials.colorchat");
                $inventory = $player->getInventory();
                $inventory->removeItem($inventory->getItemInHand()->pop());
                $player->sendMessage(TextFormat::GRAY . "You have successfully redeemed access to " . TextFormat::AQUA . "color chat!");
            }
        }
        if ($item->getNamedTag()->hasTag("antiafkv")) {
            if ($player->hasPermission("essentials.afk.preventauto")) {
                $player->sendMessage(TextFormat::GRAY . "You already have access to " . TextFormat::AQUA . "Anti Afk!");
            } else {
                $usrdmg = $pureperms->getUserDataMgr();
                $usrdmg->setPermission($player, "essentials.afk.preventauto");
                $inventory = $player->getInventory();
                $inventory->removeItem($inventory->getItemInHand()->pop());
                $player->sendMessage(TextFormat::GRAY . "You have successfully redeemed access to " . TextFormat::AQUA . "Anti Afk!");
            }
        }
        if ($item->getNamedTag()->hasTag("backv")) {
            if ($player->hasPermission("essentials.back.ondeath")) {
                $player->sendMessage(TextFormat::GRAY . "You already have access to the " . TextFormat::AQUA . "/back" . TextFormat::GRAY . " command!");
            } else {
                $usrdmg = $pureperms->getUserDataMgr();
                $usrdmg->setPermission($player, "essentials.afk.preventauto");
                $inventory = $player->getInventory();
                $inventory->removeItem($inventory->getItemInHand()->pop());
                $player->sendMessage(TextFormat::GRAY . "You have successfully redeemed access to the " . TextFormat::AQUA . "/back" . TextFormat::GRAY . " command!");
            }
        }
        if ($item->getNamedTag()->hasTag("suicidev")) {
            if ($player->hasPermission("essentials.suicide")) {
                $player->sendMessage(TextFormat::GRAY . "You already have access to the " . TextFormat::AQUA . "/suicide" . TextFormat::GRAY . " command!");
            } else {
                $usrdmg = $pureperms->getUserDataMgr();
                $usrdmg->setPermission($player, "essentials.suicide");
                $inventory = $player->getInventory();
                $inventory->removeItem($inventory->getItemInHand()->pop());
                $player->sendMessage(TextFormat::GRAY . "You have successfully redeemed access to the " . TextFormat::AQUA . "/suicide" . TextFormat::GRAY . " command!");
            }
        }
        if ($item->getNamedTag()->hasTag("nearv")) {
            if ($player->hasPermission("essentials.near.use")) {
                $player->sendMessage(TextFormat::GRAY . "You already have access to the " . TextFormat::AQUA . "/near" . TextFormat::GRAY . " command!");
            } else {
                $usrdmg = $pureperms->getUserDataMgr();
                $usrdmg->setPermission($player, "essentials.near.use");
                $inventory = $player->getInventory();
                $inventory->removeItem($inventory->getItemInHand()->pop());
                $player->sendMessage(TextFormat::GRAY . "You have successfully redeemed access to the " . TextFormat::AQUA . "/near" . TextFormat::GRAY . " command!");
            }
        }
        if ($item->getNamedTag()->hasTag("condensev")) {
            if ($player->hasPermission("essentials.condense")) {
                $player->sendMessage(TextFormat::GRAY . "You already have access to the " . TextFormat::AQUA . "/condense" . TextFormat::GRAY . " command!");
            } else {
                $usrdmg = $pureperms->getUserDataMgr();
                $usrdmg->setPermission($player, "essentials.condense");
                $inventory = $player->getInventory();
                $inventory->removeItem($inventory->getItemInHand()->pop());
                $player->sendMessage(TextFormat::GRAY . "You have successfully redeemed access to the " . TextFormat::AQUA . "/condense" . TextFormat::GRAY . " command!");
            }
        }
        if ($item->getNamedTag()->hasTag("compassv")) {
            if ($player->hasPermission("essentials.compass")) {
                $player->sendMessage(TextFormat::GRAY . "You already have access to the " . TextFormat::AQUA . "/compass" . TextFormat::GRAY . " command!");
            } else {
                $usrdmg = $pureperms->getUserDataMgr();
                $usrdmg->setPermission($player, "essentials.compass");
                $inventory = $player->getInventory();
                $inventory->removeItem($inventory->getItemInHand()->pop());
                $player->sendMessage(TextFormat::GRAY . "You have successfully redeemed access to the " . TextFormat::AQUA . "/compass" . TextFormat::GRAY . " command!");
            }
        }
        if ($item->getNamedTag()->hasTag("clearinvv")) {
            if ($player->hasPermission("essentials.clearinventory.use")) {
                $player->sendMessage(TextFormat::GRAY . "You already have access to the " . TextFormat::AQUA . "/clear" . TextFormat::GRAY . " command!");
            } else {
                $usrdmg = $pureperms->getUserDataMgr();
                $usrdmg->setPermission($player, "essentials.clearinventory.use");
                $inventory = $player->getInventory();
                $inventory->removeItem($inventory->getItemInHand()->pop());
                $player->sendMessage(TextFormat::GRAY . "You have successfully redeemed access to the " . TextFormat::AQUA . "/clear" . TextFormat::GRAY . " command!");
            }
        }
    }
}




