<?php

	use mvcframework\core\Router;

	$query = rtrim($_SERVER['QUERY_STRING'], '/');

	define("DEBUG", 1);
	define('WWW', __DIR__);
	define('CORE', dirname(__DIR__) . '/MVCfw/core');
	define('ROOT', dirname(__DIR__));
	define('LIBS', dirname(__DIR__) . '/MVCfw/libs');
	define('APP', dirname(__DIR__) . '/app');
	define('CACHE', dirname(__DIR__) . '/tmp/cache');
	define('LAYOUT', 'blog');
	define('ADMIN', 'http://mvcframework/admin');

	require '../MVCfw/libs/functions.php';
	require __DIR__ . '/../vendor/autoload.php';

	new mvcframework\core\App();

	// user roots
	Router::add('^page/(?P<action>[a-z-]+)/(?P<alias>[a-z-]+)$', ['controller' => 'Page']);
	Router::add('^page/(?P<alias>[a-z-]+)$', ['controller' => 'Page', 'action' => 'view']);

	// default roots
	Router::add('^admin$', ['controller' => 'Main', 'action' => 'index', 'prefix' => 'admin']);
	Router::add('^admin/?(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$', ['prefix' => 'admin']);

	Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
	Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');


	Router::dispatch($query);