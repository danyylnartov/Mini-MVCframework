<?php


namespace mvcframework\core;

use mvcframework\core\Registry;
use mvcframework\core\ErrorHandler;

class App {

	public static $app;

	public function __construct() {
		session_start();
		self::$app = Registry::instance();
		new ErrorHandler();
	}

}