<?php

declare(strict_types = 1);

namespace rarksdeskexample;

use pocketmine\event\{
	Listener,
	player\PlayerJoinEvent
};
use rarksdesk\permission\Tag;


final class EventListener implements Listener{

	public function onJoinPlayer(PlayerJoinEvent $event):void{
		$player = $event->getPlayer();
		if($player->isOp() and !Tag::has($player, 'example.tag.op')) Tag::add($player, 'example.tag.op');
		if(!Tag::has($player, 'example.tag.player')) Tag::add($player, 'example.tag.player');
	}
}