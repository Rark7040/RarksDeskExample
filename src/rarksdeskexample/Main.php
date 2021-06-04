<?php

declare(strict_types = 1);

namespace rarksdeskexample;

Phar::loadPhar(__DIR__.'/addon/RarksDesk.phar', 'RarksDesk');
require_once 'phar://RarksDesk/rarksdesk/Hook.php';
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