<?php

declare(strict_types = 1);

final class ExampleForm extends CustomForm{

	public function __construct(){
		parent::__construct(
			function(Player $player, $data){
				$player->sendMessage('on submit');
			},
			function(Player $player){
				$player->sendMessage('on cancelled');
			}
		);
		$this->addDropDown(new DropDown())
	}
}