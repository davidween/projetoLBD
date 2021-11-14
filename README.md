# Projeto em cakePHP para disciplina de Laboratório de Banco de Dados


# Banco de dados

1) Acessar tests/schema.sql, lá estão os comandos para criar e popular o banco de dados (MariaDB ou MySQL)

2) Acessar o app_local.php na pasta config do seu projeto, mudar o username e password para coincidir com o banco de dados criado localmente (MariaDB ou MySQL):


```
            'username' => 'usuario',
            'password' => 'senha',
            'database' => 'livraria',
   
```


# Cakephp  

1) Instale o composer globalmente: ```curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer```

2) Clone esse projeto.

3) Na pasta do projeto, no terminal: ```composer install```


## Inicialização

4) Utilize ```bin/cake server -p 8765``` para rodar o projeto

5) Vá para http://localhost:8765/users/login em seu navegador.

6) Usuário padrão no tests/schema.sql: 
        login: davidween
        senha: 12345678




