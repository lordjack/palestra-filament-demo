# Sistema demostrativo da palestra sobre o framework Filament

A demo application to illustrate how Filament Admin works.

![Dashboard](https://github.com/lordjack/palestra-filament-demo/assets/6691621/7e58fe63-d98b-4dbb-89f2-9eb846019791)

## Usando o Form Builder para criar formulários
![image](https://github.com/lordjack/palestra-filament-demo/assets/6691621/786a14da-9978-428c-9e2d-e190c8a672da)


## Usando o Table Builder para listagem de dados
![Table Build](https://github.com/lordjack/palestra-filament-demo/assets/6691621/dd4d8cbc-0aa7-4f1f-82b6-4a2856fb7804)


[Open in Gitpod](https://gitpod.io/#https://github.com/lordjack/palestra-filament-demo) to edit it and preview your changes with no setup required.

## Installation

Clone the repo locally:

```sh
git clone https://github.com/lordjack/palestra-filament-demo
```

Install PHP dependencies:

```sh
composer install
```

Setup configuration:

```sh
cp .env.example .env
```

Generate application key:

```sh
php artisan key:generate
```

Create an SQLite database. You can also use another database (MySQL, Postgres), simply update your configuration accordingly.

```sh
touch database/database.sqlite
```

Run database migrations:

```sh
php artisan migrate
```

Run database seeder:

```sh
php artisan db:seed
```


Create a symlink to the storage:

```sh
php artisan storage:link
```

Run the dev server (the output will give the address):

```sh
php artisan serve
```
