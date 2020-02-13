<?php

namespace jpoisonlegacy\hub-settings
use pocketmine\plugin\PluginBase;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\item\Item;
use pocketmine\command\CommandExecutor;


class hub extends PluginBase implements Listener {

  public function onEnable()
  {
    $this->getLogger()->info("Hub-Plugin-for-DreamWorld-ENABLED")
  }
  
  public function onInteract(PlayerInteractEvent $event)
	{
    $player = $event->getPlayer();
    $item = $event->getItem();
    $tile = $player->getLevel()->getTile($item);
    
    if($tile instanceof Compass)
    {
    }
  }
}
