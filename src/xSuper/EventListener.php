<?php

declare(strict_types=1);

namespace xSuper;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\item\enchantment\Enchantment;
use pocketmine\item\enchantment\EnchantmentInstance;
use pocketmine\item\Item;
use pocketmine\utils\TextFormat;
use pocketmine\Server;
use xSuper\Main;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\IntTag;

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
        $burgers = Server::getInstance()->getPluginManager()->getPlugin('BurgerSpawners');
        $item = $event->getItem();
        $player = $event->getPlayer();
        $inventory = $player->getInventory();
        if ($item->getId() == Item::BLAZE_POWDER) {
            $usrdmg = $pureperms->getUserDataMgr();
            if ($item->getNamedTag()->hasTag("fixv")) {
                $event->setCancelled();
                if ($player->hasPermission("essentials.repair.use")) {
                    $player->sendMessage(TextFormat::GRAY . "You already have access to the " . TextFormat::AQUA . "/fix " . TextFormat::GRAY . "command!");
                } else {
                    $usrdmg->setPermission($player, "essentials.repair.use");
                    $inventory->removeItem($inventory->getItemInHand()->pop());
                    $player->sendMessage(TextFormat::GRAY . "You have successfully redeemed access to the " . TextFormat::AQUA . "/fix " . TextFormat::GRAY . "command!");
                }
            }
            if ($item->getNamedTag()->hasTag("feedv")) {
                $event->setCancelled();
                if ($player->hasPermission("essentials.feed.use")) {
                    $player->sendMessage(TextFormat::GRAY . "You already have access to the " . TextFormat::AQUA . "/feed " . TextFormat::GRAY . "command!");
                } else {
                    $inventory->removeItem($inventory->getItemInHand()->pop());
                    $player->sendMessage(TextFormat::GRAY . "You have successfully redeemed access to the " . TextFormat::AQUA . "/feed " . TextFormat::GRAY . "command!");
                }
            }
            if ($item->getNamedTag()->hasTag("flyv")) {
                $event->setCancelled();
                if ($player->hasPermission("essentials.fly.use")) {
                    $player->sendMessage(TextFormat::GRAY . "You already have access to the " . TextFormat::AQUA . "/fly " . TextFormat::GRAY . "command!");
                } else {
                    $usrdmg->setPermission($player, "essentials.fly.use");
                    $inventory->removeItem($inventory->getItemInHand()->pop());
                    $player->sendMessage(TextFormat::GRAY . "You have successfully redeemed access to the " . TextFormat::AQUA . "/fly " . TextFormat::GRAY . "command!");
                }
            }
            if ($item->getNamedTag()->hasTag("healv")) {
                $event->setCancelled();
                if ($player->hasPermission("essentials.heal.use")) {
                    $player->sendMessage(TextFormat::GRAY . "You already have access to the " . TextFormat::AQUA . "/heal " . TextFormat::GRAY . "command!");
                } else {
                    $usrdmg->setPermission($player, "essentials.heal.use");
                    $inventory->removeItem($inventory->getItemInHand()->pop());
                    $player->sendMessage(TextFormat::GRAY . "You have successfully redeemed access to the " . TextFormat::AQUA . "/heal " . TextFormat::GRAY . "command!");
                }
            }
            if ($item->getNamedTag()->hasTag("nickv")) {
                $event->setCancelled();
                if ($player->hasPermission("essentials.nick.use")) {
                    $player->sendMessage(TextFormat::GRAY . "You already have access to the " . TextFormat::AQUA . "/nick " . TextFormat::GRAY . "command!");
                } else {
                    $usrdmg->setPermission($player, "essentials.nick.use");
                    $inventory->removeItem($inventory->getItemInHand()->pop());
                    $player->sendMessage(TextFormat::GRAY . "You have successfully redeemed access to the " . TextFormat::AQUA . "/nick " . TextFormat::GRAY . "command!");
                }
            }
            if ($item->getNamedTag()->hasTag("topv")) {
                $event->setCancelled();
                if ($player->hasPermission("essentials.top")) {
                    $player->sendMessage(TextFormat::GRAY . "You already have access to the " . TextFormat::AQUA . "/top " . TextFormat::GRAY . "command!");
                } else {
                    $usrdmg->setPermission($player, "essentials.top");
                    $inventory->removeItem($inventory->getItemInHand()->pop());
                    $player->sendMessage(TextFormat::GRAY . "You have successfully redeemed access to the " . TextFormat::AQUA . "/top " . TextFormat::GRAY . "command!");
                }
            }
            if ($item->getNamedTag()->hasTag("fixallv")) {
                $event->setCancelled();
                if ($player->hasPermission("essentials.repair.all")) {
                    $player->sendMessage(TextFormat::GRAY . "You already have access to the " . TextFormat::AQUA . "/fix all " . TextFormat::GRAY . "command!");
                } else {
                    $usrdmg->setPermission($player, "essentials.repair.all");
                    $inventory->removeItem($inventory->getItemInHand()->pop());
                    $player->sendMessage(TextFormat::GRAY . "You have successfully redeemed access to the " . TextFormat::AQUA . "/fix all " . TextFormat::GRAY . "command!");
                }
            }
            if ($item->getNamedTag()->hasTag("backv")) {
                $event->setCancelled();
                if ($player->hasPermission("essentials.back.ondeath")) {
                    $player->sendMessage(TextFormat::GRAY . "You already have access to the " . TextFormat::AQUA . "/back" . TextFormat::GRAY . " command!");
                } else {
                    $usrdmg->setPermission($player, "essentials.afk.preventauto");
                    $inventory->removeItem($inventory->getItemInHand()->pop());
                    $player->sendMessage(TextFormat::GRAY . "You have successfully redeemed access to the " . TextFormat::AQUA . "/back" . TextFormat::GRAY . " command!");
                }
            }
            if ($item->getNamedTag()->hasTag("suicidev")) {
                $event->setCancelled();
                if ($player->hasPermission("essentials.suicide")) {
                    $player->sendMessage(TextFormat::GRAY . "You already have access to the " . TextFormat::AQUA . "/suicide" . TextFormat::GRAY . " command!");
                } else {
                    $usrdmg->setPermission($player, "essentials.suicide");
                    $inventory->removeItem($inventory->getItemInHand()->pop());
                    $player->sendMessage(TextFormat::GRAY . "You have successfully redeemed access to the " . TextFormat::AQUA . "/suicide" . TextFormat::GRAY . " command!");
                }
            }
            if ($item->getNamedTag()->hasTag("nearv")) {
                $event->setCancelled();
                if ($player->hasPermission("essentials.near.use")) {
                    $player->sendMessage(TextFormat::GRAY . "You already have access to the " . TextFormat::AQUA . "/near" . TextFormat::GRAY . " command!");
                } else {
                    $usrdmg->setPermission($player, "essentials.near.use");
                    $inventory->removeItem($inventory->getItemInHand()->pop());
                    $player->sendMessage(TextFormat::GRAY . "You have successfully redeemed access to the " . TextFormat::AQUA . "/near" . TextFormat::GRAY . " command!");
                }
            }
            if ($item->getNamedTag()->hasTag("condensev")) {
                $event->setCancelled();
                if ($player->hasPermission("essentials.condense")) {
                    $player->sendMessage(TextFormat::GRAY . "You already have access to the " . TextFormat::AQUA . "/condense" . TextFormat::GRAY . " command!");
                } else {
                    $usrdmg->setPermission($player, "essentials.condense");
                    $inventory->removeItem($inventory->getItemInHand()->pop());
                    $player->sendMessage(TextFormat::GRAY . "You have successfully redeemed access to the " . TextFormat::AQUA . "/condense" . TextFormat::GRAY . " command!");
                }
            }
            if ($item->getNamedTag()->hasTag("compassv")) {
                $event->setCancelled();
                if ($player->hasPermission("essentials.compass")) {
                    $player->sendMessage(TextFormat::GRAY . "You already have access to the " . TextFormat::AQUA . "/compass" . TextFormat::GRAY . " command!");
                } else {
                    $usrdmg->setPermission($player, "essentials.compass");
                    $inventory->removeItem($inventory->getItemInHand()->pop());
                    $player->sendMessage(TextFormat::GRAY . "You have successfully redeemed access to the " . TextFormat::AQUA . "/compass" . TextFormat::GRAY . " command!");
                }
            }
            if ($item->getNamedTag()->hasTag("clearinvv")) {
                $event->setCancelled();
                if ($player->hasPermission("essentials.clearinventory.use")) {
                    $player->sendMessage(TextFormat::GRAY . "You already have access to the " . TextFormat::AQUA . "/clear" . TextFormat::GRAY . " command!");
                } else {
                    $usrdmg->setPermission($player, "essentials.clearinventory.use");
                    $inventory->removeItem($inventory->getItemInHand()->pop());
                    $player->sendMessage(TextFormat::GRAY . "You have successfully redeemed access to the " . TextFormat::AQUA . "/clear" . TextFormat::GRAY . " command!");
                }
            }
        }
        if ($item->getId() == Item::PAINTING) {
            $inventory = $player->getInventory();
            $item1 = Item::get(Item::DIAMOND_HELMET);
            $item2 = Item::get(Item::DIAMOND_CHESTPLATE);
            $item3 = Item::get(Item::DIAMOND_LEGGINGS);
            $item4 = Item::get(Item::DIAMOND_BOOTS);
            $item5 = Item::get(Item::GOLDEN_APPLE, 0, 128);
            $item6 = Item::get(Item::ENCHANTED_GOLDEN_APPLE, 0, 5);
            $item7 = Item::get(Item::COOKED_BEEF, 0, 64);
            $item8 = Item::get(Item::DIAMOND_SWORD);
            $item9 = Item::get(Item::GOLDEN_APPLE, 0, 64);
            $item10 = Item::get(Item::ENCHANTED_GOLDEN_APPLE, 0, 1);
            $item11 = Item::get(Item::GOLDEN_APPLE, 0, 32);
            $item12 = Item::get(Item::GOLDEN_APPLE, 0, 10);
            $item13 = Item::get(Item::IRON_HELMET);
            $item14 = Item::get(Item::IRON_CHESTPLATE);
            $item15 = Item::get(Item::IRON_LEGGINGS);
            $item16 = Item::get(Item::IRON_BOOTS);
            $item17 = Item::get(Item::IRON_SWORD);
            $item18 = Item::get(Item::GOLDEN_APPLE, 0, 2);
            if ($item->getNamedTag()->hasTag("zeusv")) {
                $item2 = Item::get(Item::DIAMOND_CHESTPLATE);
                $event->setCancelled();
                $enchantment = Enchantment::getEnchantment(0);
                $enchants = new EnchantmentInstance($enchantment, 4);
                $enchantment1 = Enchantment::getEnchantment(9);
                $enchants1 = new EnchantmentInstance($enchantment1, 4);
                $item1->setCustomName(TextFormat::BOLD . TextFormat::AQUA . "Zeus Helmet" . TextFormat::RESET);
                $item1->addEnchantment($enchants);
                $item2->setCustomName(TextFormat::BOLD . TextFormat::AQUA . "Zeus Chestplate" . TextFormat::RESET);
                $item2->addEnchantment($enchants);
                $item3->setCustomName(TextFormat::BOLD . TextFormat::AQUA . "Zeus Leggings" . TextFormat::RESET);
                $item3->addEnchantment($enchants);
                $item4->setCustomName(TextFormat::BOLD . TextFormat::AQUA . "Zeus Boots" . TextFormat::RESET);
                $item4->addEnchantment($enchants);
                $item8->setCustomName(TextFormat::BOLD . TextFormat::AQUA . "Zeus Sword" . TextFormat::RESET);
                $item8->addEnchantment($enchants1);
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
                $item2->setCustomName(TextFormat::BOLD . TextFormat::LIGHT_PURPLE . "Kronos Chestplate" . TextFormat::RESET);
                $item2->addEnchantment($enchants);
                $item3->setCustomName(TextFormat::BOLD . TextFormat::LIGHT_PURPLE . "Kronos Leggings" . TextFormat::RESET);
                $item3->addEnchantment($enchants);
                $item4->setCustomName(TextFormat::BOLD . TextFormat::LIGHT_PURPLE . "Kronos Boots" . TextFormat::RESET);
                $item4->addEnchantment($enchants);
                $item8->setCustomName(TextFormat::BOLD . TextFormat::LIGHT_PURPLE . "Kronos Sword" . TextFormat::RESET);
                $item8->addEnchantment($enchants1);
                $inventory = $player->getInventory();
                $inventory->addItem($item1, $item2, $item3, $item4, $item8, $item9, $item10, $item7);
                $inventory->removeItem($inventory->getItemInHand()->pop());
                return;
            }
            if ($item->getNamedTag()->hasTag("hadesv")) {
                $event->setCancelled();
                $enchantment = Enchantment::getEnchantment(0);
                $enchants = new EnchantmentInstance($enchantment, 3);
                $enchantment1 = Enchantment::getEnchantment(9);
                $enchants1 = new EnchantmentInstance($enchantment1, 3);
                $item1->setCustomName(TextFormat::BOLD . TextFormat::RED . "Hades Helmet" . TextFormat::RESET);
                $item1->addEnchantment($enchants);
                $item2->setCustomName(TextFormat::BOLD . TextFormat::RED . "Hades Chestplate" . TextFormat::RESET);
                $item2->addEnchantment($enchants);
                $item3->setCustomName(TextFormat::BOLD . TextFormat::RED . "Hades Leggings" . TextFormat::RESET);
                $item3->addEnchantment($enchants);
                $item4->setCustomName(TextFormat::BOLD . TextFormat::RED . "Hades Boots" . TextFormat::RESET);
                $item4->addEnchantment($enchants);
                $item8->setCustomName(TextFormat::BOLD . TextFormat::RED . "Hades Sword" . TextFormat::RESET);
                $item8->addEnchantment($enchants1);
                $inventory = $player->getInventory();
                $inventory->addItem($item1, $item2, $item3, $item4, $item8, $item11, $item7);
                $inventory->removeItem($inventory->getItemInHand()->pop());
                return;
            }
            if ($item->getNamedTag()->hasTag("godv")) {
                $event->setCancelled();
                $enchantment = Enchantment::getEnchantment(0);
                $enchants = new EnchantmentInstance($enchantment, 2);
                $enchantment1 = Enchantment::getEnchantment(9);
                $enchants1 = new EnchantmentInstance($enchantment1, 2);
                $item1->setCustomName(TextFormat::BOLD . TextFormat::GOLD . "God Helmet" . TextFormat::RESET);
                $item1->addEnchantment($enchants);
                $item2->setCustomName(TextFormat::BOLD . TextFormat::GOLD . "God Chestplate" . TextFormat::RESET);
                $item2->addEnchantment($enchants);
                $item3->setCustomName(TextFormat::BOLD . TextFormat::GOLD . "God Leggings" . TextFormat::RESET);
                $item3->addEnchantment($enchants);
                $item4->setCustomName(TextFormat::BOLD . TextFormat::GOLD . "God Boots" . TextFormat::RESET);
                $item4->addEnchantment($enchants);
                $item8->setCustomName(TextFormat::BOLD . TextFormat::GOLD . "God Sword" . TextFormat::RESET);
                $item8->addEnchantment($enchants1);
                $inventory = $player->getInventory();
                $inventory->addItem($item1, $item2, $item3, $item4, $item8, $item12, $item7);
                $inventory->removeItem($inventory->getItemInHand()->pop());
                return;
            }
            if ($item->getNamedTag()->hasTag("demigodv")) {
                $event->setCancelled();
                $enchantment = Enchantment::getEnchantment(0);
                $enchants = new EnchantmentInstance($enchantment, 2);
                $enchantment1 = Enchantment::getEnchantment(9);
                $enchants1 = new EnchantmentInstance($enchantment1, 2);
                $item13->setCustomName(TextFormat::BOLD . TextFormat::GRAY . "Demigod Helmet" . TextFormat::RESET);
                $item13->addEnchantment($enchants);
                $item14->setCustomName(TextFormat::BOLD . TextFormat::GRAY . "Demigod Chestplate" . TextFormat::RESET);
                $item14->addEnchantment($enchants);
                $item15->setCustomName(TextFormat::BOLD . TextFormat::GRAY . "Demigod Leggings" . TextFormat::RESET);
                $item15->addEnchantment($enchants);
                $item16->setCustomName(TextFormat::BOLD . TextFormat::GRAY . "Demigod Boots" . TextFormat::RESET);
                $item16->addEnchantment($enchants);
                $item17->setCustomName(TextFormat::BOLD . TextFormat::GRAY . "Demigod Sword" . TextFormat::RESET);
                $item17->addEnchantment($enchants1);
                $inventory = $player->getInventory();
                $inventory->addItem($item13, $item14, $item15, $item16, $item17, $item18, $item7);
                $inventory->removeItem($inventory->getItemInHand()->pop());
                return;
            }
        }
        if ($item->getId() == Item::FEATHER) {
            $inventory = $player->getInventory();
            $usrdmg = $pureperms->getUserDataMgr();
            if ($item->getNamedTag()->hasTag("colorchatv")) {
                $event->setCancelled();
                if ($player->hasPermission("essentials.colorchat")) {
                    $player->sendMessage(TextFormat::GRAY . "You already have access to " . TextFormat::AQUA . "color chat!");
                } else {
                    $usrdmg->setPermission($player, "essentials.colorchat");
                    $inventory->removeItem($inventory->getItemInHand()->pop());
                    $player->sendMessage(TextFormat::GRAY . "You have successfully redeemed access to " . TextFormat::AQUA . "color chat!");
                }
            }
            if ($item->getNamedTag()->hasTag("antiafkv")) {
                $event->setCancelled();
                if ($player->hasPermission("essentials.afk.preventauto")) {
                    $player->sendMessage(TextFormat::GRAY . "You already have access to " . TextFormat::AQUA . "Anti Afk!");
                } else {
                    $usrdmg->setPermission($player, "essentials.afk.preventauto");
                    $inventory->removeItem($inventory->getItemInHand()->pop());
                    $player->sendMessage(TextFormat::GRAY . "You have successfully redeemed access to " . TextFormat::AQUA . "Anti Afk!");
                }
            }
        }
        if ($item->getId() == Item::PAPER) {
            $usrdmg = $pureperms->getUserDataMgr();
            $currentgroup = $usrdmg->getGroup($player);
            $currentgroupName = $currentgroup->getName();
            $inventory = $player->getInventory();
            $event->setCancelled();
            if ($item->getNamedTag()->hasTag("Demigod")) {
                if ($currentgroupName == "Mortal") {
                    $newgroup = $pureperms->GetGroup("Demigod");
                    $usrdmg->setGroup($player, $newgroup, null);
                    $inventory->removeItem($inventory->getItemInHand()->pop());
                    $player->sendMessage(TextFormat::GRAY . "You have successfully redeemed the " . TextFormat::AQUA . "Demigod " . TextFormat::GRAY . "rank!");
                } else {
                    $player->sendMessage(TextFormat::GRAY . "You already have " . TextFormat::AQUA . "Demigod " . TextFormat::GRAY . "or higher!");
                }
            }
            if ($item->getNamedTag()->hasTag("God")) {
                $event->setCancelled();
                if ($currentgroupName == "Mortal") {
                    $newgroup = $pureperms->GetGroup("God");
                    $usrdmg->setGroup($player, $newgroup, null);
                    $inventory->removeItem($inventory->getItemInHand()->pop());
                    $player->sendMessage(TextFormat::GRAY . "You have successfully redeemed the " . TextFormat::AQUA . "God " . TextFormat::GRAY . "rank!");
                }
                if ($currentgroupName == "Demigod") {
                    $newgroup = $pureperms->GetGroup("God");
                    $usrdmg->setGroup($player, $newgroup, null);
                    $inventory->removeItem($inventory->getItemInHand()->pop());
                    $player->sendMessage(TextFormat::GRAY . "You have successfully redeemed the " . TextFormat::AQUA . "God " . TextFormat::GRAY . "rank!");
                } else {
                    $player->sendMessage(TextFormat::GRAY . "You already have " . TextFormat::AQUA . "God " . TextFormat::GRAY . "or higher!");
                }
            }
            if ($item->getNamedTag()->hasTag("Hades")) {
                $event->setCancelled();
                if ($currentgroupName == "Mortal") {
                    $newgroup = $pureperms->GetGroup("Hades");
                    $usrdmg->setGroup($player, $newgroup, null);
                    $inventory->removeItem($inventory->getItemInHand()->pop());
                    $player->sendMessage(TextFormat::GRAY . "You have successfully redeemed the " . TextFormat::AQUA . "Hades " . TextFormat::GRAY . "rank!");
                }
                if ($currentgroupName == "Demigod") {
                    $newgroup = $pureperms->GetGroup("Hades");
                    $usrdmg->setGroup($player, $newgroup, null);
                    $inventory->removeItem($inventory->getItemInHand()->pop());
                    $player->sendMessage(TextFormat::GRAY . "You have successfully redeemed the " . TextFormat::AQUA . "Hades " . TextFormat::GRAY . "rank!");
                }
                if ($currentgroupName == "God") {
                    $newgroup = $pureperms->GetGroup("Hades");
                    $usrdmg->setGroup($player, $newgroup, null);
                    $inventory->removeItem($inventory->getItemInHand()->pop());
                    $player->sendMessage(TextFormat::GRAY . "You have successfully redeemed the " . TextFormat::AQUA . "Hades " . TextFormat::GRAY . "rank!");
                } else {
                    $player->sendMessage(TextFormat::GRAY . "You already have " . TextFormat::AQUA . "Hades " . TextFormat::GRAY . "or higher!");
                }
            }
            if ($item->getNamedTag()->hasTag("Kronos")) {
                $event->setCancelled();
                if ($currentgroupName == "Mortal") {
                    $newgroup = $pureperms->GetGroup("Kronos");
                    $usrdmg->setGroup($player, $newgroup, null);
                    $inventory->removeItem($inventory->getItemInHand()->pop());
                    $player->sendMessage(TextFormat::GRAY . "You have successfully redeemed the " . TextFormat::AQUA . "Kronos " . TextFormat::GRAY . "rank!");
                }
                if ($currentgroupName == "Demigod") {
                    $newgroup = $pureperms->GetGroup("Kronos");
                    $usrdmg->setGroup($player, $newgroup, null);
                    $inventory->removeItem($inventory->getItemInHand()->pop());
                    $player->sendMessage(TextFormat::GRAY . "You have successfully redeemed the " . TextFormat::AQUA . "Kronos " . TextFormat::GRAY . "rank!");
                }
                if ($currentgroupName == "God") {
                    $newgroup = $pureperms->GetGroup("Kronos");
                    $usrdmg->setGroup($player, $newgroup, null);
                    $inventory->removeItem($inventory->getItemInHand()->pop());
                    $player->sendMessage(TextFormat::GRAY . "You have successfully redeemed the " . TextFormat::AQUA . "Kronos " . TextFormat::GRAY . "rank!");
                }
                if ($currentgroupName == "Hades") {
                    $newgroup = $pureperms->GetGroup("Kronos");
                    $usrdmg->setGroup($player, $newgroup, null);
                    $inventory->removeItem($inventory->getItemInHand()->pop());
                    $player->sendMessage(TextFormat::GRAY . "You have successfully redeemed the " . TextFormat::AQUA . "Kronos " . TextFormat::GRAY . "rank!");
                } else {
                    $player->sendMessage(TextFormat::GRAY . "You already have " . TextFormat::AQUA . "Kronos " . TextFormat::GRAY . "or higher!");
                }
            }
            if ($item->getNamedTag()->hasTag("Zeus")) {
                $event->setCancelled();
                if ($currentgroupName == "Mortal") {
                    $newgroup = $pureperms->GetGroup("Zeus");
                    $usrdmg->setGroup($player, $newgroup, null);
                    $inventory->removeItem($inventory->getItemInHand()->pop());
                    $player->sendMessage(TextFormat::GRAY . "You have successfully redeemed the " . TextFormat::AQUA . "Zeus " . TextFormat::GRAY . "rank!");
                }
                if ($currentgroupName == "Demigod") {
                    $newgroup = $pureperms->GetGroup("Zeus");
                    $usrdmg->setGroup($player, $newgroup, null);
                    $inventory->removeItem($inventory->getItemInHand()->pop());
                    $player->sendMessage(TextFormat::GRAY . "You have successfully redeemed the " . TextFormat::AQUA . "Zeus " . TextFormat::GRAY . "rank!");
                }
                if ($currentgroupName == "God") {
                    $newgroup = $pureperms->GetGroup("Zeus");
                    $usrdmg->setGroup($player, $newgroup, null);
                    $inventory->removeItem($inventory->getItemInHand()->pop());
                    $player->sendMessage(TextFormat::GRAY . "You have successfully redeemed the " . TextFormat::AQUA . "Zeus " . TextFormat::GRAY . "rank!");
                }
                if ($currentgroupName == "Hades") {
                    $newgroup = $pureperms->GetGroup("Zeus");
                    $usrdmg->setGroup($player, $newgroup, null);
                    $inventory->removeItem($inventory->getItemInHand()->pop());
                    $player->sendMessage(TextFormat::GRAY . "You have successfully redeemed the " . TextFormat::AQUA . "Zeus " . TextFormat::GRAY . "rank!");
                }
                if ($currentgroupName == "Kronos") {
                    $newgroup = $pureperms->GetGroup("Zeus");
                    $usrdmg->setGroup($player, $newgroup, null);
                    $inventory->removeItem($inventory->getItemInHand()->pop());
                    $player->sendMessage(TextFormat::GRAY . "You have successfully redeemed the " . TextFormat::AQUA . "Zeus " . TextFormat::GRAY . "rank!");
                } else {
                    $player->sendMessage(TextFormat::GRAY . "You already have " . TextFormat::AQUA . "Zeus " . TextFormat::GRAY . "or higher!");
                }
            }
        }
        if ($item->getId() == Item::CHEST) {
            $inventory = $player->getInventory();
            if ($item->getNamedTag()->hasTag("commons")) {
                $name = "Wolf";
                $amount = 25;
                $name1 = "Sheep";
                $name2 = "Mooshroom";
                $name3 = "Pig";
                $item1 = Main::$instance->getSpawner($name, $amount);
                $item2 = Main::$instance->getSpawner($name1, $amount);
                $item3 = Main::$instance->getSpawner($name2, $amount);
                $item4 = Main::$instance->getSpawner($name3, $amount);
                $inventory->addItem($item1, $item2, $item3, $item4);
                $inventory->removeItem($inventory->getItemInHand()->pop());
                $player->sendMessage(TextFormat::GRAY . "You have succesfully opened a " . TextFormat::AQUA . "Common Spawner " . TextFormat::GRAY . "crate!");
            }
            if ($item->getNamedTag()->hasTag("uncommons")) {
                $name = "Creeper";
                $amount = 25;
                $name1 = "Zombie";
                $name2 = "Spider";
                $name3 = "Skeleton";
                $item1 = Main::$instance->getSpawner($name, $amount);
                $item2 = Main::$instance->getSpawner($name1, $amount);
                $item3 = Main::$instance->getSpawner($name2, $amount);
                $item4 = Main::$instance->getSpawner($name3, $amount);
                $inventory->addItem($item1, $item2, $item3, $item4);
                $inventory->removeItem($inventory->getItemInHand()->pop());
                $player->sendMessage(TextFormat::GRAY . "You have succesfully opened a " . TextFormat::AQUA . "Uncommon Spawner " . TextFormat::GRAY . "crate!");
            }
            if ($item->getNamedTag()->hasTag("rares")) {
                $name = "Cave Spider";
                $amount = 25;
                $name1 = "Enderman";
                $name2 = "Blaze";
                $name3 = "Guardian";
                $item1 = Main::$instance->getSpawner($name, $amount);
                $item2 = Main::$instance->getSpawner($name1, $amount);
                $item3 = Main::$instance->getSpawner($name2, $amount);
                $item4 = Main::$instance->getSpawner($name3, $amount);
                $inventory->addItem($item1, $item2, $item3, $item4);
                $inventory->removeItem($inventory->getItemInHand()->pop());
                $player->sendMessage(TextFormat::GRAY . "You have succesfully opened a " . TextFormat::AQUA . "Rare Spawner " . TextFormat::GRAY . "crate!");
            }
            if ($item->getNamedTag()->hasTag("epics")) {
                $name = "Vindicator";
                $amount = 25;
                $name1 = "Iron Golem";
                $name2 = "Zombiepigman";
                $item1 = Main::$instance->getSpawner($name, $amount);
                $item2 = Main::$instance->getSpawner($name1, $amount);
                $item3 = Main::$instance->getSpawner($name2, $amount);
                $inventory->addItem($item1, $item2, $item3);
                $inventory->removeItem($inventory->getItemInHand()->pop());
                $player->sendMessage(TextFormat::GRAY . "You have succesfully opened a " . TextFormat::AQUA . "Epic Spawner " . TextFormat::GRAY . "crate!");
            }
        }
    }
    public function onBlockPlaceEvent(PlayerInteractEvent $event): void
    {
        $item = $event->getItem();
        $player = $event->getPlayer();
        if ($item->getId() == Item::CHEST) {
            if ($item->getNamedTag()->hasTag("epics")) {
                $event->setCancelled();
            }
            if ($item->getNamedTag()->hasTag("uncommons")) {
                $event->setCancelled();
            }
            if ($item->getNamedTag()->hasTag("commons")) {
                $event->setCancelled();
            }
            if ($item->getNamedTag()->hasTag("rares")) {
                $event->setCancelled();
            }
        }
    }
}








