# CRUD PHP

Este projeto é um **CRUD simples** desenvolvido em **PHP**, utilizando **Bootstrap** para estilização da interface e **MySQL** para armazenamento dos dados.

---

## 🚀 Tecnologias usadas

- **PHP**: lógica principal do CRUD.
- **MySQLi**: extensão para conectar e interagir com o banco de dados MySQL.
- **Bootstrap**: para deixar o layout responsivo e agradável.
- **MySQL**: armazenamento dos dados no BD
- **Função `password_hash`**: para **criptografar a senha do usuário** de forma segura.

---

## 🎯 Objetivo

O objetivo deste projeto é **aprender** e **reforçar os conceitos** de desenvolvimento web com PHP, Banco de Dados e boas práticas de segurança.

Todo o código está **comentado**, com observações importantes para facilitar o entendimento de cada parte.

---

## 🗄️ Estrutura da tabela `usuarios`

Para rodar o projeto, crie a tabela `usuarios` no seu banco de dados usando o comando abaixo:

```sql
CREATE TABLE usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  data_nascimento DATE NOT NULL,
  senha VARCHAR(255) NOT NULL
);

## 📌  Funcionalidades
- Criar usuário (Create)
- Listar usuários (Read)
- Editar usuário (Update)
- Excluir usuário (Delete)
