# LB-Web


## Installation Process

- [ ] [Laravel Documentation](https://laravel.com/docs/9.x/installation)

```
cp .env.example .env
php artisan key:generate
composer install

create database and update database creds in .env then run migration

php artisan migrate (one by one blow migration by this command)

php artisan migrate --path=/database/migrations/2022_12_28_134240_create_permission_tables.php
php artisan migrate --path=/database/migrations/2014_10_12_000000_create_users_table.php
php artisan migrate --path=/database/migrations/2023_02_10_082526_create_navigations_table.php
php artisan migrate --path=/database/migrations/2023_02_10_083350_create_sub_navigations_table.php
php artisan migrate --path=/database/migrations/2023_02_10_084620_create_role_has_navigations_table.php
php artisan migrate --path=/database/migrations/2023_02_10_084912_create_role_has_sub_navigations_table.php

php artisan db:seed

php artisan storage:link

php artisan serve
```

## Login Creds:

- [ ] [Open http://localhost:8000](http://localhost:8000)

<!-- Email: admin@pitb.gov.pk <br/> -->
Username: super_admin <br/>
Password: admin@pitb

