<?php

namespace App\Service;

class EmailService
{
    public function enviar(string $email, string $mensagem): void
    {
        echo "📧 Enviando email para {$email}: {$mensagem}\n";
    }
}
