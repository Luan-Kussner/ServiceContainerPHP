<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Container\Container;
use App\Controller\UserController;

$container = new Container();

// Resolve UserController automaticamente com EmailService
$userController = $container->make(UserController::class);

$userController->cadastrarUsuario('Kussner', 'kussner@email.com');
