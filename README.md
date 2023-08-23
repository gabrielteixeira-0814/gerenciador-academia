<h1 align="center">
    <img height="80" src="https://img.icons8.com/external-filled-outline-geotatah/64/000000/external-product-corporate-image-and-brand-management-filled-outline-filled-outline-geotatah-2.png" />
    <p>Academia</p>
</h1>

<h1>
  <img src="public/img/academia_gif.gif" />
</h1>


## 🚨 About


**Academia** é um sistema de gerenciamento  para fins de estudo onde aborda o controle de usuários, clientes, aparelhos da academia e suas manutenções. 


## 🔨 Tools

- PHP
- MYSQL
- HTML5
- CSS
- JAVASCRIPT

## Libraries/Frameworks

- [LARAVEL 7](https://laravel.com/docs/7.x/installation)
- [JQUERY](https://jquery.com/)
- [AJAX](https://www.devmedia.com.br/o-que-e-o-ajax/6702)
- [BOOTSTRAP](https://getbootstrap.com/docs/5.0/getting-started/introduction/) 


### Requirements

- Ter instalado pelo menos um gerenciador de pacotes do composer, [composer](https://getcomposer.org/).
- É necessário que você tenha um banco de dados [MySql](https://www.mysql.com/) para a conexão.

## 👨‍💻 Como configurar

```bash
    # Clonar o projeto
    $ git clone https://github.com/gabrielteixeira-0814/gerenciador-academia.git
```

```bash
    # Digite o diretório
    $ cd gerenciador-academia
```

```bash
    # Install dependencies and framework
    $ composer install
```

```bash
    # Copie o arquivo .env.example e cole-o no arquivo .env e vincule-o a um banco de dados Mysql
    $ cd .env.example .env
```

```bash
    # Após relacionar o arquivo .env com o banco de dados MySql, execute o comando abaixo para iniciar o banco de dados
    $ php artisan migrate --seed
```

```bash
    # Este comando iniciará um servidor de desenvolvimento em http://127.0.0.1:8000/
    $ php artisan serve
```

### Rotas de Aplicação

- **`GET/POST /api/user`**: Rota para usuário.

- **`POST /api/login`**: Rota de login do usuário.

- **`POST /api/logout`**: Rota para logout do usuário, devendo utilizar o token gerado no momento em que o usuário efetuou login na API para a solicitação.

- **`GET/POST /api/client_type`**: Rota para tipo de cliente.

- **`GET/POST /api/client`**: Rota para cliente.

- **`GET/POST /api/maintenance`**: Rota para manutenção.

- **`GET/POST /api/gadgets`**: Rota para aparelhos.

- **`GET/POST /api/employee`**: Rota para funcionário.

## 📝 License

Este projeto está sob a licença do MIT. Veja o arquivo <a href="https://github.com/gabrielteixeira-0814/gerenciador-academia/blob/main/LICENCE">LICENCE</a> para mais detalhes.

---

<p align="center">Created by Gabriel Teixeira</p>
