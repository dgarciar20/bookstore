

## Made with
- [php >= 8.0](https://www.php.net/)
- [laravel 9.52.4](https://laravel.com)
- [spatie/laravel-medialibrary 9.0](https://spatie.be/docs/laravel-medialibrary/v9/introduction)


## Features
- Admin Panel (Users, Roles, Plans, Authors, Books)
- User Wallet with credits
- User Library

## Installation
- Check for requirements [laravel](https://laravel.com/docs/9.x/installation#server-requirements)


```shell
# Clone this repository in your root folder
git clone 

# Install dependencies
composer install

# Navigate to the bookstore folder
cd bookstore

# Create file .env
cp .env.example .env

# Generate key
php artisan key:generate

# Generate symbolic link
php artisan storage:link

# Run migrations (tables and Seeders)
php artisan migrate --seed

# Create Server
php artisan serve

# Access to project in your browser
http://localhost:8000

# Admin account
homero@mail.com
password
```
