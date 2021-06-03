<?php

declare(strict_types = 1);

namespace rarksdesk\example\command;

use pocketmine\command\CommandSender;
use rarksdesk\command\SubCommand;
use rarksdesk\example\form\ExampleForm;


final class ExampleSubCommand extends SubCommand{

	public function __construct(){
		parent::__construct('example', ['exa'], example.tag.player);
	}

	public function on(CommandSender $sender, array $args):void{
		$sender->sendForm(new ExampleForm);
	}
}