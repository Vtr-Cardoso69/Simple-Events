# Sistema de Gerenciamento de Eventos (PHP MVC)

Este é um sistema simples de gerenciamento de eventos utilizando **PHP orientado a objetos**, **MySQL** e padrão **MVC**, sem frameworks.

## Como usar

1. Copie a pasta para o diretório de projetos do seu servidor (por exemplo, `htdocs` no XAMPP).
2. Crie o banco de dados e as tabelas executando o arquivo `banco/banco_versoes.sql` (via phpMyAdmin, MySQL Workbench ou CLI).
3. Ajuste a conexão ao banco em `app/Database.php` se necessário.
4. Acesse pelo navegador:
   - `http://localhost/TRABALHO%2018/public/index.php`

## Estrutura do projeto

- `/app`
  - `/controllers` - controladores MVC
  - `/models` - classes de acesso ao banco
  - `/views` - templates HTML
  - `Controller.php` - classe base de controllers
  - `Database.php` - conexão PDO com MySQL
- `/public`
  - `index.php` - front controller
- `/banco`
  - `banco_versoes.sql` - script SQL para criar o banco e as tabelas

## Funcionalidades

- CRUD de eventos (nome, descrição, data, horário, local, capacidade)
- CRUD de participantes (nome, email, telefone)
- Inscrição de participantes em eventos
- Controle de capacidade de vagas (impede novas inscrições quando limite alcançado)
- Listagem de participantes por evento

---

### Observações

- Este projeto foi desenvolvido como um exemplo acadêmico simples.
- Em produção, recomenda-se tratar validações e mensagens de erro de forma mais robusta.
