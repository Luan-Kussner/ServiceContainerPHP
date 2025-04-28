<?php

namespace App\Container;

use ReflectionClass;

class Container
{
    public function make(string $class)
    {
        // Usa reflection para analisar a classe
        $reflection = new ReflectionClass($class);

        // Se não tiver dependências, apenas cria
        if (!$constructor = $reflection->getConstructor()) {
            return new $class;
        }

        // Resolve as dependências recursivamente
        $dependencies = array_map(function ($param) {
            $type = $param->getType();
            if (!$type) {
                throw new \Exception("Parâmetro {$param->getName()} não tem tipo definido.");
            }
            return $this->make($type->getName());
        }, $constructor->getParameters());

        return $reflection->newInstanceArgs($dependencies);
    }
}
