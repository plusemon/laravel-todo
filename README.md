## Installation
Install dependencies via composer
```ssh
composer install
```
Update dependencies (Optional)
```ssh
composer install via composer
```
Copy .env.example file to new .env file
```ssh
cp .env.example .env
```
Setup Database Connection
```ssh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=Lalavel
DB_USERNAME=root
DB_PASSWORD=secret
```
Migrate Database
```ssh
php artisan migrate:fresh --seed
```
