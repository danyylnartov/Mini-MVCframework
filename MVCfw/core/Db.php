<?php


namespace mvcframework\core;


use R;

class Db {

	use TSingletone;

	protected function __construct() {
		$db = require ROOT . '/config/config_db.php';
		require LIBS . '/rb.php';
		R::setup($db['dsn'], $db['user'], $db['pass']);
		R::freeze(true);
	}

}