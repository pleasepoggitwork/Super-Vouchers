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
        if ($item->getId() == Item::BLAZE_POWDER) {
            if ($item->getNamedTag()->hasTag("fixv")) {
                $event->setCancelled();
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
                $event->setCancelled();
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
                $event->setCancelled();
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
                $event->setCancelled();
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
                $event->setCancelled();
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
                $event->setCancelled();
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
                $event->setCancelled();
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
                $event->setCancelled();
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
                $event->setCancelled();
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
                $event->setCancelled();
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
                $event->setCancelled();
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
                $event->setCancelled();
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
                $event->setCancelled();
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
        if ($item->getId() == Item::PAINTING) {
            if ($item->getNamedTag()->hasTag("zuesv")) {
                $event->setCancelled();
                $enchantment = Enchantment::getEnchantment(0);
                $enchants = new EnchantmentInstance($enchantment, 4);
                $enchantment1 = Enchantment::getEnchantment(9);
                $enchants1 = new EnchantmentInstance($enchantment1, 4);
                $item1 = Item::get(Item::DIAMOND_HELMET);
                $item1->setCustomName(TextFormat::BOLD . TextFormat::AQUA . "Zues Helmet" . TextFormat::RESET);
                $item1->addEnchantment($enchants);
                $item2 = Item::get(Item::DIAMOND_CHESTPLATE);
                $item2->setCustomName(TextFormat::BOLD . TextFormat::AQUA . "Zues Chestplate" . TextFormat::RESET);
                $item2->addEnchantment($enchants);
                $item3 = Item::get(Item::DIAMOND_LEGGINGS);
                $item3->setCustomName(TextFormat::BOLD . TextFormat::AQUA . "Zues Leggings" . TextFormat::RESET);
                $item3->addEnchantment($enchants);
                $item4 = Item::get(Item::DIAMOND_BOOTS);
                $item4->setCustomName(TextFormat::BOLD . TextFormat::AQUA . "Zues Boots" . TextFormat::RESET);
                $item4->addEnchantment($enchants);
                $item5 = Item::get(Item::GOLDEN_APPLE, 0, 128);
                $item6 = Item::get(Item::ENCHANTED_GOLDEN_APPLE, 0, 5);
                $item7 = Item::get(Item::COOKED_BEEF, 0, 64);
                $item8 = Item::get(Item::DIAMOND_SWORD);
                $item8->setCustomName(TextFormat::BOLD . TextFormat::AQUA . "Zues Sword" . TextFormat::RESET);
                $item8->addEnchantment($enchants1);
                $inventory = $player->getInventory();
                $inventory->addItem($item1, $item2, $item3, $item4, $item8, $item5, $item6, $item7);
                $inventory->removeItem($inventory->getItemInHand()->pop());
                return;
            }
            if ($item->getNamedTag()->hasTag("kronosv")) {
                $event->setCancelled();
                $enchantment = Enchantment::getEnchantment(0);
                $enchants = new EnchantmentInstance($enchantment, 4);
                $enchantment1 = Enchantment::getEnchantment(9);
                $enchants1 = new EnchantmentInstance($enchantment1, 4);
                $item1 = Item::get(Item::DIAMOND_HELMET);
                $item1->setCustomName(TextFormat::BOLD . TextFormat::LIGHT_PURPLE . "Kronos Helmet" . TextFormat::RESET);
                $item1->addEnchantment($enchants);
                $item2 = Item::get(Item::DIAMOND_CHESTPLATE);
                $item2->setCustomName(TextFormat::BOLD . TextFormat::LIGHT_PURPLE . "Kronos Chestplate" . TextFormat::RESET);
                $item2->addEnchantment($enchants);
                $item3 = Item::get(Item::DIAMOND_LEGGINGS);
                $item3->setCustomName(TextFormat::BOLD . TextFormat::LIGHT_PURPLE . "Kronos Leggings" . TextFormat::RESET);
                $item3->addEnchantment($enchants);
                $item4 = Item::get(Item::DIAMOND_BOOTS);
                $item4->setCustomName(TextFormat::BOLD . TextFormat::LIGHT_PURPLE . "Kronos Boots" . TextFormat::RESET);
                $item4->addEnchantment($enchants);
                $item5 = Item::get(Item::GOLDEN_APPLE, 0, 64);
                $item6 = Item::get(Item::ENCHANTED_GOLDEN_APPLE, 0, 1);
                $item7 = Item::get(Item::COOKED_BEEF, 0, 64);
                $item8 = Item::get(Item::DIAMOND_SWORD);
                $item8->setCustomName(TextFormat::BOLD . TextFormat::LIGHT_PURPLE . "Kronos Sword" . TextFormat::RESET);
                $item8->addEnchantment($enchants1);
                $inventory = $player->getInventory();
                $inventory->addItem($item1, $item2, $item3, $item4, $item8, $item5, $item6, $item7);
                $inventory->removeItem($inventory->getItemInHand()->pop());
                return;
            }
            if ($item->getNamedTag()->hasTag("hadesv")) {
                $event->setCancelled();
                $enchantment = Enchantment::getEnchantment(0);
                $enchants = new EnchantmentInstance($enchantment, 3);
                $enchantment1 = Enchantment::getEnchantment(9);
                $enchants1 = new EnchantmentInstance($enchantment1, 3);
                $item1 = Item::get(Item::DIAMOND_HELMET);
                $item1->setCustomName(TextFormat::BOLD . TextFormat::RED . "Hades Helmet" . TextFormat::RESET);
                $item1->addEnchantment($enchants);
                $item2 = Item::get(Item::DIAMOND_CHESTPLATE);
                $item2->setCustomName(TextFormat::BOLD . TextFormat::RED . "Hades Chestplate" . TextFormat::RESET);
                $item2->addEnchantment($enchants);
                $item3 = Item::get(Item::DIAMOND_LEGGINGS);
                $item3->setCustomName(TextFormat::BOLD . TextFormat::RED . "Hades Leggings" . TextFormat::RESET);
                $item3->addEnchantment($enchants);
                $item4 = Item::get(Item::DIAMOND_BOOTS);
                $item4->setCustomName(TextFormat::BOLD . TextFormat::RED . "Hades Boots" . TextFormat::RESET);
                $item4->addEnchantment($enchants);
                $item5 = Item::get(Item::GOLDEN_APPLE, 0, 32);
                $item7 = Item::get(Item::COOKED_BEEF, 0, 64);
                $item8 = Item::get(Item::DIAMOND_SWORD);
                $item8->setCustomName(TextFormat::BOLD . TextFormat::RED . "Hades Sword" . TextFormat::RESET);
                $item8->addEnchantment($enchants1);
                $inventory = $player->getInventory();
                $inventory->addItem($item1, $item2, $item3, $item4, $item8, $item5, $item7);
                $inventory->removeItem($inventory->getItemInHand()->pop());
                return;
            }
            if ($item->getNamedTag()->hasTag("godv")) {
                $event->setCancelled();
                $enchantment = Enchantment::getEnchantment(0);
                $enchants = new EnchantmentInstance($enchantment, 2);
                $enchantment1 = Enchantment::getEnchantment(9);
                $enchants1 = new EnchantmentInstance($enchantment1, 2);
                $item1 = Item::get(Item::DIAMOND_HELMET);
                $item1->setCustomName(TextFormat::BOLD . TextFormat::GOLD . "God Helmet" . TextFormat::RESET);
                $item1->addEnchantment($enchants);
                $item2 = Item::get(Item::DIAMOND_CHESTPLATE);
                $item2->setCustomName(TextFormat::BOLD . TextFormat::GOLD . "God Chestplate" . TextFormat::RESET);
                $item2->addEnchantment($enchants);
                $item3 = Item::get(Item::DIAMOND_LEGGINGS);
                $item3->setCustomName(TextFormat::BOLD . TextFormat::GOLD . "God Leggings" . TextFormat::RESET);
                $item3->addEnchantment($enchants);
                $item4 = Item::get(Item::DIAMOND_BOOTS);
                $item4->setCustomName(TextFormat::BOLD . TextFormat::GOLD . "God Boots" . TextFormat::RESET);
                $item4->addEnchantment($enchants);
                $item5 = Item::get(Item::GOLDEN_APPLE, 0, 10);
                $item7 = Item::get(Item::COOKED_BEEF, 0, 64);
                $item8 = Item::get(Item::DIAMOND_SWORD);
                $item8->setCustomName(TextFormat::BOLD . TextFormat::GOLD . "God Sword" . TextFormat::RESET);
                $item8->addEnchantment($enchants1);
                $inventory = $player->getInventory();
                $inventory->addItem($item1, $item2, $item3, $item4, $item8, $item5, $item7);
                $inventory->removeItem($inventory->getItemInHand()->pop());
                return;
            }
            if ($item->getNamedTag()->hasTag("demigodv")) {
                $event->setCancelled();
                $enchantment = Enchantment::getEnchantment(0);
                $enchants = new EnchantmentInstance($enchantment, 2);
                $enchantment1 = Enchantment::getEnchantment(9);
                $enchants1 = new EnchantmentInstance($enchantment1, 2);
                $item1 = Item::get(Item::IRON_HELMET);
                $item1->setCustomName(TextFormat::BOLD . TextFormat::GRAY . "Demigod Helmet" . TextFormat::RESET);
                $item1->addEnchantment($enchants);
                $item2 = Item::get(Item::IRON_CHESTPLATE);
                $item2->setCustomName(TextFormat::BOLD . TextFormat::GRAY . "Demigod Chestplate" . TextFormat::RESET);
                $item2->addEnchantment($enchants);
                $item3 = Item::get(Item::IRON_LEGGINGS);
                $item3->setCustomName(TextFormat::BOLD . TextFormat::GRAY . "Demigod Leggings" . TextFormat::RESET);
                $item3->addEnchantment($enchants);
                $item4 = Item::get(Item::IRON_BOOTS);
                $item4->setCustomName(TextFormat::BOLD . TextFormat::GRAY . "Demigod Boots" . TextFormat::RESET);
                $item4->addEnchantment($enchants);
                $item5 = Item::get(Item::GOLDEN_APPLE, 0, 2);
                $item7 = Item::get(Item::COOKED_BEEF, 0, 64);
                $item8 = Item::get(Item::IRON_SWORD);
                $item8->setCustomName(TextFormat::BOLD . TextFormat::GRAY . "Demigod Sword" . TextFormat::RESET);
                $item8->addEnchantment($enchants1);
                $inventory = $player->getInventory();
                $inventory->addItem($item1, $item2, $item3, $item4, $item8, $item5, $item7);
                $inventory->removeItem($inventory->getItemInHand()->pop());
                return;
            }
        }
        if ($item->getId() == Item::FEATHER) {
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
        }
    }
}


