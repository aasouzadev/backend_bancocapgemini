# backend_bancocapgemini

BackEnd do desafio técnico Capgemini

## Project setup
```
composer install
```
```
Alterar arquivo .env.example para .env e configurar para sqlite:
```
DB_CONNECTION=sqlite
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=(Todo o caminho)\backend_bancocapgemini\database\database.sqlite
```
php artisan key:generate

php artisan migrate
```

### Compiles and hot-reloads for development
```
php artisan serve
```
