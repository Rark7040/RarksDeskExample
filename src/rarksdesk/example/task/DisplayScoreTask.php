<?php

declare(strict_types = 1);

final class DisplayScoreTask extends Task{

	private $board;
	private int $line;

	public function __construct(){
		$this->board = new ScoreBoard('Example');
		$this->line = $this->board->add('test'.'0');
		$this->board->send(...Server::getInstance()->getOnlinePlayers());
	}

	public function onRun(int $tick){
		static $i = 0;
		$this->board->add('test'.++$i, $this->line);
		$this->board->update();
	}
}