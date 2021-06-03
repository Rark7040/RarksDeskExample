<?php

declare(strict_types = 1);

namespace rarksdesk\example\form;

use pocketmine\Player;
use rarksdesk\form\CustomForm;
use rarksdesk\form\element\{
	Label,
	Input
};


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
		$this->addElement(
			new Label('test text'),
			new Input('input', '', '', function(Player $player, string $data){
				$player->sendMessage($data);
			}),
		);
	}
}