Bem vindo ao estoque de produtos app max

requerimentos
  PHP 7.4.3 


Rodar comandos

composer install

Criar Base de dados app_max

php artisan migrate

php artisan db:seed

login: teste@gmail.com.br
senha: 123456

renomear .env.example para .env

Rotas da api

Adiciona produtos
POST api/adicionar-produtos - {"id_produto" : "2", "quantidade" : "10",	"valor_un" : "1.00"}

Baixar Produtos
POST api/baixar-produtos  - {"id_produto": "1",  "cliente": "Fulano",  "quantidade": 3}
