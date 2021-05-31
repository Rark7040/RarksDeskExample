<?php

declare(strict_types = 1);

namespace rarksdesk\example;

use pocketmine\plugin\PluginBase;
use rarksdesk\Hook;


final class Main extends PluginBase{

	public function onEnable(){
		Hook::register($this);
		self::registerCommands();
		self::startTask();
	}

	private static function registerCommands():void{
		new ExampleCommand;
	}

	private static function startTask():void{
		Hook::get()->getScheduler()->scheduleRepeatingTask(new DisplayScoreTask);
	}
}