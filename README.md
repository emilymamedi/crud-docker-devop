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

## Explicação do `docker-compose.yml`

O arquivo `docker-compose.yml` é responsável por organizar os containers e definir as configurações necessárias para o funcionamento da aplicação.

### Serviço PHP

O serviço **PHP** utiliza a imagem `php:8.3-apache`, sendo responsável por executar a aplicação PHP utilizando o Apache.

A porta `8080` do computador é ligada à porta `80` do container, que é a porta utilizada pelo Apache.

O volume `./src:/var/www/html` disponibiliza os arquivos da pasta `src` dentro do container, permitindo que o Apache execute os arquivos da aplicação.

As variáveis de ambiente utilizadas pelo PHP são:

* `DB_HOST` — indica o serviço do banco de dados, que neste caso é `mysql`.
* `DB_USER` — define o usuário utilizado para acessar o banco de dados.
* `DB_PASSWORD` — define a senha utilizada para acessar o banco de dados.
* `DB_NAME` — define o nome do banco de dados utilizado pela aplicação.

O serviço PHP depende do MySQL e utiliza a rede `minha-rede` para se comunicar com os outros containers.

### Serviço MySQL

O serviço **MySQL** utiliza a imagem `mysql:8.4` e é responsável pelo armazenamento dos dados da aplicação.

As variáveis de ambiente utilizadas pelo MySQL são:

* `MYSQL_ROOT_PASSWORD` — define a senha do usuário administrador do MySQL.
* `MYSQL_DATABASE` — define o nome do banco de dados.
* `MYSQL_USER` — define o usuário utilizado para acessar o banco de dados.
* `MYSQL_PASSWORD` — define a senha desse usuário.

A porta `3329` do computador é ligada à porta `3306` do container, que é a porta utilizada pelo MySQL.

O volume `mysql_data:/var/lib/mysql` é utilizado para armazenar os dados do banco, garantindo que eles não sejam perdidos quando os containers forem reiniciados.

O arquivo `banco/banco.sql` é disponibilizado no diretório `/docker-entrypoint-initdb.d/banco.sql`, permitindo que o banco de dados e a tabela sejam criados durante a inicialização de uma nova instância do MySQL.

### Serviço phpMyAdmin

O serviço **phpMyAdmin** utiliza a imagem `phpmyadmin:latest` e é utilizado para o gerenciamento visual do banco de dados.

A porta `8081` do computador é ligada à porta `80` do container.

As variáveis de ambiente utilizadas são:

* `PMA_HOST` — indica o serviço do MySQL que será acessado pelo phpMyAdmin.
* `PMA_PORT` — indica a porta do MySQL dentro do container.

O phpMyAdmin depende do MySQL e utiliza a rede `minha-rede` para realizar a comunicação com os outros containers.

### Rede dos containers

Foi criada uma rede personalizada chamada `minha-rede`, utilizando o driver `bridge`.

Essa rede permite a comunicação entre os containers PHP, MySQL e phpMyAdmin. Os serviços conseguem se encontrar utilizando o nome do serviço, como `mysql`, em vez de utilizar `localhost`.

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

### Emily Mamedi
### Nayara Rita
### Thiago Duarte

---