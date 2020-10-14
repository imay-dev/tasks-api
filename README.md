## Tasks API (Todo List)

#### Project Description
- The following project uses `repositories` to manage Database Connections, 

#### Installation
- Create `.env` file using `.env.example`
- Install dependencies
```
composer install
```
- Fill in `ADMIN_EMAIL`, `ADMIN_PASSWORD` variables in `.env` file in order to create Superadmin user while seeding.
- Run Migrations and Seeders to create dummy data
```
php artisan migrate --seed
```
- Install Passport
```
php artisan passport:install
```
- Create Passport Keys
```
php artisan passport:keys
```

<br><br>
#### Options
- There are tests to see if the functionalities work properly. In order to run the tests you can use `PHPUnit` or simply use `php artisan test`. 
- You must set your Mail Server Address & Credentials to use the notification system. `mailtrap.io` is recommended for testing purposes.

<br><br>
#### API Documents
- [Postman Link]()
