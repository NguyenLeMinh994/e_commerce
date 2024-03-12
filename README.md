# Installing Laravel Guide

## System Requirements

Before installing Laravel, make sure your system meets the following requirements:

- PHP >= 7.3
- Composer
- MySQL, PostgreSQL, SQL Server, or SQLite
- Some PHP extensions (Refer to Laravel [documentation](https://laravel.com/docs/installation#server-requirements) for details)
- I am using Laravel 8

## Installing Laravel

Step 1: Install Composer (If not already installed)

If you don't have Composer yet, you can install it by visiting the [official website](https://getcomposer.org/) and following the instructions.

Step 2: Install vendor

```bash
composer install
```

Step 3: Configure the `.env` file

Copy the `.env.example` file and rename it to `.env`. Open the `.env` file and adjust your database settings, such as username, password, and database name.

Step 4: Run migrations and seeders

 You run migrations and seeders to create tables and seed sample data:

```bash
php artisan migrate:fresh
php artisan db:seed
```

If you are unable to run the command above. You can run `e_commerce_db.sql` file


## Account to login
`username:` admin@example.com
`password:` 12345678
