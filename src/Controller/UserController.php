<?php

namespace App\Controller;

use App\Service\EmailService;

class UserController
{
    private EmailService $emailService;

    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }

    public function cadastrarUsuario(string $nome, string $email): void
    {
        echo "Usuário {$nome} cadastrado com sucesso!\n";
        $this->emailService->enviar($email, "Bem-vindo ao sistema, {$nome}!");
    }
}
