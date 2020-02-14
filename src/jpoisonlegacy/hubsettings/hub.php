<?php

/**This is my very first plugin, so it has many error. I don't know how to gix the error.
  *help me pls cuz I just want own a plugin that made by me
  *I hope I successfully made this plugin
  *huh
*/

namespace jpoisonlegacy\hubsettings

use pocketmine\plugin\PluginBase;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\item\Item;
use pocketmine\command\CommandExecutor;
use onebone\economyapi\EconomyAPI;


class hub extends PluginBase implements Listener {

  public function onEnable()
  {
    $this->getLogger()->info("Hub-Plugin-for-DreamWorld-ENABLED")
  }
  
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
