<?php

declare(strict_types = 1);

namespace rarksdesk\example;

use pocketmine\plugin\PluginBase;
use rarksdesk\Hook;
use rarksdesk\example\command\RarksDeskCommand;
use rarksdesk\example\task\DisplayScoreTask;

final class Main extends PluginBase{

	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents(new EventListener, $this);
		Hook::register($this);
		self::registerCommands();
		self::startTask();
	}

	private static function registerCommands():void{
		new RarksDeskCommand;
	}

	private static function startTask():void{
		Hook::get()->getScheduler()->scheduleRepeatingTask(new DisplayScoreTask, 20);
	}
}