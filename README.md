Bem vindo ao estoque de produtos app max

Rodar comandos

composer install

php artisan migrate

php artisan migrate:refresh --seed


Rotas da api

GET api/produtos - listagem de produtos
DELETE api/produtos - deletar  produtos

POST api/produtos - criar produtos
{
  "nome": "aaaa",
  "sku": "teste",
  "descricao":"aaaa",
  "status":"A"
}

PUT api/produtos - editar produtos
{
  "nome": "aaaa",
  "sku": "teste",
  "descricao":"aaaa",
  "status":"A"
}

GET api/produtos/{id} Ver produto
{
  "nome": "aaaa",
  "sku": "teste",
  "descricao":"aaaa",
  "status":"A"
}


POST api/adicionar-produtos - adicionar produto no estoque
{
	"id_produto" : "2",
	"quantidade" : "10",
	"valor_un" : "1.00"
}

POST api/baixar-produtos  - dar baixa no estoque
{
  "id_produto": "1",
  "cliente": "Fulano",
  "quantidade": 3
}

GET api/relatorio-produtos-adicionados/{date}
GET api/relatorio-produtos-removidos/{date}
