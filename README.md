## Tasks API (Todo List)

#### Project Description
- The following project is a Todo List API that allows user to register, login and create Tasks for themselves.
- The super-admin user can create roles, permissions, assign roles & permissions to one another, also assign roles/permissions to users. 
- Only the super-admin user can create tasks for others.
- If the task type is public, everyone can update or delete it, otherwise only the task owner or the super-admin user can do so.
- Users can have a status for their tasks(todo/doing/done - default: todo), and a type(public/private - default: private). 

#### Installation
- Create `.env` file using `.env.example`
- Install dependencies
```
composer install
```
- Run Migrations and Seeders to create dummy data
```
php artisan migrate --seed
```
- The seeders will get admin info in CLI to create a super admin user.
- Create Passport Clients
```
php artisan passport:install
```
- Run the project
```
php artisan serve
```
- You must config your mail settings and run queues to get Emails after a task is created.
```
php artisan queue:work
``` 

<br><br>
#### Further Information 
- There are four controllers for the CRUD operations which mostly use `apiResources` Routes.
- I used `laravel/passport` package for authentication.
<br>
- I used `spatie/laravel-permission` package for roles and permissions.
- I created some pre-defined `permissions/roles` inside `permissions_data/role_data` config files which will be seeded while you use artisan seeding commands.
- The Role `super.admin` will be assigned to the admin which has been created by `AdminTableSeeder` automatically.
<br>
- Once a task has been created, an email will be sent to task owner. 
- You must set your Mail Server Address & Credentials to use the notification system. `mailtrap.io` is recommended for testing purposes.
<br>
- Exceptions have been handled inside `app\Exception\Handler.php`
- CRUD Methods have specific validations
<br>
- `Repositories` have been designed to use over Eloquent Models, and they are bound to their `contracts` inside `RepositoryProvider`, you can check `RepositoryAbstract` to see more. 
- There is a `JsonResponseService` to control format of the responses, it is used inside `MainController` that is implemented inside other controllers.
- There are `Resource Collections` to control the way entities' data will be retrieved;  

<br><br>
#### API Documents
- [Postman Documentation](https://documenter.getpostman.com/view/4043238/TVRq262U)
- [Postman Collection](https://www.getpostman.com/collections/12cc0a6e2f051c54e2c7)
<br>**Note:** *Postman Document and Collection have sample requests/responses inside methods, but feel free to ask about anything that you find not obvious enough.*
