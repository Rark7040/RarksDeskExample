<?php

declare(strict_types = 1);

namespace rarksdeskexample\addon;


class AddonMng{

	public static function load(){
		\Phar::loadPhar(__DIR__.'\RarksDesk.phar', 'RarksDesk');
		require_once 'phar://RarksDesk/rarksdesk/Hook.php';
	}
}