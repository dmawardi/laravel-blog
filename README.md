<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

-   [Simple, fast routing engine](https://laravel.com/docs/routing).
-   [Powerful dependency injection container](https://laravel.com/docs/container).
-   Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
-   Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
-   Database agnostic [schema migrations](https://laravel.com/docs/migrations).
-   [Robust background job processing](https://laravel.com/docs/queues).
-   [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

## Additional packages

-   [Laravel Clockwork](https://github.com/itsgoingd/clockwork): Used for logging and debugging
    You then would need to download the browser extension for Chrome or Firefox to use it.

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

-   **[Vehikl](https://vehikl.com/)**
-   **[Tighten Co.](https://tighten.co)**
-   **[WebReinvent](https://webreinvent.com/)**
-   **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
-   **[64 Robots](https://64robots.com)**
-   **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
-   **[Cyber-Duck](https://cyber-duck.co.uk)**
-   **[DevSquad](https://devsquad.com/hire-laravel-developers)**
-   **[Jump24](https://jump24.co.uk)**
-   **[Redberry](https://redberry.international/laravel/)**
-   **[Active Logic](https://activelogic.com)**
-   **[byte5](https://byte5.de)**
-   **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Commands

```bash
# To create a new laravel project
laravel new project-name
# To run the server
php artisan serve

# To install composer dependencies
composer install
# To update composer dependencies
composer update

# To open shell into server
php artisan tinker
# Make migrations (that haven't been completed)
php artisan migrate
# Rollback migrations
php artisan migrate:rollback
# Refresh migrations
php artisan migrate:refresh
# To seed database using seeder
php artisan db:seed

# To refresh and seed
php artisan migrate:fresh --seed
```

## Editing vendor files

To edit vendor files, you can publish the vendor files using the command:

```bash
# Publich vendor files (then allows you to edit them)
php artisan vendor:publish
```

This will allow you to edit the vendor files in the resources/views/vendor folder. In order to load different views, you can edit the App Service Provider file in the app/Providers folder.

This allows you to change behavior during bootstrapping of the application. For example, you can change the view that is used for the paginator.

    ```php
    // In the AppServiceProvider file
    public function boot()
    {
        Paginator::defaultView('vendor.pagination.bootstrap-4');
        <!-- Or -->
        Paginator::useBootstrap();  // This will use the default bootstrap paginator
    }
    ```

## Make commands

    ```bash
    # To make a controller
    php artisan make:controller PagesController
    # To make a component (blade file) and also a controller
    php artisan make:controller CategoryDropdown
    # To make a model
    php artisan make:model Post
    # To make a migration
    php artisan make:migration create_posts_table
    # To make a seeder
    php artisan make:seeder PostsTableSeeder
    # To make a factory
    php artisan make:factory PostFactory
    # To make a factory, seeder, migration and model together (Usually a seeder isn't required ie. -mf)
    php artisan make:model Post -msf
    ```

### Factory usage

        ```php
        // To use the factory manually in the tinker shell or in a controller
        Post::factory()->count(50)->create();
        ```

        ```bash
        # To use the seeder
        php artisan db:seed
        ```

MySQL commands:

    ```bash
    # To start the mysql server
    brew services start mysql
    # To login to mysql
    mysql -u root -p
    # To show databases
    show databases;
    # To create a database
    create database laravel;
    # To use a database
    use laravel;
    # To show tables
    show tables;
    # To create a table
    create table users (id int, name varchar(255));
    ```

## Blade Templating Engine

Methods of components:

1. You can either use the @extends('layout') to extend a layout with sections for inputting content.
2. Create a new folder in the views folder called components. Everything in here will be automatically made available in your blade files. It allows for using curly braces instead of @ directives for inserting content

The second method is the preferred method.

## Procedure for using components

1. Create a new folder in the views folder called components (if it doesn't exist)
2. Create a new blade file in the components folder
3. Use the blade file in the views folder

## Procedure for building models

1. Create a new migration file and models using the command: php artisan make:model ModelName. This will create a new model file in the app/Models folder. It's convention that you will also add the tags below for additional files.
   -m will create a migration file
   -c will create a controller file
   -a will create a factory file
   -s will create a seeder file
   -f will create a factory file
   -all will create a migration, model, controller, factory and seeder file

2. Add the columns to the migration file
3. Run the migration using the command: php artisan migrate
4. Add the fillable/protected columns to the model
5. Add the relationships to the model by adding methods to the model that return the relationshp: hasMany, belongsTo, belongsToMany, etc.
6. Once the relationships have been added, to avoid n+1 queries, use the with() method to eager load any relationships
   eg. Post::with('user', 'category')->get();
7. Define the properties for the factory in the model factory file. You can generate a factory file using the command: php artisan make:factory ModelNameFactory. Then define the properties for the factory in the file.
8. Add the factory to the database seeder file
9. Add seeds to the database using the command: php artisan db:seed (This will use the seeder file in the database/seeders folder)

## Helpful tips

When creating a DB model, you should aim to buid migrations first, then models, then controllers. This is the best practice for building a Laravel application.

The commands used for building migrations and models are:

    ```bash
    # To make a migration
    php artisan make:migration create_posts_table
    # To make an Eloquent model
    php artisan make:model Post
    # Combined above commands (will auto create migration file)
    php artisan make:model Post -m
    ```
