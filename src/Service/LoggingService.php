<?php

namespace App\Service;

class LoggingService
{
    public function __construct()
    {
        // Construtor agora é público
    }

    public function log(string $message): void
    {
        echo "[LOG] " . $message . "\n";
    }
}
