<?php

namespace App\Container;

use ReflectionClass;

class Container
{
    protected array $bindings = [];
    protected array $instances = [];

    // Registra um binding para uma interface
    public function bind(string $abstract, string $concrete = null): void
    {
        $this->bindings[$abstract] = $concrete ?: $abstract;
    }

    // Registra um singleton
    public function singleton(string $abstract, string $concrete = null): void
    {
        $this->bindings[$abstract] = $concrete ?: $abstract;
        $this->instances[$abstract] = null; // Marcando como singleton
    }

    // Faz a resolução de uma classe
    public function make(string $abstract)
    {
        // Verifica se a classe é um singleton
        if (isset($this->instances[$abstract])) {
            if ($this->instances[$abstract] === null) {
                $this->instances[$abstract] = $this->build($abstract);
            }
            return $this->instances[$abstract];
        }

        // Caso não seja singleton, cria uma nova instância
        return $this->build($abstract);
    }

    // Resolve a classe usando reflexão
    protected function build(string $abstract)
    {
        if (isset($this->bindings[$abstract])) {
            $concrete = $this->bindings[$abstract];
        } else {
            $concrete = $abstract;
        }

        $reflection = new ReflectionClass($concrete);

        if (!$constructor = $reflection->getConstructor()) {
            return new $concrete;
        }

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
