<?php
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

session_start();

require __DIR__ . '/../vendor/autoload.php';

$app = new \Slim\App([
	'settings' => [
		'displayErrorDetails' => true,
		// MySQL Settings
		'db' => [
			'driver'    => 'mysql',
			'host'      => 'localhost',
			'database'  => 'user',
			'username'  => 'root',
			'password'  => '',
			'charset'   => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix'    => '',
		]	
	],
]);

//Eloquent ORM Settings
$container = $app->getContainer();

$capsule = new \Illuminate\Database\Capsule\Manager;
$capsule->addConnection($container->get('settings')['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();

$container['db'] = function ($container) use ($capsule){
	return $capsule;
};

//Twig View. Setting the twig templates folder
$container['view'] = function ($container){
	$view = new \Slim\Views\Twig(__DIR__ . '/../templates');
	$view->addExtension(new \Slim\Views\TwigExtension(
		$container->router,
		$container->request->getUri()
	));
	return $view;
};

$container['LoginController'] = function($container){
	return new \Src\Controllers\LoginController($container->view);
};

require __DIR__ . '/../src/routes.php';
