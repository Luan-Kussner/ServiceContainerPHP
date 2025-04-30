# LUAN KUSSNER
# Service Container em PHP com Binding e Singleton

Este projeto demonstra um **Service Container** evoluído em PHP com:

- **Binding de interfaces** a implementações concretas
- **Singletons** para garantir uma única instância de objetos durante a execução

## 🧠 Como funciona

1. **Binding**: Registra interfaces e implementações.
2. **Singleton**: Garante que uma instância seja compartilhada.
3. **Resolução automática**: O Container cria as dependências automaticamente.

## ▶️ Como executar

```bash
composer dump-autoload
php public/index.php