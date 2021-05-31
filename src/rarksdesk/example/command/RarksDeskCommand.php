<?php

declare(strict_types = 1);

final class RarksDeskCommand extends BaseCommand{

	public function __construct(){
		parent::__construct(
			'rarksdesk',
			'RarksDesk example command',
			['rd'],
			'/rarksdesk <?example>',
			'example.tag.op'
		);
	}

	protected function prepare():void{
		$this->registerSubCommand(new ExampleSubCommand);
	}

	public function on(CommandSender $sender, array $args):void{
		$sender->sendMessage('hello');
	}
}