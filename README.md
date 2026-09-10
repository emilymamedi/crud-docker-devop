# Cadastro de Produtos

Projeto desenvolvido para o gerenciamento de produtos por meio de uma aplicação web utilizando **PHP, MySQL, Docker Compose e phpMyAdmin**.

A entidade escolhida para a implementação do CRUD foi **Produtos**.

---

## Funcionalidades

O sistema foi desenvolvido para realizar o gerenciamento de produtos, permitindo que o usuário cadastre e organize informações por meio de uma interface web.

A aplicação permite:

* **Cadastrar produtos:** o usuário pode inserir o nome, preço e descrição de um produto.
* **Visualizar produtos:** o sistema apresenta uma lista de produtos cadastrados e suas respectivas informações.
* **Editar produtos:** permite alterar as informações de um produto que já foi cadastrado.
* **Deletar produtos:** permite que um produto seja removido do sistema.

Dessa forma, a aplicação implementa as quatro operações fundamentais de um CRUD:

* **Create** — Criar
* **Read** — Visualizar
* **Update** — Atualizar
* **Delete** — Excluir

---

## Tecnologias utilizadas

* **PHP** — responsável pela aplicação web.
* **MySQL** — responsável pelo banco de dados.
* **Docker** — utilizado para criar e executar os containers.
* **Docker Compose** — utilizado para organizar e executar os serviços da aplicação.
* **phpMyAdmin** — utilizado para o gerenciamento visual do banco de dados.
* **Apache** — servidor responsável por executar a aplicação PHP.

---

## Pré-requisitos

Para executar o projeto, é necessário ter instalado no computador:

* Docker
* Docker Compose
* Git

Não é necessário instalar o PHP, Apache ou MySQL diretamente na máquina, pois esses serviços são executados dentro dos containers Docker.

---

## Como executar o projeto

### 1. Clonar o repositório

Abra o terminal do VS Code utilizando:

```text
Ctrl + J
```

Em seguida, clone o repositório com o comando:

```bash
git clone https://github.com/emilymamedi/crud-docker-devop.git
```

### 2. Entrar na pasta do projeto

```bash
cd crud-docker-devop
```

### 3. Iniciar os containers

Com o Docker em execução, utilize:

```bash
docker-compose up -d
```

Esse comando irá criar e iniciar os containers definidos no arquivo `docker-compose.yml`.

O projeto possui três serviços principais:

* **PHP:** responsável por executar a aplicação.
* **MySQL:** responsável pelo banco de dados.
* **phpMyAdmin:** utilizado para o gerenciamento visual do banco de dados.

---

## Criação do banco de dados e da tabela

Durante a inicialização do container do MySQL, o arquivo:

```text
banco/banco.sql
```

é disponibilizado no diretório de inicialização automática do MySQL:

```text
/docker-entrypoint-initdb.d/banco.sql
```

Esse arquivo contém os comandos necessários para criar o banco de dados `crud` e a tabela `produtos`, incluindo seus respectivos campos e configurações.

Portanto, não é necessário executar manualmente os comandos SQL para criar a estrutura do banco de dados em uma nova instalação.

### Estrutura da tabela `produtos`

| Campo           | Descrição                                           |
| --------------- | --------------------------------------------------- |
| `id`            | Identificador único, com incremento automático      |
| `nome`          | Nome do produto                                     |
| `descricao`     | Descrição do produto                                |
| `preco`         | Preço do produto                                    |
| `data_cadastro` | Data e hora do cadastro, preenchida automaticamente |

---

## Acessar a aplicação

Após a inicialização dos containers, abra o navegador e acesse:

```text
http://localhost:8080
```

A aplicação estará disponível para utilização.

---

## Pontos interessantes observados pela equipe

Durante o desenvolvimento do projeto, alguns pontos foram importantes para o aprendizado da equipe:

### Utilização do Docker Compose

Aprendemos como utilizar o Docker Compose para executar e organizar diferentes serviços necessários para o funcionamento da aplicação.

### Comunicação entre containers

Entendemos como os containers PHP, MySQL e phpMyAdmin conseguem se comunicar por meio de uma rede personalizada, utilizando o nome do serviço como endereço.

### Persistência dos dados

Utilizamos um volume para o MySQL, garantindo que os dados cadastrados não sejam perdidos quando os containers são reiniciados.

### Inicialização automática do banco de dados

Aprendemos a utilizar um arquivo SQL para criar automaticamente o banco de dados e a tabela durante a inicialização de uma nova instância do MySQL.

---

## Autores

**Emily Mamedi**
**Nayara Rita**
**Thiago Duarte**

---
