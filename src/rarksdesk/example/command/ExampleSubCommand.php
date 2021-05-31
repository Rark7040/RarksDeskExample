<?php

declare(strict_types = 1);

final class ExampleSubCommand extends SubCommand{

	public function __construct(){
		parent::__construct('example', ['exa']);
	}

	public function on(CommandSender $sender, array $args):void{
		$sender->sendMessage('world');
	}
}