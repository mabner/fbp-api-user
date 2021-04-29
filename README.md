# API User

O objetivo desta tarefa é construir uma API Web escrita em PHP para fazer gestão
de **Usuários**. O projeto deverá ser versionado no Github e o link do mesmo deverá ser
entregue ao professor diretamente através do portal Canvas.

### Requisitos funcionais

1. Endpoint para criação de um novo usuário **(POST /users)**
     2. Usuário deve ser validado antes de persistido no banco de dados e, caso
         não esteja válido, o código de erro 400 deve ser retornado junto com a
         lista de erros encontrados
2. Endpoint para listar todos os usuários cadastrados no banco de dados **(GET**
     **/users)**
3. Endpoint para alteração de um usuário **(PUT /users/{id})**
     1. Usuário deve ser validado antes de persistido no banco de dados e, caso
          não esteja válido, o código de erro 400 deve ser retornado junto com a
            lista de erros encontrados
     2. Usuário deve existir na base e, caso contrário, o código de erro 404 com
          uma mensagem apropriada deve ser retornada
4. Endpoint para remoção de um usuário **(DELETE /users/{id})**
     1. Usuário deve existir na base e, caso contrário, o código de erro 404 com
          uma mensagem apropriada deve ser retornada
5. Endpoint para visualizar detalhes de um usuário **(GET /users/{id})**
     1. Usuário deve existir na base e, caso contrário, o código de erro 404 com
            uma mensagem apropriada deve ser retornada

### Modelagem

  Cada usuário deve conter as seguintes informações:

1. Nome
2. Sobrenome
3. E-mail
4. Telefones
   1. Código de área (31, 33 e etc.)
   2. Número no formato XXXX-XXXX
5. Endereço
   1. Estado
   2. Cidade
   3. Bairro
   4. Rua
   5. Número
   6. Complemento

OBS: Cada usuário possui um ou mais telefones
OBS: Cada usuário possui um endereço
Desta forma, teremos um total de três tabelas (user, user_address, user_contact_phone)

### Requisitos não-funcionais

1. Requisições e respostas da API devem ser no formato JSON.
2. API deve conter testes funcionais para garantir que a aplicação está funcionando
      corretamente.
3. Devemos incluir uma integração contínua no GitHub Actions para buildar e
      rodar os testes automaticamente a cada "git push".

### Desafios interessantes (opcional):

1. Processamento de mensagens assíncronas (ex. deletar um usuário utilizando uma
      fila Rabbit, por exemplo) utilizando Symfony Messenger.
2. Estudar e adaptar o projeto para o modelo Hexagonal separando o projeto em
      camadas de *Domain*, *Infrastructure* e *Entrypoints*.

### Observações:

1. Enviar o link do repositório GitHub.
2. Os desafios propostos não fazem parte da entrega e são opcionais. Quem precisar de
      mais detalhes pode entrar em contato comigo que ajudo caso necessário.



------

## Uso da aplicação
<!-- Colocar instruções do Git clone e docker run da imagem do sql -->
Iniciando o servidor PHP:

```bash
php -S localhost:80 -t public
```

Criando o banco de dados:

```bash
php bin/console doctrine:database:create --env test
```

Criando as tabelas:

```bash
php bin/console doctrine:schema:create --env test
```
