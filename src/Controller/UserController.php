<?php

namespace App\Controller;

use App\Service\EmailService;
use App\Service\LoggingService;

class UserController
{
    private EmailService $emailService;
    private LoggingService $loggingService;

    public function __construct(EmailService $emailService, LoggingService $loggingService)
    {
        $this->emailService = $emailService;
        $this->loggingService = $loggingService;
    }

    public function cadastrarUsuario(string $nome, string $email): void
    {
        $this->loggingService->log("Cadastrando o usuário: {$nome}");
        echo "Usuário {$nome} cadastrado com sucesso!\n";
        $this->emailService->enviar($email, "Bem-vindo ao sistema, {$nome}!");
    }
}
