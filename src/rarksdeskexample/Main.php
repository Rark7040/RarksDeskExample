<?php

declare(strict_types = 1);

namespace rarksdeskexample;

addon\AddonMng::load();
use pocketmine\plugin\PluginBase;
use rarksdesk\Hook;
use rarksdeskexample\command\RarksDeskCommand;
use rarksdeskexample\task\DisplayScoreTask;


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