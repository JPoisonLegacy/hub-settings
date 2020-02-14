<?php

/**This is my very first plugin, so it has many error. I don't know how to gix the error.
  *help me pls cuz I just want own a plugin that made by me
  *I hope I successfully made this plugin
  *huh
*/

namespace jpoisonlegacy\hubsettings;
use pocketmine\level\sound\PopSound;
use pocketmine\Server;
use pocketmine\entity\Villager;
use pocketmine\event\inventory\InventoryCloseEvent;
use pocketmine\event\inventory\InventoryPickupItemEvent;
use pocketmine\event\inventory\InventoryTransactionEvent;
use pocketmine\event\player\PlayerItemHeldEvent;
use pocketmine\inventory\ChestInventory;
use pocketmine\entity\Entity;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\tile\Chest;
use pocketmine\level\format\FullChunk;

use pocketmine\permission\Permission;
use pocketmine\nbt\NBT;
use pocketmine\nbt\tag\ByteTag;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\DoubleTag;
use pocketmine\nbt\tag\FloatTag;
use pocketmine\nbt\tag\IntTag;
use pocketmine\nbt\tag\ListTag;
use pocketmine\nbt\tag\ShortTag;
use pocketmine\nbt\tag\StringTag;
use pocketmine\block\Air;

use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\player\PlayerLoginEvent;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\utils\TextFormat as TE;
use pocketmine\utils\Config;
use pocketmine\event\entity\EntityLevelChangeEvent;
use pocketmine\level\Position;
use pocketmine\Player;
use pocketmine\tile\Sign;
use pocketmine\level\Level;
use pocketmine\item\Item;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\block\BlockPlaceEvent;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use onebone\economyapi\EconomyAPI;
use pocketmine\event\player\PlayerQuitEvent;
use murder\murder\ResetMap;
use pocketmine\math\Vector3;
use pocketmine\block\Block;


class hub extends PluginBase implements Listener {

	public function onEnable()
	{
  public function onInteract(PlayerInteractEvent $event){
    $player = $event->getPlayer();
    $item = $event->getItem();
    
    if($item instanceof Compass){
        $api = Server::getInstance()->getPluginManager()->getPlugin("FormAPI");
        if ($api === null || $api->isDisabled()) {
            return;
        }
        $form = $api->createSimpleForm(function (Player $sender, ?int $result = null) {
            if ($result === null) {
                return true;
            }
            switch ($result) {
                case 0:
                    Server::getInstance()->dispatchCommand($sender, "warp 1v1");
                    break;
                case 1:
                    Server::getInstance()->dispatchCommand($sender, "warp skywar");
                    break;
                case 2:
                    Server::getInstance()->dispatchCommand($sender, "warp bedwar");
                    break;
                case 3:
                    Server::getInstance()->dispatchCommand($sender, "warp survival");
                    break;
            }
            return false;
        });
        $form->setTitle("§l§aGames§bList§r");
        $form->setContent("§k!!§r§fGames§0List§r");
        $form->addButton("1v1");
        $form->addButton("Skywar");
        $form->addButton("Bedwar");
        $form->addButton("Survival");
        $form->sendToPlayer($player);
    }
  }
}
