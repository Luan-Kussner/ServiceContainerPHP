<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Container\Container;
use App\Controller\UserController;
use App\Service\EmailService;
use App\Service\LoggingService;

$container = new Container();

// Registra o EmailService como um serviço normal
$container->bind(EmailService::class);

// Registra o LoggingService como singleton
$container->singleton(LoggingService::class);

// Resolve o controlador UserController
$userController = $container->make(UserController::class);

// Chama o método de cadastro de usuário
$userController->cadastrarUsuario('Kussner', 'kussner@gmail.com');
